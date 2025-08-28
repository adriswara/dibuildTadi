<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sales_targets extends Controller
{
    public function index()
    {
        $data = \App\Models\sales_targets::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\sales_targets::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales Target not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'active_date' => 'sometimes|required|integer|exists:sales_areas,id',
            'amount' => 'required|numeric',
            'sales_id' => 'required|integer|min:1|max:12',
        ]);

        $data = \App\Models\sales_targets::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\sales_targets::find($id);
        if ($data) {
            $request->validate([
                'active_date' => 'sometimes|required|integer|exists:sales_areas,id',
                'amount' => 'sometimes|required|numeric',
                'sales_id' => 'sometimes|required|integer|min:1|max:12',
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales Target not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\sales_targets::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Sales Target deleted']);
        } else {
            return response()->json(['message' => 'Sales Target not found'], 404);
        }
    }
}
