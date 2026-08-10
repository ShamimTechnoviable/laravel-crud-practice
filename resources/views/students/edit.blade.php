<!DOCTYPE html>
<html>
<head><title>Edit Student</title></head>
<body>
    <h2>শিক্ষার্থী আপডেট করুন</h2>

    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')
        

        <p>শিক্ষার্থী নাম: <input type="text" name="name" value="{{ $student->name }}" required></p>
        <p>ইমেইল: <input type="email" name="email" value="{{ $student->email }}" required></p>
        <p>ফোন: <input type="phone" name="phone" value="{{ $student->phone }}" required></p>
        <p>ডিপার্টমেন্ট: <input type="text" name="department" value="{{ $student->department }}" required></p>
        
        <button type="submit">আপডেট করুন</button>
    </form>
    
    <br>
    <a href="/students">ফিরে যান</a>
</body>
</html>