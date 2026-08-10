<!DOCTYPE html>
<html>
<head><title>Edit Book</title></head>
<body>
    <h2>বই আপডেট করুন</h2>

    <form action="/books/{{ $book->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>বইয়ের নাম: <input type="text" name="title" value="{{ $book->title }}" required></p>
        <p>লেখকের নাম: <input type="text" name="author" value="{{ $book->author }}" required></p>
        <p>দাম: <input type="number" name="price" value="{{ $book->price }}" required></p>
        
        <button type="submit">আপডেট করুন</button>
    </form>
    
    <br>
    <a href="/books">ফিরে যান</a>
</body>
</html>