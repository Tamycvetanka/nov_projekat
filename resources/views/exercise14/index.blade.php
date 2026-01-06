<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Exercise 14</title>
</head>
<body>

<form method="POST" action="{{ route('exercise14.store') }}">
    @csrf

    <select name="city_id">
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>

    <input type="text" name="temperature" placeholder="Unesite temperaturu">

    <select name="weather">
        <option value="sunny">sunny</option>
        <option value="rainy">rainy</option>
        <option value="cloudy">cloudy</option>
    </select>

    <input type="text" name="chance" placeholder="Unesite sansu za padavine">

    <input type="date" name="date">

    <button type="submit">Snimi</button>
</form>

@foreach ($cities as $city)
    <h4>{{ $city->name }}</h4>

    <ul>
        @foreach ($city->forecasts as $forecast)
            <li>
                {{ $forecast->date->format('Y-m-d') }} - {{ $forecast->temperature }}
            </li>
        @endforeach
    </ul>
@endforeach

</body>
</html>
