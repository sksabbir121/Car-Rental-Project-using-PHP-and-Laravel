<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with('user', 'car')->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    public function show(Rental $rental)
    {
        return view('admin.rentals.show', compact('rental'));
    }

    // Note: For Rental Management, typically there might not be create, edit, update methods
    // because rentals are managed by the booking process on the frontend, not by the admin directly.

    // Delete a rental
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully');
    }
}

