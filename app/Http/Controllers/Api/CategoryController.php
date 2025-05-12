<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Return products by category as JSON.
     * If categoryId is 'all', return all products.
     */
    public function products($categoryId)
    {
        if ($categoryId === 'all') {
            $products = Product::all();
        } else {
            $category = Category::find($categoryId);
            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }
            $products = $category->products; // Assuming Category has products relationship
        }

        // Map products to include full image URL
        $products = $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'image' => asset('storage/' . $product->image),
            ];
        });

        return response()->json($products);
    }
}
