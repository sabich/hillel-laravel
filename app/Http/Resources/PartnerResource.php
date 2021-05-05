<?php

namespace App\Http\Resources;

use App\Models\Partner;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="PartnerResource",
 *     description="Partner resource",
 *     @OA\Xml(
 *         name="PartnerResource"
 *     )
 * )
 */

class PartnerResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Models\Partner[]
     */
    private $data;

    /** @var Partner */
    public $resource;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        $this->resource->loadMissing(['products','orders.product']);
        return parent::toArray($request);
    }
}
