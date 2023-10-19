<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($data as $shoe)
        <div>
            <h1>3 Day Sales: {{ $shoe['3daysales'] }}</h1>
            <h1>Lowest Ask: {{ $shoe['lowestAsk'] }}</h1>
            <h1>Number of Asks: {{ $shoe['numberOfAsks'] }}</h1>
            <h1>Highest Bid: {{ $shoe['highestBid'] }}</h1>
            <h1>Number of Bids: {{ $shoe['numberOfBids'] }}</h1>
            <h1>Sizes: </h1>
            @foreach($shoe['size'] as $size)
                <h1>{{ $size }}</h1>
            @endforeach
        </div>
    @endforeach
</body>
</html>