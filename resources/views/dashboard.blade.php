<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-6">
                <!-- Card Agendamentos -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-bold text-blue-900 mb-4">CHAMADOS</h3>
                    <ul class="text-gray-700 mb-4 text-left">
                        <li>- Laboratório A</li>
                        <li>- Sala de Aula 1</li>
                        <li>- Auditório</li>
                    </ul>
                    <a href="/chamados" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800 inline-block text-center">VER</a>
                </div>
                
                <!-- Card Equipamentos -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-bold text-blue-900 mb-4">EQUIPAMENTOS</h3>
                    <ul class="text-gray-700 mb-4 text-left">
                        <li>- Laboratório A</li>
                        <li>- Sala de Aula 1</li>
                        <li>- Auditório</li>
                    </ul>
                    <a href="/equipamentos" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800 inline-block text-center">VER</a>
                </div>
                
                <!-- Card Locais -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-bold text-blue-900 mb-4">LOCAIS</h3>
                    <ul class="text-gray-700 mb-4 text-left">
                        <li>- Laboratório A</li>
                        <li>- Sala de Aula 1</li>
                        <li>- Auditório</li>
                    </ul>
                    <a href="/locais" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800 inline-block text-center">VER</a>
                </div>

                <!-- Card Manutenções -->
                
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-bold text-blue-900 mb-4">MANUTENÇÕES PENDENTES</h3>
                        @if(isset($manutencoes) && count($manutencoes))
                            <ul class="text-gray-700 text-left w-full max-w-2xl">
                                @foreach($manutencoes as $manutencao)
                                    @if($manutencao->Status === 'Pendente')
                                        <li class="mb-2">- {{ $manutencao->Problema }} ({{ $manutencao->Local ?? 'Local não informado' }})</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <span class="text-gray-500">Nenhuma manutenção pendente.</span>
                    
                        @endif

                        <a href="/manutencoes" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800 inline-block text-center">VER</a>

                    
            </div>
        </div>
    </div>
</div>

</x-app-layout>
