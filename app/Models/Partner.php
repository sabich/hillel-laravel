<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Partner
 *
 * @OA\Schema(
 *     title="Partner",
 *     description="Partner model",
 *     @OA\Xml(
 *         name="Partner"
 *     )
 * )
 * @property int $id
 * @property string $name
 * @property string $country
 * @property string $city
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|Partner duplicatedNameAndCountry()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Partner extends Model
{
    use HasFactory;

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    public int $id;
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new partner",
     *      example="partner"
     * )
     *
     * @var string
     */
    public string $name;
    /**
     * @OA\Property(
     *      title="Country",
     *      description="Country",
     *      example="Ukraine"
     * )
     *
     * @var string
     */
    public string $country;
    /**
     * @OA\Property(
     *      title="City",
     *      description="City",
     *      example="Dnipro"
     * )
     *
     * @var string
     */
    public string $city;
    /**
     * @OA\Property(
     *      title="Address",
     *      description="Address",
     *      example="Street 1"
     * )
     *
     * @var string
     */
    public string $address;
    /**
     * @OA\Property(
     *     title="Products",
     *     description="Products"
     * )
     *
     * @var \App\Models\Product[]
     */
    private $products;
    /**
     * @OA\Property(
     *     title="Orders",
     *     description="Product order's model"
     * )
     *
     * @var \App\Models\Order[]
     */
    private $orders;
    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country',
        'city',
        'address',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, Product::class);
    }

    public function scopeDuplicatedNameAndCountry($query)
    {
        return $query->selectRaw('name, country, COUNT(*) as duplicated')
            ->groupBy(['name', 'country'])
            ->having('duplicated', '>', 1);
    }

    public static function sumOrders()
    {
        return static::withSum('orders', 'sum')
            ->orderByDesc('orders_sum_sum');
    }
}
