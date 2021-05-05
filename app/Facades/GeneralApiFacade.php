<?php

namespace App\Facades;

use App\Services\GeneralApi;
use Illuminate\Support\Facades\Facade;

class GeneralApiFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return GeneralApi::class;
    }
}
