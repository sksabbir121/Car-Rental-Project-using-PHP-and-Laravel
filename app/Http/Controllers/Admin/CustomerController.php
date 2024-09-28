<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    public function show(User $user)
    {
        return view('admin.customers.show', compact('user'));
    }

    // You may not need create, edit, update methods if you don't want admins to directly modify customer info.
    // Use these if you plan to have full CRUD functionality for customer records.

    public function edit(User $user)
    {
        return view('admin.customers.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }
}
