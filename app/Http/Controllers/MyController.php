<?php

namespace App\Http\Controllers;

use App\Context;

class MyController extends Controller
{

    public $context;

    public function __construct(Context $context){
        $this->context = $context;
    }

    public function execute(){
        $complexMethodReturn =  $this->context->perform();
        $returnValue = $complexMethodReturn * 10;
        return $returnValue;
    }

}
