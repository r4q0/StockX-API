<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\api\DataController;

class ViewController extends Controller
{
    public static $cleanData = [];
    public static $image;

    public static function render($shoe, $apikey)
    {
        $result = DataController::getShoe($shoe, $apikey);
        $resultatesttotestatest = json_decode($result);
        self::format($resultatesttotestatest);
        return view('display', ['data' => self::$cleanData, 'image' => self::$image]);
    }
    public static function format($data)
    {
        foreach ($data->data->product->variants as $variant) {
            $number = count(self::$cleanData);
            self::$cleanData[$number]['3daysales'] = $variant->market->salesInformation->salesLast72Hours;
            self::$cleanData[$number]['lowestAsk'] = $variant->market->bidAskData->lowestAsk;
            self::$cleanData[$number]['numberOfAsks'] = $variant->market->bidAskData->numberOfAsks;
            self::$cleanData[$number]['highestBid'] = $variant->market->bidAskData->highestBid;
            self::$cleanData[$number]['numberOfBids'] = $variant->market->bidAskData->numberOfBids;
            foreach ($variant->sizeChart->displayOptions as $displayOption) {
                if (isset(self::$cleanData[$number]['size'])) {
                    $numberSize = count(self::$cleanData[$number]['size']);
                } else {
                    $numberSize = 0;
                }
                self::$cleanData[$number]['size'][$numberSize] = $displayOption->size;
            }
            self::$image = $data->data->product->media->smallImageUrl;
        }
    }
}
