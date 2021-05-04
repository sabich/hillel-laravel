<?php

namespace App\Services\Transaction;

use App\Models\Invoice;
use App\Models\Order;
use App\Services\Transaction;

class Online extends Transaction
{

    public static function paid(Order $order): Invoice
    {
        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->paid = false;
        $invoice->save();
        return $invoice;
    }
}
