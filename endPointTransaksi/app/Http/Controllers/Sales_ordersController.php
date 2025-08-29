<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales_orders;

class Sales_ordersController extends Controller
{
    public function index(Request $request)
    {

        $threeyearsfromnow = now()->subYears(3);

        $query = \App\Models\sales_orders::join('sales_order_items', 'sales_orders.id', '=', 'sales_order_items.order_id')
            ->select('sales_orders.*', 'sales_order_items.*')
            ->where('sales_orders.created_at', '>=', $threeyearsfromnow);

        if ($request->has('customer_id')) {
            $query->where('sales_orders.customer_id', $request->customer_id);
        }
        if ($request->has('sales_id')) {
            $query->where('sales_orders.sales_id', $request->sales_id);
        }

        $data = $query->limit(10)->get();
        return response()->json($data);
    }

    public function indexWithTarget(Request $request)
    {



        $query = \App\Models\sales_orders::join('sales_order_items', 'sales_orders.id', '=', 'sales_order_items.order_id')
            ->join('sales_targets', 'sales_orders.sales_id', '=', 'sales_targets.sales_id')
            ->select('sales_orders.*', 'sales_order_items.*', 'sales_targets.*');

        if ($request->has('sales_id')) {
            $query->where('sales_orders.sales_id', $request->sales_id);
        }


        // Order by month (created_at)
        $query->orderByRaw('YEAR(sales_orders.created_at), MONTH(sales_orders.created_at)');

        $data = $query->limit(10)->get();
        return response()->json($data);
    }

    public function indexWithTargetMonthly(Request $request)
    {
        // Use filter if provided, otherwise use current month/year
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $query = \App\Models\sales_orders::join('sales_order_items', 'sales_orders.id', '=', 'sales_order_items.order_id')
            ->join('sales_targets', 'sales_orders.sales_id', '=', 'sales_targets.sales_id')
            ->select('sales_orders.*', 'sales_order_items.*', 'sales_targets.*')
            ->whereMonth('sales_orders.created_at', $month)
            ->whereYear('sales_orders.created_at', $year)
            ->limit(10);


        $query->orderByRaw('YEAR(sales_orders.created_at), MONTH(sales_orders.created_at)');

        $data = $query->get();
        return response()->json($data);
    }

    public function all() {}

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
