<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Car;
use App\Http\Requests\CarRequest;

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

    public function store(CarRequest $request) {
        $car = $request->validated();
        Car::create($car);
        //TODO Toast Message
        //Inertia::flash('message', 'Car created successfully!');

        return to_route('cars.index');
    }

    public function show(Car $car) {
        return Inertia::render('Cars/Car', [
            'car'=>$car,
            'parts'=>$car->parts()->get()
        ]);
    }

    public function edit(Car $car) {
        return Inertia::render('Cars/UpdateForm', [
            'car'=>$car,
        ]);
    }

    public function update(CarRequest $request, Car $car) {
        $newCar = $request->validated();
        $car->update($newCar);
        return to_route('cars.index');
    }

    public function destroy(Car $car) {
        $car->parts()->delete();    
        $car->delete();
        return to_route('cars.index');
    }
}
