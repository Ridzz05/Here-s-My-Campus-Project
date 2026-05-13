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
            --border: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border-radius: 0 !important;
        }

        body {
            background-color: var(--black);
            color: var(--white);
            font-family: 'Inter', sans-serif;
            line-height: 1.5;
            -webkit-font-smoothing: grayscale;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Unified Global Aurora Background */
        .global-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(
                ellipse at 20% 30%,
                rgba(138, 43, 226, 0.8) 0%,
                rgba(138, 43, 226, 0) 60%
                ),
                radial-gradient(
                ellipse at 80% 50%,
                rgba(0, 191, 255, 0.7) 0%,
                rgba(0, 191, 255, 0) 70%
                ),
                radial-gradient(
                ellipse at 50% 80%,
                rgba(50, 205, 50, 0.6) 0%,
                rgba(50, 205, 50, 0) 65%
                ),
                linear-gradient(135deg, #000000 0%, #0a0520 100%);
            background-blend-mode: overlay, screen, hard-light;
            animation: aurora-drift 25s infinite alternate ease-in-out;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
        }

        .global-bg::before {
            content: "";
            position: absolute;
            width: 200%;
            height: 200%;
            top: -50%;
            left: -50%;
            background: repeating-linear-gradient(
                45deg,
                rgba(255, 255, 255, 0.02) 0px,
                rgba(255, 255, 255, 0.02) 1px,
                transparent 1px,
                transparent 40px
                ),
                repeating-linear-gradient(
                -45deg,
                rgba(255, 255, 255, 0.03) 0px,
                rgba(255, 255, 255, 0.03) 1px,
                transparent 1px,
                transparent 60px
                );
            animation: grid-shift 20s linear infinite;
        }

        .global-bg::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(
                circle at center,
                transparent 70%,
                rgba(10, 5, 32, 0.9) 100%
            );
            animation: aurora-pulse 8s infinite alternate;
        }

        @keyframes aurora-drift {
            0% {
                background-position: 0% 0%, 0% 0%, 0% 0%;
                filter: hue-rotate(0deg) brightness(1);
            }
            50% {
                background-position: -10% -5%, 5% 10%, 0% 15%;
                filter: hue-rotate(30deg) brightness(1.2);
            }
            100% {
                background-position: 5% 10%, -10% -5%, 15% 0%;
                filter: hue-rotate(60deg) brightness(1);
            }
        }

        @keyframes grid-shift {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-50%, -50%); }
        }

        @keyframes aurora-pulse {
            0% { opacity: 0.8; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.05); }
            100% { opacity: 0.8; transform: scale(1); }
        }

        .mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Stark Layout */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
            position: relative;
            z-index: 1;
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
            z-index: 100;
            background: transparent; /* Shared background */
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
            color: var(--white);
            text-decoration: none;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            transition: all 0.3s ease;
            opacity: 0.5;
        }

        .nav-links a:hover, .nav-links a.active {
            opacity: 1;
            padding-left: 0.5rem;
            border-left: 1px solid var(--white);
        }

        .nav-footer {
            color: var(--white);
            font-size: 0.65rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            opacity: 0.3;
        }

        main {
            margin-left: 280px;
            width: calc(100% - 280px);
            padding: 5rem 10% 5rem 5rem;
            min-height: 100vh;
            background: transparent; /* Shared background */
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
            color: rgba(255, 255, 255, 0.4);
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
            color: rgba(255, 255, 255, 0.6);
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
            color: rgba(255, 255, 255, 0.4);
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
            appearance: none; /* Remove default arrow */
        }

        select.form-control {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='1' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right center;
            background-size: 1.2rem;
            padding-right: 2rem;
        }

        select.form-control option {
            background-color: var(--gray-900);
            color: var(--white);
            padding: 1rem;
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

        .void-marker {
            color: rgba(255, 255, 255, 0.2);
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
    <div class="global-bg"></div>

    <div class="app-wrapper">
        <nav class="sidebar">
            <div>
                <div class="brand">Kontrol <span class="void-marker">/ Hampa</span></div>
                <div class="nav-links">
                    <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('supplier.index') }}" class="{{ request()->is('suppliers*') ? 'active' : '' }}">Suplier</a>
                    <a href="{{ route('produk.index') }}" class="{{ request()->is('produk*') ? 'active' : '' }}">Produk</a>
                </div>
            </div>
            <div class="nav-footer">
                Ketiadaan yang terstruktur.
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
