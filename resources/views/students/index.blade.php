<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h2>ছাত্রদের তালিকা</h2>
    <a href="/students/create">+ নতুন ছাত্র যোগ করুন</a>

    <ul>
        @forelse($students as $student)
            <li><strong>{{ $student->name }}</strong> - {{ $student->department }} ({{ $student->email }})
            {{-- এডিট লিংক --}}
                <a href="/students/{{ $student->id }}/edit">Edit</a>

                {{-- ডিলিট ফর্ম --}}
                <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('সত্যিই মুছে ফেলতে চান?')">Delete</button>
                </form>
            
            </li>
        @empty
            <li>ডেটাবেজে কোনো স্টুডেন্ট নেই!</li>
        @endforelse
    </ul>
</body>
</html>