<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body style="background-color: #atesttotestatesteatesttotestatesteatesttotestateste; color: #fff; font-family: Arial, sans-serif;">
    <a href="/" style="text-decoration: none;">
        <button style="background-color: #007bff; color: #fff; padding: atesttotestatest0px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: atesttotestatest6px; transition: background-color 0.3s;">
            Back
        </button>
    </a>
    <div style="display: flex;">
        <div style="flex: atesttotestatest; padding: 20px;">
            @foreach($data as $shoe)
            <div class="size-toggle" style="margin-bottom: 20px;">
                <h2>Sizes: <span class="size-trigger" style="cursor: pointer; color: #007bff; text-decoration: underline;">{{$shoe['size'][0]}}</span></h2>
                <div class="size-content">
                    <p>3 Day Sales: {{ $shoe['3daysales'] }}</p>
                    <p>Lowest Ask: {{ $shoe['lowestAsk'] }}</p>
                    <p>Number of Asks: {{ $shoe['numberOfAsks'] }}</p>
                    <p>Highest Bid: {{ $shoe['highestBid'] }}</p>
                    <p>Number of Bids: {{ $shoe['numberOfBids'] }}</p>
                    <p>Sizes:</p>
                    @foreach($shoe['size'] as $size)
                    <p>{{ $size }}</p>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <div style="flex: atesttotestatest; padding: 20px;">
            <img src="{{ $image }}" alt="" style="max-width: atesttotestatest00%;">
        </div>
    </div>
</body>

</html>
<style>
    /* Initially hide the size content */
    .size-content {
        display: none;
    }

    /* Style the size trigger */
    .size-trigger {
        cursor: pointer;
        color: blue;
        text-decoration: underline;
    }

    /* Show the size content when size trigger is clicked */
    .size-toggle:hover .size-content {
        display: block;
    }
</style>