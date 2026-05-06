<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #000000;
            --text-main: #ffffff;
            --text-muted: #888888;
            --border: rgba(255, 255, 255, 0.1);
            --bg-hover: rgba(255, 255, 255, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-main);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        .navbar {
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border);
        }

        .navbar-brand {
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--text-main);
        }

        .container {
            max-width: 900px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        h1 {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 4rem;
            letter-spacing: -0.01em;
            text-transform: lowercase;
        }

        .table-container {
            width: 100%;
            margin-top: 2rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }

        .table th {
            text-align: left;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
            color: var(--text-muted);
            font-weight: 400;
            text-transform: uppercase;
            font-size: 0.65rem;
            letter-spacing: 0.1em;
        }

        .table td {
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border);
        }

        .btn {
            padding: 0.5rem 0;
            font-size: 0.7rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            border: none;
            background: transparent;
            color: var(--text-muted);
            transition: color 0.2s ease;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-right: 1.5rem;
        }

        .btn:hover {
            color: var(--text-main);
        }

        .btn-primary {
            color: var(--text-main);
            border-bottom: 1px solid var(--text-main);
            padding-bottom: 2px;
        }

        .form-group {
            margin-bottom: 3rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.75rem;
            color: var(--text-muted);
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--border);
            color: var(--text-main);
            outline: none;
            font-size: 0.95rem;
            transition: border-color 0.2s ease;
            border-radius: 0;
        }

        .form-control:focus {
            border-bottom-color: var(--text-main);
        }

        select.form-control {
            appearance: none;
            cursor: pointer;
        }

        .alert {
            padding: 1rem 0;
            margin-bottom: 3rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
            font-size: 0.8rem;
            color: var(--text-main);
            text-transform: lowercase;
        }

        .flex-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 4rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">Control</div>
        <div class="nav-links">
            <a href="/">Home</a>
            <a href="{{ route('supplier.index') }}">Suppliers</a>
            <a href="{{ route('produk.index') }}">Products</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
