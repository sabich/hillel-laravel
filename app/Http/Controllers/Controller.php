<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
}
/**
 * @OA\Info(title="Test API", version="0.1")
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )
 */

/**
 * @OA\Schema (
 *      schema="ResourcePaginationProperties",
 *      @OA\Property(
 *          property="links",
 *          type="object",
 *          properties={
 *              @OA\Property(
 *                  property="first",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="last",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="prev",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="next",
 *                  type="string"
 *              )
 *          }
 *      ),
 *      @OA\Property(
 *          property="meta",
 *          type="object",
 *          properties={
 *              @OA\Property(
 *                  property="current_page",
 *                  type="integer",
 *                  example=1
 *              ),
 *              @OA\Property(
 *                  property="from",
 *                  type="integer",
 *                  example=1
 *              ),
 *              @OA\Property(
 *                  property="last_page",
 *                  type="integer",
 *                  example=1
 *              ),
 *              @OA\Property(
 *                  property="path",
 *                  type="string"
 *              ),
 *              @OA\Property(
 *                  property="per_page",
 *                  type="integer",
 *                  example=100
 *              ),
 *              @OA\Property(
 *                  property="to",
 *                  type="integer",
 *                  example=1
 *              ),
 *              @OA\Property(
 *                  property="total",
 *                  type="integer",
 *                  example=1
 *              ),
 *          }
 *      ),
 * )
 */
