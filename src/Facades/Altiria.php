<?php

namespace Usckuro\Altiria\Facades;

use Illuminate\Support\Facades\Facade;

class Altiria extends Facade{
    protected static function getFacadeAccessor() { return \Usckuro\Altiria\Altiria::class; }
}
