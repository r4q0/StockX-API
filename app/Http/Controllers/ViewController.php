<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\api\DataController;

class ViewController extends Controller
{

    public static function render($shoe){
        $result = DataController::getShoe($shoe);
        $result = json_decode($result);
        self::format($result);
    }
    public static function format($result){
    
        $result[]
    }

}
