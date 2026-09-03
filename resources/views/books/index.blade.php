@extends('components.layout')

@section('content')
<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">বইয়ের তালিকা</h3>
        <a href="/books/create" class="btn btn-primary">+ নতুন বই যোগ করুন</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>বইয়ের নাম</th>
                <th>লেখক</th>
                <th>দাম</th>
                <th width="180">অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td class="fw-semibold">{{ $book->title ?? $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->price }} ৳</td>
                    <td>
                        <a href="/books/{{ $book->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/books/{{ $book->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('মুছে ফেলতে চান?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted p-3">কোনো বই পাওয়া যায়নি।</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection