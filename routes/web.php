<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products', [ProductController::class, 'store']);

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/jobs', function() {
    return view('jobs',[
        'jobs'=> Job::all()
    ]);
        
});

Route::get('/jobs/{id}', function ($id) {
    
        $job = Job::find($id);
         return view('job', ['job' => $job]);
});


Route::get('/contact', function () {
    return view('contact');
});


