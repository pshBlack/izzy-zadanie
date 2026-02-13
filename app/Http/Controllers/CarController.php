<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Part;


class CarController extends Controller
{
    public function index() {
        $cars = Car::all();

        // $car = Car::find(1);
        // $part = Part::find(2);
        dd($cars);
    }
}
