<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::all();
    }

    public function show(Brand $brand)
    {
        return $brand;
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:brands,name',
        ]);

        return Brand::create($validated);
    }

    public function update(Request $request, Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|unique:brands,name,' . $brand->id,
        ]);

        $brand->update($validated);
        return $brand;
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return response()->noContent();
    }
}