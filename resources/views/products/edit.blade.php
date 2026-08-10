<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <h2>প্রোডাক্ট আপডেট করুন</h2>

    <form action="/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <p>
            প্রোডাক্টের নাম: 
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name')
                <span style="color: red; display: block;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            বিবরণ: 
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <span style="color: red; display: block;">{{ $message }}</span>
            @enderror
        </p>

        <p>
            দাম: 
            <input type="number" name="price" value="{{ old('price', $product->price) }}">
            @error('price')
                <span style="color: red; display: block;">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">আপডেট করুন</button>
    </form>
    
    <br>
    <a href="/products">ফিরে যান</a>
</body>
</html>