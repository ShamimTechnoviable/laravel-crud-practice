<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>নতুন স্টুডেন্ট যুক্ত করুন</h2>

 <form action="/students" method="POST">
    @csrf
    <p>
        নাম: <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <p>
        ইমেইল: <input type="email" name="email" value="{{ old('email') }}">
        @error('email') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <p>
        ফোন: <input type="text" name="phone" value="{{ old('phone') }}">
        @error('phone') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <p>
        ডিপার্টমেন্ট: <input type="text" name="department" value="{{ old('department') }}">
        @error('department') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>

    <button type="submit">সেভ করুন</button>
 </form>

    <br>
    <a href="/students">তালিকায় ফিরে যান</a>
</body>
</html>