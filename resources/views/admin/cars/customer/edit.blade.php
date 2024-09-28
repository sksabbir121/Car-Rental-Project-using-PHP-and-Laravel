@extends('layouts.admin')

@section('content')
<h1>Edit Customer</h1>
<form action="{{ route('admin.customers.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control">{{ old('address', $user->address) }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
