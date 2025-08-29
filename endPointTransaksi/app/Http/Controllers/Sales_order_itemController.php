<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales_order_item;

class Sales_order_itemController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer',
            'production_price' => 'required|string|max:255',
            'selling_price' => 'required|string|max:255',
            'product_id' => 'required|string|max:255',
            'order_id' => 'required|string|max:255'
        ]);

        $salesOrderItem = Sales_order_item::create($validatedData);

        return response()->json($salesOrderItem, 201);
    }
}
