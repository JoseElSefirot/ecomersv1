<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(10); // Fetch users with pagination (10 per page)
        return view('admin.product.index', compact('products'));
    }

    public function welcome()
    {
        $categories = Category::all();
        $products = Product::all(); // Or you can fetch featured products here

        return view('welcome', compact('categories', 'products'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'stock' => $request->stock,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('product.index')->with('success', 'Producto creado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
        ]);

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.buy', compact('product'));
    }

    public function processBuy(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($id);

        if ($request->quantity > $product->stock) {
            return redirect()->back()->with('error', 'La cantidad solicitada excede el stock disponible.');
        }

        // Reduce stock
        $product->stock -= $request->quantity;
        $product->save();

        // Here you could add logic to create an order or cart entry

        return redirect()->route('home')->with('success', 'Compra realizada con éxito.');
    }
}
