@extends('components.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">ক্যাটাগরি এডিট করুন</h5>
                <a href="/categories" class="btn btn-sm btn-dark">ফিরে যান</a>
            </div>
            <div class="card-body">
                <form action="/categories/{{ $category->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ক্যাটাগরির নাম</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning w-100 fw-bold">আপডেট করুন</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection