@extends('components.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">নতুন বই যোগ করুন</h5>
                <a href="/books" class="btn btn-sm btn-light">ফিরে যান</a>
            </div>
            <div class="card-body">
                <form action="/books" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">বইয়ের নাম</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="বইয়ের নাম লিখুন">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">লেখকের নাম</label>
                        <input type="text" name="author" class="form-control" value="{{ old('author') }}" placeholder="লেখকের নাম লিখুন">
                        @error('author')
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
                    <button type="submit" class="btn btn-success w-100 fw-bold">সেভ করুন</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection