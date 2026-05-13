<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VOID - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet">
    <style>
        :root {
            --black: #000000;
            --white: #ffffff;
            --gray-900: #0a0a0a;
            --gray-800: #1a1a1a;
            --gray-700: #333333;
            --gray-600: #666666;
            --gray-400: #a1a1a1;
            --border: #222222;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border-radius: 0 !important; /* Absolute sharp edges */
        }

        body {
            background-color: var(--black);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            line-height: 1.5;
            -webkit-font-smoothing: grayscale;
            overflow-x: hidden;
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Stark Layout */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        nav.sidebar {
            width: 280px;
            border-right: 1px solid var(--border);
            padding: 3rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            height: 100vh;
        }

        .brand {
            font-size: 1.2rem;
            font-weight: 600;
            letter-spacing: -0.05em;
            text-transform: uppercase;
        }

        .nav-links {
            margin-top: 4rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .nav-links a {
            color: var(--gray-400);
            text-decoration: none;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            transition: color 0.3s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--white);
        }

        .nav-footer {
            color: var(--gray-700);
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        main {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 5rem 10% 5rem 5rem;
        }

        /* Typography */
        h1 {
            font-size: 3rem;
            font-weight: 300;
            letter-spacing: -0.07em;
            margin-bottom: 5rem;
            text-transform: lowercase;
        }

        /* Elements */
        .stark-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }

        .stark-table th {
            text-align: left;
            padding: 1rem 0;
            border-bottom: 1px solid var(--border);
            color: var(--gray-600);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-weight: 400;
        }

        .stark-table td {
            padding: 2rem 0;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
            font-weight: 300;
        }

        .btn {
            display: inline-block;
            padding: 1rem 2rem;
            border: 1px solid var(--white);
            background: transparent;
            color: var(--white);
            text-decoration: none;
            text-transform: uppercase;
            font-size: 0.7rem;
            letter-spacing: 0.2em;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn:hover {
            background: var(--white);
            color: var(--black);
        }

        .btn-text {
            border: none;
            padding: 0;
            color: var(--gray-400);
            margin-right: 2rem;
        }

        .btn-text:hover {
            background: transparent;
            color: var(--white);
            text-decoration: underline;
        }

        /* Forms */
        .form-group {
            margin-bottom: 4rem;
            max-width: 600px;
        }

        .form-label {
            display: block;
            color: var(--gray-600);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            margin-bottom: 1rem;
        }

        .form-control {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid var(--border);
            color: var(--white);
            padding: 0.75rem 0;
            font-size: 1.1rem;
            outline: none;
            transition: border-color 0.4s ease;
        }

        .form-control:focus {
            border-bottom-color: var(--white);
        }

        textarea.form-control {
            border: 1px solid var(--border);
            padding: 1rem;
        }

        /* Alerts */
        .alert {
            position: fixed;
            top: 0;
            right: 0;
            padding: 2rem;
            background: var(--white);
            color: var(--black);
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            z-index: 1000;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }

        /* Nihilism Accents */
        .void-marker {
            color: var(--gray-800);
            user-select: none;
            pointer-events: none;
        }

        ::selection {
            background: var(--white);
            color: var(--black);
        }
    </style>
</head>
<body>
    <div class="app-wrapper">
        <nav class="sidebar">
            <div>
                <div class="brand">Control <span class="void-marker">/ Void</span></div>
                <div class="nav-links">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Existence</a>
                    <a href="{{ route('supplier.index') }}" class="{{ request()->is('suppliers*') ? 'active' : '' }}">Origins</a>
                    <a href="{{ route('produk.index') }}" class="{{ request()->is('produk*') ? 'active' : '' }}">Manifestations</a>
                </div>
            </div>
            <div class="nav-footer">
                Nothingness is structured.
            </div>
        </nav>

        <main>
            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        // Auto hide alert
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) alert.style.display = 'none';
        }, 5000);
    </script>
</body>
</html>
