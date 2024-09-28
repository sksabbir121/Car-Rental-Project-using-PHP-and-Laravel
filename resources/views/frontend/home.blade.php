@extends('layouts.frontend')

@section('content')
    <section class="home-banner">
        <div class="container text-center">
            <h1>Welcome to Our Car Rental Service</h1>
            <p>Browse our available cars and book a ride today!</p>
            <a href="{{ route('rentals') }}" class="btn btn-primary">Browse Cars</a>
        </div>
    </section>

    <section class="featured-cars">
        <div class="container">
            <h2>Featured Cars</h2>
            <div class="row">
                @foreach($cars as $car)
                    <div class="col-md-4">
                        <div class="car-item">
                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="img-fluid">
                            <h3>{{ $car->name }} ({{ $car->car_type }})</h3>
                            <p>Brand: {{ $car->brand }} | Model: {{ $car->model }}</p>
                            <p>Daily Rent: ${{ $car->daily_rent_price }}</p>
                            <a href="{{ route('rentals.show', $car->id) }}" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
