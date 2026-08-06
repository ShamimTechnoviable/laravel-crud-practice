<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>ছাত্রদের তালিকা</h2>

    <ul>
        @forelse($students as $student)
            <li><strong>{{ $student->name }}</strong> - {{ $student->department }} ({{ $student->email }})</li>
        @empty
            <li>ডেটাবেজে কোনো স্টুডেন্ট নেই!</li>
        @endforelse
    </ul>
</body>
</html>