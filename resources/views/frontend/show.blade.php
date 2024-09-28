@extends('layouts.frontend')

@section('content')
    <section class="car-details">
        <div class="container">
            <h1>{{ $car->name }} ({{ $car->car_type }})</h1>
            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="img-fluid">

            <div class="car-info">
                <p><strong>Brand:</strong> {{ $car->brand }}</p>
                <p><strong>Model:</strong> {{ $car->model }}</p>
                <p><strong>Year:</strong> {{ $car->year }}</p>
                <p><strong>Daily Rent Price:</strong> ${{ $car->daily_rent_price }}</p>
                <p><strong>Available:</strong> {{ $car->availability ? 'Yes' : 'No' }}</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($car->availability)

                <form action="{{ route('rentals.book', $car->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="start_date">Start Date</label>
                            <input type="date" name="start_date" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date">End Date</label>
                            <input type="date" name="end_date" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Book Now</button>
                </form>
            @else
                <p class="text-danger mt-4">This car is not available for booking right now.</p>
            @endif
        </div>
    </section>
@endsection
