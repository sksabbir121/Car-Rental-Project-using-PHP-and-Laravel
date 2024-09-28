<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display all cars
    public function index()
{
    $cars = Car::all();
    dd($cars);  // Check this output in your browser
    return view('admin.cars.index', compact('cars'));
}

    // Show the form to create a new car
    public function create()
    {
        return view('admin.cars.create');
    }

    // Store a new car
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/cars', 'public');
        }

        Car::create($data);
        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully');
    }

    // Show the form to edit a car
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    // Update a car
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/cars', 'public');
        }

        $car->update($data);
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully');
    }

    // Delete a car
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully');
    }
}

