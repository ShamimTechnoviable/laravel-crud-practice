@extends('components.layout')

@section('content')
<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold">প্রোডাক্ট তালিকা</h3>
        <a href="/products/create" class="btn btn-primary">+ নতুন প্রোডাক্ট</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>ছবি</th>
                <th>নাম</th>
                <th>ক্যাটাগরি</th>
                <th>দাম</th>
                <th width="180">অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="50" height="50" class="rounded object-fit-cover">
                        @else
                            <span class="badge bg-secondary">No Image</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $product->name }}</td>
                    <td><span class="badge bg-info text-dark">{{ $product->category->name ?? 'No Category' }}</span></td>
                    <td>{{ $product->price }} ৳</td>
                    <td>
                        <a href="/products/{{ $product->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/products/{{ $product->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('মুছে ফেলতে চান?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection