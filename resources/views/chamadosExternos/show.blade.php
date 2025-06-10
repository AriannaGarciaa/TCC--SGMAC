<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Chamado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md text-center">
            <h1 class="text-2xl font-bold text-blue-700 mb-4">Chamado enviado com sucesso!</h1>
            <p class="mb-6 text-gray-700">Detalhes do chamado:</p>
            
            <div class="text-left">
                <p><strong>Nome:</strong> {{ $chamado->NomePessoa }}</p>
                <p><strong>Email:</strong> {{ $chamado->email }}</p>
                <p><strong>Local:</strong> {{ $chamado->Local }}</p>
                <p><strong>Problema:</strong> {{ $chamado->DescricaoProblema }}</p>
                <p><strong>Data:</strong> {{ $chamado->created_at->format('d/m/Y') }}</p>
            </div>

            <a href="{{ route('chamadosExternos.create') }}" class="mt-6 inline-block bg-blue-800 text-white py-2 px-4 rounded hover:bg-green-700">
                Abrir novo chamado
            </a>
        </div>
    </div>
</body>
</html>
