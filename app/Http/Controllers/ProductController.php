<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
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
    $request->validate([
        'name'        => 'required|min:3',
        'description' => 'required',
        'price'       => 'required|numeric|min:1',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $product = Product::findOrFail($id);
    $imagePath = $product->image; // ডিফল্টভাবে আগের ছবিটিই থাকবে

    // যদি নতুন কোনো ছবি আপলোড করা হয়
    if ($request->hasFile('image')) {
        // ১. আগের ছবি থাকলে তা স্টোরেজ থেকে মুছে ফেলা
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        // ২. নতুন ছবি সেভ করা
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $product->update([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'image'       => $imagePath,
    ]);

    return redirect('/products')->with('success', 'প্রোডাক্ট সফলভাবে আপডেট করা হয়েছে!');
}

// ৩. ডেটাবেজ থেকে মুছে ফেলবে
public function destroy($id)
{
    $product = Product::findOrFail($id);

    // স্টোরেজ থেকে ছবি মুছে ফেলা
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();

    return redirect('/products')->with('success', 'প্রোডাক্ট মুছে ফেলা হয়েছে!');
}

    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|min:3',
        'description' => 'required',
        'price'       => 'required|numeric|min:1',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // সর্বোচ্চ 2MB
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        // storage/app/public/products ফোল্ডারে সেভ হবে
        $imagePath = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'image'       => $imagePath,
    ]);

    return redirect('/products')->with('success', 'ছবিসহ প্রোডাক্ট সফলভাবে যোগ করা হয়েছে!');
}
}