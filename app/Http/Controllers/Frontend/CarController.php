<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CarController extends Controller
{

    public function book(Request $request, Car $car)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));

        $existingBooking = Booking::where('car_id', $car->id)
            ->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('start_date', [$start_date, $end_date])
                      ->orWhereBetween('end_date', [$start_date, $end_date])
                      ->orWhere(function ($query) use ($start_date, $end_date) {
                          $query->where('start_date', '<=', $start_date)
                                ->where('end_date', '>=', $end_date);
                      });
            })
            ->exists();

        if ($existingBooking) {
            return back()->withErrors('This car is already booked for the selected dates.');
        }


$days = $start_date->diffInDays($end_date) + 1;
$total_price = $days * $car->daily_rent_price;


Booking::create([
    'car_id' => $car->id,
    'start_date' => $start_date,
    'end_date' => $end_date,
    'total_price' => $total_price,
]);

return redirect()->route('rentals.show', $car->id)->with('success', 'Booking successful!');
    }
}
