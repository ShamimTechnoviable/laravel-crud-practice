<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>নতুন বই যুক্ত করুন</h2>

    <form action="/books" method="POST">
        @csrf {{-- লারাভেলে সিকিউরিটির জন্য এটি দেওয়া বাধ্যতামূলক --}}
        
        <p>বইয়ের নাম: <input type="text" name="title" required></p>
        <p>লেখকের নাম: <input type="text" name="author" required></p>
        <p>দাম: <input type="number" name="price" required></p>
        
        <button type="submit">সেভ করুন</button>
    </form>

    <br>
    <a href="/books">তালিকায় ফিরে যান</a>
</body>
</html>