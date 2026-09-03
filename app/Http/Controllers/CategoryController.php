<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // ১. সকল ক্যাটাগরি তালিকা ও প্রোডাক্ট কাউন্ট দেখানো
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('categories.index', compact('categories'));
    }

    // ২. নতুন ক্যাটাগরি সেভ করা
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/categories')->with('success', 'নতুন ক্যাটাগরি সফলভাবে তৈরি করা হয়েছে!');
    }

    // ৩. ক্যাটাগরি এডিট ফর্ম দেখানো
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // ৪. ক্যাটাগরি আপডেট করা
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:2|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect('/categories')->with('success', 'ক্যাটাগরি সফলভাবে আপডেট করা হয়েছে!');
    }

    // ৫. ক্যাটাগরি মুছে ফেলা
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'ক্যাটাগরি মুছে ফেলা হয়েছে!');
    }
}
