<?php

namespace App\Services\Transaction;

use App\Models\Invoice;
use App\Models\Order;
use App\Services\Transaction;

class MarketPlace extends Transaction
{

    public static function paid(Order $order): Invoice
    {
        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->paid = true;
        $invoice->save();
        return $invoice;
    }
}
