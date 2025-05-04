<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function create(Request $request)
    {
        $name = $request->input('name');

        Market::create([
            'name'     => $name,
            'owner_id' => auth()->user()->id
        ]);
        return response()->json(['message' => 'Market created successfully'], 201);
    }

    public function update(Request $request)
    {
        $market = Market::find($request->input('id'));
        if (!$market) {
            return response()->json(['message' => 'Market not found'], 404);
        }

        $name = $request->input('name');

        $market->update([
            'name' => $name
        ]);

        return response()->json(['message' => 'Market updated successfully'], 200);
    }

    public function detail(Request $request)
    {
        $market = Market::with('owner')->find($request->input('id'));
        if (!$market) {
            return response()->json(['message' => 'Market not found'], 404);
        }

        return response()->json($market, 200);
    }
}
