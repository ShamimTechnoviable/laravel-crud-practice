<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
</head>
<body>
    <h2>বইয়ের তালিকা</h2>

    <ul>
        @forelse($books as $book)
            <li><strong>{{ $book->name }}</strong> - {{ $book->department }} ({{ $book->email }})</li>
        @empty
            <li>ডেটাবেজে কোনো বইয়ের তালিকা নেই!</li>
        @endforelse
    </ul>
</body>
</html>