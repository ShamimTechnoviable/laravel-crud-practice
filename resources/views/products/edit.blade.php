@extends('components.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold">প্রোডাক্ট এডিট করুন</h4>
                <a href="/products" class="btn btn-sm btn-dark">ফিরে যান</a>
            </div>
            <div class="card-body">
                <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ক্যাটাগরি</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- ক্যাটাগরি সিলেক্ট করুন --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">প্রোডাক্টের নাম</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">বিবরণ</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">দাম (টাকা)</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                        @error('price')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">বর্তমান ছবি</label>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="80" class="rounded mb-2 img-thumbnail">
                        @else
                            <span class="badge bg-secondary mb-2">কোনো ছবি নেই</span>
                        @endif
                        
                        <input type="file" name="image" class="form-control mt-1">
                        @error('image')
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