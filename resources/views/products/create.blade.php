@extends('components.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">নতুন প্রোডাক্ট তৈরি করুন</h4>
                <a href="/products" class="btn btn-sm btn-light">ফিরে যান</a>
            </div>
            <div class="card-body">
                <form action="/products" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ক্যাটাগরি</label>
                        <select name="category_id" class="form-select">
                            <option value="">-- ক্যাটাগরি সিলেক্ট করুন --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="প্রোডাক্টের নাম লিখুন">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">বিবরণ</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="বিস্তারিত বিবরণ লিখুন">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">দাম (টাকা)</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="দাম লিখুন">
                        @error('price')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">প্রোডাক্টের ছবি</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success w-100 fw-bold">সেভ করুন</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection