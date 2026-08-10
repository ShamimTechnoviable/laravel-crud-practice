<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
    <h2>নতুন প্রোডাক্ট যোগ করুন</h2>

    <form action="/products" method="POST">
        @csrf
        <p>প্রোডাক্টের নাম: <input type="text" name="name" required></p>
        <p>বিবরণ: <textarea name="description" required></textarea></p>
        <p>দাম: <input type="number" name="price" required></p>
        <button type="submit">সেভ করুন</button>
    </form>
    
    <br>
    <a href="/products">তালিকায় যান</a>
</body>
</html>