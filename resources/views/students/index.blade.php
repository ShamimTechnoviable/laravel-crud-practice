@extends('components.layout')

@section('content')
<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">ছাত্রদের তালিকা</h3>
        <a href="/students/create" class="btn btn-primary">+ নতুন ছাত্র যোগ করুন</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>নাম</th>
                <th>ডিপার্টমেন্ট</th>
                <th>ইমেইল</th>
                <th width="180">অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $key => $student)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td class="fw-semibold">{{ $student->name }}</td>
                    <td><span class="badge bg-secondary">{{ $student->department }}</span></td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/students/{{ $student->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('মুছে ফেলতে চান?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted p-3">কোনো ছাত্রের তথ্য পাওয়া যায়নি।</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection