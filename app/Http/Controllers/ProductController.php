<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    // ১. এডিট ফর্ম দেখাবে
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

// ২. পরিবর্তন করা তথ্য সেভ করবে
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $product->update([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
    ]);

    return redirect('/products');
}

// ৩. ডেটাবেজ থেকে মুছে ফেলবে
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect('/products');
}

    public function store(Request $request)
    {
        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
        ]);

        return redirect('/products');
    }
}