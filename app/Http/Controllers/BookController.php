<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function index()
  {
    $books= Book::all();
    return view('books.index', compact('books'));
  }
  public function create()
  {
    return view('books.create');
  }

// ১. এডিট ফর্ম দেখাবে
public function edit($id)
{
    $book = Book::findOrFail($id);
    return view('books.edit', compact('book'));
}

// ২. পরিবর্তন করা তথ্য সেভ করবে
public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $book->update([
        'title'  => $request->title,
        'author' => $request->author,
        'price'  => $request->price,
    ]);

    return redirect('/books');
}

// ৩. ডেটাবেজ থেকে মুছে ফেলবে
public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return redirect('/books');
}

  public function store(Request $request)
  {
    Book::create([
    'title'  => $request->title,
    'author' => $request->author,
    'price'  => $request->price,
   ]);
    return Redirect('/books');
  }
}
