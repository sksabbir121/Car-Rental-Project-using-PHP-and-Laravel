@extends('layouts.admin')

@section('content')
<h1>Customer Details</h1>
<p><strong>Customer ID:</strong> {{ $user->id }}</p>
<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Phone:</strong> {{ $user->phone }}</p>
<p><strong>Address:</strong> {{ $user->address }}</p>
<p><strong>Rental History:</strong></p>
<ul>
    @foreach($user->rentals as $rental)
    <li>{{ $rental->car->name }} ({{ $rental->start_date }} to {{ $rental->end_date }})</li>
    @endforeach
</ul>
@endsection
