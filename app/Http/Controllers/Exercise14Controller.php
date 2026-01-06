<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class Exercise14Controller extends Controller
{
    public function index()
    {
        $cities = City::with([
            'forecasts' => fn ($q) => $q->orderByDesc('date'),
        ])->orderBy('name')->get();

        return view('exercise14.index', compact('cities'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'city_id' => ['required', 'exists:cities,id'],
            'temperature' => ['required', 'numeric'],
            'weather' => ['required', 'in:sunny,rainy,cloudy'],
            'chance' => ['required', 'integer', 'min:0', 'max:100'],
            'date' => ['required', 'date'],
        ]);

        $forecast = new Forecast();
        $forecast->city_id = $data['city_id'];
        $forecast->temperature = $data['temperature'];
        $forecast->weather = $data['weather'];
        $forecast->chance = $data['chance'];
        $forecast->date = $data['date'];
        $forecast->save();

        return redirect()->route('exercise14.index');
    }
}
