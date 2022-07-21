<?php

namespace domain\facade;
use Illuminate\Support\Facades\Facade;
use domain\services\ProductService;

class ProductFacade extends Facade{

    protected static function getFacadeAccessor(){

        return ProductService::class;
    }


}
