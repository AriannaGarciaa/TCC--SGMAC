<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Relatório PDF')</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            max-height: 80px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th, .table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        .table th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ public_path('images/logo-ifms.png') }}" alt="Logo IFMS">
        <h2>@yield('title')</h2>
    </div>

    @yield('content')

</body>
</html>
