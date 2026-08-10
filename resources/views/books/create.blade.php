<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>নতুন বই যুক্ত করুন</h2>

 <form action="/books" method="POST">
    @csrf
    <p>
        বইয়ের নাম: <input type="text" name="title" value="{{ old('title') }}">
        @error('title') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>
    <p>
        লেখকের নাম: <input type="text" name="author" value="{{ old('author') }}">
        @error('author') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>
    <p>
        দাম: <input type="number" name="price" value="{{ old('price') }}">
        @error('price') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>
    <button type="submit">সেভ করুন</button>
 </form>

    <br>
    <a href="/books">তালিকায় ফিরে যান</a>
</body>
</html>