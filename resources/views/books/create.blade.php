<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>নতুন বই যুক্ত করুন</h2>

    <form action="/books" method="POST">
        @csrf {{-- লারাভেলে সিকিউরিটির জন্য এটি দেওয়া বাধ্যতামূলক --}}
        
        <p>Title: <input type="text" name="name" required></p>
        <p>Auther: <input type="text" name="auther" required></p>
        <p>Price: <input type="text" name="price" required></p>
        
        <button type="submit">সেভ করুন</button>
    </form>

    <br>
    <a href="/books">তালিকায় ফিরে যান</a>
</body>
</html>