<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Manager')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <header class="app-header">
        <div class="shell nav-wrap">
            <a href="{{ route('students.index') }}" class="brand">My Student Register</a>
            <nav class="top-nav">
                <a href="{{ route('students.index') }}">All Students</a>
                <a href="{{ route('students.create') }}">Add New</a>
            </nav>
        </div>
    </header>

    <main class="shell page-area">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
