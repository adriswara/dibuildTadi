<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class user_roles extends Controller
{
    public function index()
    {
        $data = \App\Models\user_roles::all();
        return response()->json($data);
    }
    public function show($id)
    {
        $data = \App\Models\user_roles::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'User Role not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $data = \App\Models\user_roles::create($request->all());
        return response()->json($data, 201);
    }
    public function update(Request $request, $id)
    {
        $data = \App\Models\user_roles::find($id);
        if ($data) {
            $request->validate([
                'name' => 'sometimes|required|string|max:255'
            ]);

            $data->update($request->all());
            return response()->json($data);
        } else {
            return response()->json(['message' => 'User Role not found'], 404);
        }
    }
    public function destroy($id)
    {
        $data = \App\Models\user_roles::find($id);
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'User Role deleted']);
        } else {
            return response()->json(['message' => 'User Role not found'], 404);
        }
    }
}
