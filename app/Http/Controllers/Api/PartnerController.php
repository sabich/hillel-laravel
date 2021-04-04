<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index(Request $request)
    {
        return Partner::with('products')->paginate($request->input('per_page'));
    }

    /**
     *
     * @return \Illuminate\Support\Collection
     */
    public function duplicated()
    {
        return Partner::selectRaw('name, country, COUNT(*) as duplicated')
            ->groupBy(['name', 'country'])
            ->having('duplicated', '>', 1)
            ->get();
    }

    /**
     * @param Partner $partner
     * @return Partner
     */
    public function orders(Partner $partner): Partner
    {
        return $partner->loadMissing('orders.product');
    }
}
