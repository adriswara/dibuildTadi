<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sales_areas extends Controller
{
    public function index()
    {
        $data = \App\Models\sales_areas::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\sales_areas::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales Area not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $data = \App\Models\sales_areas::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\sales_areas::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255'
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales Area not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\sales_areas::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Sales Area deleted']);
        } else {
            return response()->json(['message' => 'Sales Area not found'], 404);
        }
    }
}
