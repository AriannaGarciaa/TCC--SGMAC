<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamado de Manutenção</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-extrabold text-center text-blue-900 mb-6">
            Abrir Chamado de Manutenção de Ar Condicionado
        </h2>

        <form method="POST" action="{{ route('chamadosExternos.store') }}" class="space-y-4">
            @csrf

            <div>
                <label for="NomePessoa" class="block text-gray-700 font-semibold mb-1">Seu nome:</label>
                <input type="text" name="NomePessoa" id="NomePessoa"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-1">Seu e-mail:</label>
                <input type="email" name="email" id="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label for="Local" class="block text-gray-700 font-semibold mb-1">Local (Bloco/Sala):</label>
                <input type="text" name="Local" id="Local"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <label for="DescricaoProblema" class="block text-gray-700 font-semibold mb-1">Descreva o problema:</label>
                <textarea name="DescricaoProblema" id="DescricaoProblema" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required></textarea>
            </div>

            <button type="submit"
                class="w-full bg-blue-900 text-white py-2 rounded-lg font-semibold hover:bg-blue-800 transition duration-200">
                Enviar
            </button>
        </form>
    </div>

</body>
</html>
