@extends('components.layout')

@section('content')
<div class="row">
    <!-- বামপাশে নতুন ক্যাটাগরি ইনপুট ফর্ম -->
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">নতুন ক্যাটাগরি যোগ করুন</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success small">{{ session('success') }}</div>
                @endif

                <form action="/categories" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ক্যাটাগরির নাম</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="যেমন: Electronics">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100 fw-bold">+ সেভ করুন</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ডানপাশে ক্যাটাগরি তালিকা -->
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-dark text-white">
                <h5 class="mb-0">ক্যাটাগরি তালিকা</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ক্যাটাগরির নাম</th>
                            <th>মোট প্রোডাক্ট</th>
                            <th width="150">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td class="fw-semibold">{{ $category->name }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">{{ $category->products_count }} টি</span>
                                </td>
                                <td>
                                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    
                                    <form action="/categories/{{ $category->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('এই ক্যাটাগরি মুছে ফেলতে চান?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted p-3">কোনো ক্যাটাগরি পাওয়া যায়নি।</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection