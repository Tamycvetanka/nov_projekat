<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercise 13</title>
</head>
<body>

<h2>City</h2>

@foreach ($cities as $city)
    <p>{{ $city->name }}</p>

    <h3>Forecasts</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>Date</th>
            <th>Temperature</th>
        </tr>
        @foreach ($city->forecasts as $forecast)
            <tr>
                <td>{{ $forecast->date->format('Y-m-d') }}</td>
                <td>{{ $forecast->temperature }}</td>
            </tr>
        @endforeach
    </table>

    <h3>Weather</h3>
    <p>{{ $city->weather->temperature }}</p>

    <hr>
@endforeach

</body>
</html>
