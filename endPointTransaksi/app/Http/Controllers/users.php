<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class users extends Controller
{
    public function index()
    {
        $data = \App\Models\users::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\users::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|integer|exists:user_roles,id',
            'is_active' => 'sometimes|boolean'
        ]);

        $data = \App\Models\users::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\users::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'phone' => 'sometimes|required|string|max:255|unique:users',
                'password' => 'sometimes|required|string|min:8',
                'role_id' => 'sometimes|required|integer|exists:user_roles,id',
                'is_active' => 'sometimes|boolean'
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\users::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'User deleted']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
