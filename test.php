<?php




$data = file_get_contents('data.json');
$data = json_decode($data, true);
$new = [];
foreach($data['data']['product']['variants'] as $variant){
    $number = count($new);
    $new[$number]['3daysales'] = $variant['market']['salesInformation']['salesLast72Hours'];
    $new[$number]['lowestAsk'] = $variant['market']["bidAskData"]["lowestAsk"];
    $new[$number]['numberOfAsks'] = $variant['market']["bidAskData"]["numberOfAsks"];
array_push($new[$variant]['highestBid'], $variant['market']["bidAskData"]["highestBid"]);
array_push($new[$variant]['numberOfBids'], $variant['market']["bidAskData"]["numberOfBids"]);
foreach($variant['sizeChart']['displayOptions'] as $displayOption){
    $numberSize = count($new[$number]['size']);
    array_push($new[$number]['size'], $displayOption['size']);
$new[$number]['sizeType'] = $displayOption['type'];
}
}

var_dump($new);

