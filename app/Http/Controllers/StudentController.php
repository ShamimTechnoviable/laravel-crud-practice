<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        $students= Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

     // ১. এডিট ফর্ম দেখাবে
public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('students.edit', compact('student'));
}

// ২. পরিবর্তন করা তথ্য সেভ করবে
public function update(Request $request, $id)
{
    $request->validate([
        'name'       => 'required|min:3',
        'email'      => 'required|email',
        'phone'      => 'required',
        'department' => 'required',
    ]);
    $student = Student::findOrFail($id);
    $student->update([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'department'=> $request->department,
    ]);

    return redirect('/students')->with('success', 'স্টুডেন্টের তথ্য সফলভাবে আপডেট করা হয়েছে!');
}

// ৩. ডেটাবেজ থেকে মুছে ফেলবে
public function destroy($id)
{
    $student = Student::findOrFail($id);
    $student->delete();

    return redirect('/students');
}

    public function store(Request $request)
    {
        $request->validate([
        'name'       => 'required|min:3',
        'email'      => 'required|email',
        'phone'      => 'required',
        'department' => 'required',
    ]);
        Student::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'department'=> $request->department,
        ]);
        return redirect('/students')->with('success', 'নতুন স্টুডেন্ট সফলভাবে যোগ করা হয়েছে!');
    }
}
