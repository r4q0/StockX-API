<?php




$data = file_get_contents('data.json');
$data = json_decode($data, true);
$cleanData = [];
foreach($data['data']['product']['variants'] as $variant){
    $number = count($cleanData);
    $cleanData[$number]['3daysales'] = $variant['market']['salesInformation']['salesLast72Hours'];
    $cleanData[$number]['lowestAsk'] = $variant['market']["bidAskData"]["lowestAsk"];
    $cleanData[$number]['numberOfAsks'] = $variant['market']["bidAskData"]["numberOfAsks"];
    $cleanData[$number]['highestBid'] = $variant['market']["bidAskData"]["highestBid"];
    $cleanData[$number]['numberOfBids'] = $variant['market']["bidAskData"]["numberOfBids"];
    foreach($variant['sizeChart']['displayOptions'] as $displayOption){
        if (isset($cleanData[$number]['size'])) {
            $numberSize = count($cleanData[$number]['size']);
        }
        else {
            $numberSize = 0;
        }
        $cleanData[$number]['size'][$numberSize] = $displayOption['size'];
    }
}

var_dump($cleanData[1]);

