<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <h2>প্রোডাক্ট আপডেট করুন</h2>

    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
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

      <p>বর্তমান ছবি: <br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100" style="margin: 5px 0;"><br>
        @else
            <span style="color: gray;">কোনো ছবি নেই</span><br>
        @endif
        
        নতুন ছবি সিলেক্ট করুন (ঐচ্ছিক): 
        <input type="file" name="image">
        @error('image')
            <span style="color: red; display: block;">{{ $message }}</span>
        @enderror
      </p>

        <button type="submit">আপডেট করুন</button>
    </form>
    
    <br>
    <a href="/products">ফিরে যান</a>
</body>
</html>