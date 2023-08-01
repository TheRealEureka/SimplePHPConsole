<?php

namespace Controllers\Custom;

use Controllers\Controller;

class Example extends Controller
{
    protected static function hello(array $args) : void{
        if(isset($args['name'])){
            self::logMessage('Hello '.$args['name'].' !');
        }else{
            self::logMessage('Hello everyone !');
        }
    }
}