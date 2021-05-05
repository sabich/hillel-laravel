<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *   path="/products",
     *   summary="list products",
     *   @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=false,
     *       @OA\Schema(
     *            type="integer",
     *            format="int64",
     *       )
     *   ),
     *   @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         required=false,
     *       @OA\Schema(
     *            type="integer",
     *            format="int64",
     *       )
     *   ),
     *   @OA\Response(
     *       response=200,
     *       description="successful operation",
     *       @OA\JsonContent(
     *          allOf={
     *             @OA\Schema(ref="#/components/schemas/ProductResource"),
     *             @OA\Schema(ref="#/components/schemas/ResourcePaginationProperties"),
     *          }
     *       )
     *   )
     * )
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return ProductResource::collection(
            Product::paginate($request->input('per_page'))
        );
    }
}
