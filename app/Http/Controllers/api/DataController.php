<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class DataController extends Controller
{
    public static $shoe;
    public static $size = 14; //Do not change this value you will be getting back all sizes
    public static function getShoe($shoe){
        $shoe = strtolower($shoe);
        self::$shoe = $shoe;
        $url = 'https://stockx.com/en/' . self::$shoe;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: stockx_default_sneakers_size=" . self::$size));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0');
        $output = curl_exec($ch);
        curl_close($ch);
        return self::filterData($output);
    }

    public static function filterData($data){
        $pattern = '/{"data":{"product":.*?updated_at=\d+"/';
        if (preg_match($pattern, $data, $matches)) {
            $data = $matches[0] . '}}}}';
            header('Content-Type: application/json');
            return ($data);
            
        }
    }
}
