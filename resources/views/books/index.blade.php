<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
</head>
<body>
    <h2>বইয়ের তালিকা</h2>

    <ul>
        @forelse($books as $book)
            <li><strong>{{ $book->title }}</strong> - {{ $book->author }} ({{ $book->price }})</li>
        @empty
            <li>ডেটাবেজে কোনো বইয়ের তালিকা নেই!</li>
        @endforelse
    </ul>
</body>
</html>