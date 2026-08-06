<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>নতুন স্টুডেন্ট যুক্ত করুন</h2>

    <form action="/students" method="POST">
        @csrf {{-- লারাভেলে সিকিউরিটির জন্য এটি দেওয়া বাধ্যতামূলক --}}
        
        <p>নাম: <input type="text" name="name" required></p>
        <p>ইমেইল: <input type="email" name="email" required></p>
        <p>ফোন: <input type="phone" name="phone" required></p>
        <p>ডিপার্টমেন্ট: <input type="text" name="department" required></p>
        
        <button type="submit">সেভ করুন</button>
    </form>

    <br>
    <a href="/students">তালিকায় ফিরে যান</a>
</body>
</html>