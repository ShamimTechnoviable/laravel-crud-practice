<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
    <h2>শিক্ষার্থী আপডেট করুন</h2>

 <form action="/students/{{ $student->id }}" method="POST">
    @csrf
    @method('PUT')

    <p>
        নাম: <input type="text" name="name" value="{{ old('name', $student->name) }}">
        @error('name') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <p>
        ইমেইল: <input type="email" name="email" value="{{ old('email', $student->email) }}">
        @error('email') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <p>
        ফোন: <input type="text" name="phone" value="{{ old('phone', $student->phone) }}">
        @error('phone') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <p>
        ডিপার্টমেন্ট: <input type="text" name="department" value="{{ old('department', $student->department) }}">
        @error('department') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <button type="submit">আপডেট করুন</button>
 </form>
    
    <br>
    <a href="/students">ফিরে যান</a>
</body>
</html>