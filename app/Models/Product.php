<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Product
 *
 * @OA\Schema (
 *     title="Product",
 *     description="Product model",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 * @property int $id
 * @property int $partner_id
 * @property string $name
 * @property string $model
 * @property string $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\Models\Partner $partner
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePartnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereYear($value)
 * @mixin \Eloquent
 */

class Product extends Model
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
     *      title="Partner Id",
     *      description="Id of the partner",
     *      example="Chif"
     * )
     *
     * @var integer
     */
    protected int $partner_id;
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new product",
     *      example="A nice product"
     * )
     *
     * @var string
     */
    public string $name;
    /**
     * @OA\Property(
     *      title="Model",
     *      description="Name of the model",
     *      example="NX-8"
     * )
     *
     * @var string
     */
    public string $model;
    /**
     * @OA\Property(
     *      title="Year",
     *      description="Year",
     *      example="2000"
     * )
     *
     * @var string
     */
    public string $year;
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
     * @OA\Property(ref="#/components/schemas/Partner")
     *
     * @var \App\Models\Partner
     */
    private Partner $partner;
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'partner_id',
        'name',
        'model',
        'year',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
