<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResource;
use App\Http\Resources\PartnerWithOrdersResource;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return PartnerResource::collection(
            Partner::paginate($request->input('per_page'))
        );
    }

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function duplicated()
    {
        return Partner::duplicatedNameAndCountry()->get();
    }

    /**
     * @param Partner $partner
     * @return PartnerWithOrdersResource
     */
    public function orders(Partner $partner): PartnerWithOrdersResource
    {
        return new PartnerWithOrdersResource($partner);
    }

    public function sumOrders()
    {
        return Partner::sumOrders()->get();
    }
}
