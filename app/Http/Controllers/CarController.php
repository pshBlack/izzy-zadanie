<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Car;


class CarController extends Controller
{
    public function index() {
        $cars = Car::withCount('parts')->paginate(10);
        return Inertia::render('Cars/Index', [
            'cars' => $cars,
        ]);
    }

    public function create() {
        return Inertia::render('Cars/CreateForm');
    }
    public function store(Car $cars) {
        $car = request()->validate([
            'name'=> '',
            'registration_number',
            'is_registered'=>'',
        ]);
        dd($car);
    }
}
