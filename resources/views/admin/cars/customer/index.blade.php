@extends('layouts.admin')

@section('content')
<h1>Customers</h1>
<table class="table">
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->address }}</td>
            <td>
                <a href="{{ route('admin.customers.show', $customer->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
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
