<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
    <h2>বই আপডেট করুন</h2>

 <form action="/books/{{ $book->id }}" method="POST">
    @csrf
    @method('PUT')
    <p>
        বইয়ের নাম: <input type="text" name="title" value="{{ old('title', $book->title) }}">
        @error('title') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>
    <p>
        লেখকের নাম: <input type="text" name="author" value="{{ old('author', $book->author) }}">
        @error('author') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>
    <p>
        দাম: <input type="number" name="price" value="{{ old('price', $book->price) }}">
        @error('price') <span style="color: red; display: block;">{{ $message }}</span> @enderror
    </p>
    <button type="submit">আপডেট করুন</button>
 </form>
    
    <br>
    <a href="/books">ফিরে যান</a>
</body>
</html>