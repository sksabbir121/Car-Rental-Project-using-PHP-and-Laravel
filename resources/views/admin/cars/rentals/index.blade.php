@extends('layouts.admin')

@section('content')
<h1>Rentals</h1>
<table class="table">
    <thead>
        <tr>
            <th>Rental ID</th>
            <th>Customer Name</th>
            <th>Car Details</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Cost</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals as $rental)
        <tr>
            <td>{{ $rental->id }}</td>
            <td>{{ $rental->user->name }}</td>
            <td>{{ $rental->car->name }} ({{ $rental->car->brand }})</td>
            <td>{{ $rental->start_date }}</td>
            <td>{{ $rental->end_date }}</td>
            <td>${{ $rental->total_cost }}</td>
            <td>{{ $rental->status }}</td>
            <td>
                <a href="{{ route('admin.rentals.show', $rental->id) }}" class="btn btn-info">View</a>
                <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
