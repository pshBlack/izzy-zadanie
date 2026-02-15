<?php

namespace App\Http\Controllers;


use App\Filters\CarFilter;
use Inertia\Inertia;
use App\Models\Car;
use App\Http\Requests\CarRequest;
use Illuminate\Http\Request;
class CarController extends Controller
{
    public function index(Request $request, CarFilter $filter) {
        
        $cars = Car::withCount('parts')
        ->filter($filter)
        ->paginate(10)
        ->withQueryString();
        return Inertia::render('Cars/Index', [
            'cars' => $cars,
            'filters' => $request->all()
        ]);
    }

    public function create() {
        return Inertia::render('Cars/CreateCarForm');
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
            'parts'=>$car->parts()->paginate(10),
        ]);
    }

    public function edit(Car $car) {
        return Inertia::render('Cars/UpdateCarForm', [
            'car'=>$car,
        ]);
    }

    public function update(CarRequest $request, Car $car) {
        $newCar = $request->validated();
        $car->updateOrFail($newCar);
        return to_route('cars.index');
    }

    public function destroy(Car $car) {
        $car->parts()->delete();    
        $car->delete();
        return to_route('cars.index');
    }
}
