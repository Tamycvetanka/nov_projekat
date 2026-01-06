<?php

namespace App\Http\Controllers;

use App\Models\City;

class Exercise13Controller extends Controller
{
    public function index()
    {
        $cities = City::with([
            'forecasts' => fn ($q) => $q->orderBy('date'),
            'weather'
        ])->orderBy('name')->get();

        return view('exercise13.index', compact('cities'));
    }
}
