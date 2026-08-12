<!DOCTYPE html>
<html>
<head><title>Create Product</title></head>
<body>
    <h2>নতুন প্রোডাক্ট যোগ করুন</h2>

    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        
        <p>প্রোডাক্টের নাম: <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <span style="color: red; display: block;">{{ $message }}</span>
            @enderror
        </p>

        <p>বিবরণ: <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
                <span style="color: red; display: block;">{{ $message }}</span>
            @enderror
        </p>

        <p>দাম: <input type="number" name="price" value="{{ old('price') }}">
            @error('price')
                <span style="color: red; display: block;">{{ $message }}</span>
            @enderror
        </p>

       <p>প্রোডাক্টের ছবি: <input type="file" name="image">
           @error('image')
            <span style="color: red; display: block;">{{ $message }}</span>
           @enderror
       </p>

        <button type="submit">সেভ করুন</button>
    </form>
    
    <br>
    <a href="/products">তালিকায় ফিরে যান</a>
</body>
</html>