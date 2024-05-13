<?php

namespace Dualklip\Csc\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dualklip\Csc\Csc
 */
class Csc extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Dualklip\Csc\Csc::class;
    }
}
