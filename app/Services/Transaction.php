<?php

namespace App\Services;

use App\Models\Invoice;
use App\Models\Order;

abstract class Transaction
{
    abstract public static function paid(Order $order): Invoice;
}
