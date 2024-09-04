<!-- resources/views/layouts/painel.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        header {
            border-color: gray;
            padding: 10px;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, .4);
        }

        a {
            text-decoration: none;
        }

        header h1 {
            font-size: 2rem;
        }

        .container {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <nav>
                <a href={{ url('/painel') }}>
                    <h1>Painel Administrativo</h1>
                </a>
            </nav>
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
