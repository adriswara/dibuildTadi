<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sales_orders extends Controller
{
    public function index()
    {
        $data = \App\Models\sales_orders::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\sales_orders::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales Order not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|integer|exists:products,id',
         
        ]);

        $data = \App\Models\sales_orders::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\sales_orders::find($id);
        if ($data) {
            $request->validate([
              
                'name' => 'sometimes|required|integer|exists:products,id',
               
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Sales Order not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\sales_orders::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Sales Order deleted']);
        } else {
            return response()->json(['message' => 'Sales Order not found'], 404);
        }
    }
}
