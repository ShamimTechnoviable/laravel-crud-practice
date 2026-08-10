<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <h2>প্রোডাক্ট আপডেট করুন</h2>

    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>প্রোডাক্টের নাম: <input type="text" name="name" value="{{ $product->name }}" required></p>
        <p>বিবরণ: <textarea name="description" required>{{ $product->description }}</textarea></p>
        <p>দাম: <input type="number" name="price" value="{{ $product->price }}" required></p>
        
        <button type="submit">আপডেট করুন</button>
    </form>
    
    <br>
    <a href="/products">ফিরে যান</a>
</body>
</html>