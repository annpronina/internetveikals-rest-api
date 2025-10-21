<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        return Discount::all();
    }

    public function show(Discount $discount)
    {
        return $discount;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        return Discount::create($validated);
    }

    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'percentage' => 'sometimes|numeric|min:0|max:100',
        ]);

        $discount->update($validated);
        return $discount;
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return response()->noContent();
    }
}