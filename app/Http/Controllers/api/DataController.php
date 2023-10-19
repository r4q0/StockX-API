<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class DataController extends Controller
{
    public static $shoe;
    public static $size = 14; //Do not change this value you will be getting back all sizes
    public static function getShoe($shoe)
    {
        $shoe = strtolower($shoe);
        self::$shoe = $shoe;
        $url = 'https%3A%2F%2Fstockx.com/en/' . self::$shoe;
        $apikey = "YOURAPIKEY"; // GET YOUR PAPI KEY AT https://fas.st/t/f8U46NrZ
        $proxyurl = "https://api.scrapingant.com/v2/general?url=$url&x-api-key=$apikey&browser=false&return_page_source=true";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $proxyurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: stockx_default_sneakers_size=" . self::$size));
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:75.0) Gecko/20100101 Firefox/75.0');
        $output = curl_exec($ch);
        curl_close($ch);
        return self::filterData($output);
    }

    public static function filterData($data)
    {
        $pattern = '/{"data":{"product":.*?updated_at=\d+"/';
        if (preg_match($pattern, $data, $matches)) {
            $data = $matches[0] . '}}}}';
            header('Content-Type: application/json');
            return ($data);
        }
    }
    public static function getCleanData($shoe)
    {
        $result = self::getShoe($shoe);
        $data = json_decode($result);
        $cleanData = [];
        
        foreach ($data->data->product->variants as $variant) {
            $number = count($cleanData);
            $cleanData[$number]['3daysales'] = $variant->market->salesInformation->salesLast72Hours ?? '0';
            $cleanData[$number]['lowestAsk'] = $variant->market->bidAskData->lowestAsk ?? '0';
            $cleanData[$number]['numberOfAsks'] = $variant->market->bidAskData->numberOfAsks ?? '0';
            $cleanData[$number]['highestBid'] = $variant->market->bidAskData->highestBid ?? '0';
            $cleanData[$number]['numberOfBids'] = $variant->market->bidAskData->numberOfBids ?? '0';
            $cleanData[$number]['image'] = $data->data->product->media->smallImageUrl ?? '0';
            
            foreach ($variant->sizeChart->displayOptions as $displayOption) {
                if (isset($cleanData[$number]['size'])) {
                    $numberSize = count($cleanData[$number]['size']);
                } else {
                    $numberSize = 0;
                }
                $cleanData[$number]['size'][$numberSize] = $displayOption->size;
            }
            
        }
        
        return json_encode($cleanData);
    }
}
