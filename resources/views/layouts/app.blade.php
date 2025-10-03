<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUPRIR EPI - Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #212529;
            color: #fff;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            transition: background 0.2s;
        }
        .sidebar a:hover {
            background: #343a40;
            color: #fff;
        }
        .sidebar .active {
            background: #0d6efd;
            color: #fff !important;
        }
        .content {
            padding: 20px;
        }
        footer {
            text-align: center;
            padding: 15px;
            background: #212529;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-3">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <i class="bi bi-box-seam"></i> SUPRIR EPI
        </a>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-2 sidebar p-0">
                <h5 class="p-3">Menu</h5>
                <a href="{{ route('obras.index') }}" class="{{ request()->is('obras*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> Obras
                </a>
                <a href="{{ route('itens.index') }}" class="{{ request()->is('itens*') ? 'active' : '' }}">
                    <i class="bi bi-box"></i> Itens
                </a>
                <a href="{{ route('fornecedores.index') }}" class="{{ request()->is('fornecedores*') ? 'active' : '' }}">
                    <i class="bi bi-truck"></i> Fornecedores
                </a>
                <a href="{{ route('contratos.index') }}" class="{{ request()->is('contratos*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-text"></i> Contratos
                </a>
                <a href="{{ route('estoques.index') }}" class="{{ request()->is('estoques*') ? 'active' : '' }}">
                    <i class="bi bi-boxes"></i> Estoques
                </a>
                <a href="{{ route('consumos.index') }}" class="{{ request()->is('consumos*') ? 'active' : '' }}">
                    <i class="bi bi-arrow-down-square"></i> Consumos
                </a>
            </aside>

            <!-- Conteúdo -->
            <main class="col-md-10 content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} SUPRIR EPI - Todos os direitos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
