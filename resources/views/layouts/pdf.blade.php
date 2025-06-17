<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Relatório')</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            line-height: 1.6;
            padding: 30px;
            color: #111827;
        }

        .logo {
            text-align: center;
            font-weight: bold;
            color: #16a34a;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
        }

        .manutencao {
            margin-bottom: 25px;
            border-bottom: 1px dashed #d1d5db;
            padding-bottom: 15px;
        }

        .manutencao h2 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2563eb;
        }

        .field {
            margin-bottom: 4px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>
<body>


    <h1>@yield('title', 'Relatório')</h1>

    @yield('content')

</body>
</html>
