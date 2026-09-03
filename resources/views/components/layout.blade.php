<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Management System</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- সুন্দর নেভবার -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/products">My Store</a>
            <div class="navbar-nav">
                <a class="nav-link" href="/products">Products</a>
                <a class="nav-link" href="/categories">Categories</a>
                <a class="nav-link" href="/books">Books</a>
                <a class="nav-link" href="/students">Students</a>
            </div>
        </div>
    </nav>

    <!-- মূল কন্টেন্ট ডাইনামিক হবে -->
    <div class="container">
        @yield('content')
    </div>

</body>
</html>