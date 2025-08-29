<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController  extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = Customer::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $data = $request->all();
      
        $customer = Customer::create($data);
        return response()->json($customer, 201);
    }
    public function update(Request $request, $id)
    {
        $data = Customer::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'address' => 'required|string|max:255',
                'phone' => 'sometimes|required|string|max:15',
            ]);

            $updateData = $request->all();
           
            $data->update($updateData);
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = Customer::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Customer deleted']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
