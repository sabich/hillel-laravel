<?php


namespace App\Services;


use App\Models\Invoice;
use App\Models\Order;
use App\Services\Transaction\MarketPlace;
use App\Services\Transaction\Online;
use Exception;

class Payment
{
    public function paidOrder(Order $order, string $type): Invoice
    {
        switch ($type) {
            case 'online':
                return Online::paid($order);
            case 'market_place':
                return MarketPlace::paid($order);
            default:
                throw new Exception('payment type not found');
        }
    }
}
