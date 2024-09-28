@extends('layouts.admin')

@section('content')
<h1>Rental Details</h1>
<p><strong>Rental ID:</strong> {{ $rental->id }}</p>
<p><strong>Customer Name:</strong> {{ $rental->user->name }}</p>
<p><strong>Car Details:</strong> {{ $rental->car->name }} ({{ $rental->car->brand }})</p>
<p><strong>Start Date:</strong> {{ $rental->start_date }}</p>
<p><strong>End Date:</strong> {{ $rental->end_date }}</p>
<p><strong>Total Cost:</strong> ${{ $rental->total_cost }}</p>
<p><strong>Status:</strong> {{ $rental->status }}</p>
@endsection
