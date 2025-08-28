<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class products extends Controller
{
    public function index()
    {
        $data = \App\Models\products::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\products::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'production_price' => 'required|numeric',
            'selling_price' => 'required|integer',
        ]);

        $data = \App\Models\products::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\products::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'production_price' => 'sometimes|required|numeric',
                'selling_price' => 'sometimes|required|integer',
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\products::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Product deleted']);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
