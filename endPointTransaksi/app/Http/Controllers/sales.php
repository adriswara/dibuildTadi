<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sales extends Controller
{
    public function index()
    {
        $data = \App\Models\sales::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\sales::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([

            'user_id' => 'required|integer|exists:users,id',
            'area_id' => 'required|integer|exists:sales_areas,id',
        ]);

        $data = \App\Models\sales::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\sales::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'email' => 'sometimes|required|string|email|max:255|unique:sales,email,' . $id,
                'phone' => 'sometimes|required|string|max:15',
                'sales_area_id' => 'sometimes|required|integer|exists:sales_areas,id',
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\sales::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Sales deleted']);
        } else {
            return response()->json(['message' => 'Sales not found'], 404);
        }
    }
}
