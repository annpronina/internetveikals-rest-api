<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with(['category', 'brand', 'discount', 'tags']);

        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        return $query->paginate(50);
    }

    public function show(Product $product)
    {
        return $product->load(['category', 'brand', 'discount', 'tags']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'tags' => 'array',
        ]);

        $product = Product::create($validated);
        $product->tags()->sync($request->tags ?? []);

        return response()->json($product->load('tags'), 201);
    }
public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string',
            'description' => 'sometimes|string',
            'price' => 'sometimes|numeric',
            'category_id' => 'sometimes|exists:categories,id',
            'brand_id' => 'sometimes|exists:brands,id',
            'discount_id' => 'nullable|exists:discounts,id',
            'tags' => 'array',
        ]);

        $product->update($validated);
        $product->tags()->sync($request->tags ?? []);

        return response()->json($product->load('tags'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}