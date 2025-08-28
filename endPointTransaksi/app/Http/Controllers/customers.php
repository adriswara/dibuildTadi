<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\customers;
class customers extends Controller
{
    public function index()
    {
        $data = \App\Models\customers::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\customers::find($id);
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

        $data = \App\Models\customers::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\customers::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'address' => 'sometimes|required|string|max:255',
                'phone' => 'sometimes|required|string|max:15',
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\customers::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Customer deleted']);
        } else {
            return response()->json(['message' => 'Customer not found'], 404);
        }
    }
}
