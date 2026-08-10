<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
</head>
<body>
    @if(session('success'))
     <p style="color: green; font-weight: bold;">
        {{ session('success') }}
     </p>
    @endif
    <h2>বইয়ের তালিকা</h2>
    <a href="/books/create">+ নতুন বই যোগ করুন</a>

    <ul>
        @forelse($books as $book)
            <li><strong>{{ $book->title }}</strong> - {{ $book->author }} ({{ $book->price }})
            {{-- এডিট লিংক --}}
                <a href="/books/{{ $book->id }}/edit">Edit</a>

                {{-- ডিলিট ফর্ম --}}
                <form action="/books/{{ $book->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('সত্যিই মুছে ফেলতে চান?')">Delete</button>
                </form>
            
            </li>
        @empty
            <li>ডেটাবেজে কোনো বইয়ের তালিকা নেই!</li>
        @endforelse
    </ul>
</body>
</html>