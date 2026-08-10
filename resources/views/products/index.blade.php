<!DOCTYPE html>
<html>
<head><title>Product List</title></head>
<body>
    <h2>প্রোডাক্টের তালিকা</h2>
    <a href="/products/create">+ নতুন প্রোডাক্ট যোগ করুন</a>

    <ul>
        @forelse($products as $product)
            <li>
                <strong>{{ $product->name }}</strong> - {{ $product->description }} - ({{ $product->price }} টাকা)
                
                {{-- এডিট লিংক --}}
                <a href="/products/{{ $product->id }}/edit">Edit</a>

                {{-- ডিলিট ফর্ম --}}
                <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('সত্যিই মুছে ফেলতে চান?')">Delete</button>
                </form>
            </li>
        @empty
            <li>কোনো প্রোডাক্টের তথ্য নেই!</li>
        @endforelse
    </ul>
</body>
</html>