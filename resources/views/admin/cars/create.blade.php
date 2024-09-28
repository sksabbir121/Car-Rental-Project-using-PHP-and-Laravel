@extends('layouts.admin')

@section('content')
<h1>{{ isset($car) ? 'Edit Car' : 'Add Car' }}</h1>

<form action="{{ isset($car) ? route('admin.cars.update', $car->id) : route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($car))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Car Name</label>
        <input type="text" name="name" value="{{ old('name', $car->name ?? '') }}" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
