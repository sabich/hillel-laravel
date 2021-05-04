<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderPaidRequest;
use App\Http\Resources\OrderResource;
use App\Models\Invoice;
use App\Models\Order;
use App\Services\Payment;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return OrderResource::collection(
            Order::paginate($request->input('per_page'))
        );
    }

    /**
     * @param OrderPaidRequest $request
     * @param Order $order
     * @param Payment $payment
     * @return Invoice
     * @throws Exception
     */
    public function paid(
        OrderPaidRequest $request,
        Order $order,
        Payment $payment
    ): Invoice {
        return $payment->paidOrder(
            $order,
            $request->input('type')
        );
    }
}
