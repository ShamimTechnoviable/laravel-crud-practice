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
        // ১. আপডেট ইনপুট চেক করা
    $request->validate([
        'name'        => 'required|min:3',
        'description' => 'required',
        'price'       => 'required|numeric|min:1',
    ]);

    $product = Product::findOrFail($id);
    $product->update([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
    ]);

    return redirect('/products')->with('success', 'প্রোডাক্ট সফলভাবে আপডেট করা হয়েছে!');
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

    // ১. ফর্মের ইনপুট চেক করা (Validation)
    $request->validate([
        'name'        => 'required|min:3',
        'description' => 'required',
        'price'       => 'required|numeric|min:1',
      ]);

        Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
        ]);

        return redirect('/products')->with('success', 'নতুন প্রোডাক্ট সফলভাবে যোগ করা হয়েছে!');
    }
}