<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartRequest;
use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\Car;

use Inertia\Inertia;
class PartController extends Controller
{
    public function index() {
        $parts = Part::with('car:id,name')->paginate(10);
        return Inertia::render('Parts/Index', [
            'parts'=> $parts    
        ]);
    }
    
    public function create() {
        $cars = Car::all();
        return Inertia::render('Parts/CreatePartForm',[
            'cars'=> $cars
        ]);
    }
    public function store(PartRequest $request) {
        $part = $request->validated();
        Part::create($part);
        return to_route('parts.index');
    }

    public function edit(Part $part) {
        $cars = Car::all();
        return Inertia::render('Parts/UpdatePartForm', [
            'part' => $part,
            'cars'=> $cars
        ]);
    }

    public function update(PartRequest $request, Part $part) {
        $newPart = $request->validated();
        $part->updateOrFail($newPart);
        return to_route('parts.index');
    }


    public function destroy(Part $part) {
        $part->delete();
        return redirect()->back(); 
    }
}
