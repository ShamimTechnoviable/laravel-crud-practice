@extends('components.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">নতুন ছাত্র যোগ করুন</h5>
                <a href="/students" class="btn btn-sm btn-light">ফিরে যান</a>
            </div>
            <div class="card-body">
                <form action="/students" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ছাত্রের নাম</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="নাম লিখুন">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ডিপার্টমেন্ট</label>
                        <input type="text" name="department" class="form-control" value="{{ old('department') }}" placeholder="যেমন: CSE">
                        @error('department')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ইমেইল</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="ইমেইল লিখুন">
                        @error('email')
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