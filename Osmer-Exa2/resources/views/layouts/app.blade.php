<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', config('app.name'))</title>
    <style>
        :root {
            --bg: #0f1117;
            --surface: #181b24;
            --surface-hover: #1f2430;
            --border: #2a303f;
            --text: #f3f4f6;
            --muted: #9ca3af;
            --accent: #FF7238;
            --accent-hover: #ff5a17;
            --danger: #ef4444;
            --danger-hover: #dc2626;
            --success-bg: rgba(16, 185, 129, 0.14);
            --success-border: #10b981;
            --success-text: #6ee7b7;
        }
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg);
            color: var(--text);
            max-width: 1040px;
            margin: 0 auto;
            padding: 2rem 1.25rem;
            line-height: 1.5;
        }
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 1rem 1.4rem;
            margin-bottom: 1.75rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.25);
        }
        header strong {
            font-size: 1.15rem;
            color: var(--accent);
            letter-spacing: -0.01em;
        }
        .user-bar { display: flex; align-items: center; gap: 0.9rem; font-size: 0.92rem; color: var(--muted); }
        .user-badge { background: rgba(255, 114, 56, 0.14); color: var(--accent); padding: 0.25rem 0.65rem; border-radius: 999px; font-weight: 600; }
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.28);
        }
        h1 { margin: 0 0 1.15rem 0; font-size: 1.55rem; font-weight: 700; color: #ffffff; }
        h2 { margin: 0 0 1.25rem 0; font-size: 1.15rem; font-weight: 500; color: var(--muted); }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1.25rem;
            border: 1px solid var(--border);
            border-radius: 12px;
            overflow: hidden;
        }
        th, td { padding: 0.8rem 0.95rem; text-align: left; border-bottom: 1px solid var(--border); font-size: 0.93rem; }
        th { background: #13161f; color: var(--muted); font-weight: 600; text-transform: uppercase; font-size: 0.78rem; letter-spacing: 0.04em; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: var(--surface-hover); }
        label { display: block; margin-top: 1rem; font-weight: 600; font-size: 0.9rem; color: #e5e7eb; }
        input, select, textarea {
            width: 100%;
            max-width: 460px;
            padding: 0.6rem 0.8rem;
            margin-top: 0.35rem;
            background: #11131a;
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: border-color 0.15s ease;
        }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--accent); }
        button, .boton {
            display: inline-block;
            padding: 0.55rem 1.05rem;
            background: var(--accent);
            color: #ffffff;
            border: 0;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.9rem;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.15s ease, transform 0.1s ease;
        }
        button:hover, .boton:hover { background: var(--accent-hover); }
        td a { color: var(--accent); text-decoration: none; font-weight: 600; margin-right: 0.65rem; }
        td a:hover { text-decoration: underline; }
        td form button { background: var(--danger); padding: 0.38rem 0.75rem; font-size: 0.82rem; border-radius: 8px; }
        td form button:hover { background: var(--danger-hover); }
        header form button { background: transparent; border: 1px solid var(--border); color: var(--text); padding: 0.4rem 0.8rem; font-size: 0.85rem; }
        header form button:hover { border-color: var(--accent); color: var(--accent); background: transparent; }
        form p a { color: var(--muted); text-decoration: none; margin-left: 0.85rem; font-size: 0.92rem; }
        form p a:hover { color: var(--text); }
        .exito { background: var(--success-bg); border: 1px solid var(--success-border); color: var(--success-text); padding: 0.8rem 1rem; border-radius: 12px; margin-bottom: 1.25rem; font-weight: 500; }
        .error { color: #f87171; font-size: 0.86rem; margin-top: 0.3rem; }
        .vacio { text-align: center; color: var(--muted); padding: 2rem; }
        .login-box { max-width: 440px; margin: 3.5rem auto; }
    </style>
</head>
<body>
    @auth
        <header>
            <strong>{{ config('app.name') }}</strong>
            <div class="user-bar">
                <span>Usuario: <span class="user-badge">{{ auth()->user()->usuario }}</span></span>
                <form method="POST" action="{{ route('logout') }}" style="margin:0">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </div>
        </header>
    @endauth

    @if (session('exito'))
        <div class="exito">{{ session('exito') }}</div>
    @endif

    <main class="card">
        @yield('contenido')
    </main>
</body>
</html>