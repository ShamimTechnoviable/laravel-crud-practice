@extends('components.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold">ছাত্রের তথ্য আপডেট করুন</h5>
                <a href="/students" class="btn btn-sm btn-dark">ফিরে যান</a>
            </div>
            <div class="card-body">
                <form action="/students/{{ $student->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ছাত্রের নাম</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}">
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ডিপার্টমেন্ট</label>
                        <input type="text" name="department" class="form-control" value="{{ old('department', $student->department) }}">
                        @error('department')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">ইমেইল</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}">
                        @error('email')
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