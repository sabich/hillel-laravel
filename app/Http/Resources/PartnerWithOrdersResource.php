<?php

namespace App\Http\Resources;

use App\Models\Partner;
use Illuminate\Http\Resources\Json\JsonResource;

class PartnerWithOrdersResource extends JsonResource
{
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
        $this->resource
            ->loadMissing('orders.product')
            ->loadSum('orders', 'sum')
            ->loadCount('orders');
        return parent::toArray($request);
    }
}
