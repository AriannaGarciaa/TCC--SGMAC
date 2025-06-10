@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Adicionar Manutenção</h2>
        <a href="{{ route('manutencoes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
    </div>

   
    <form action="{{ route('manutencoes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <!-- Usuário responsável -->
        <div class="mb-4">
            <label class="block font-bold mb-2">Usuário Responsável</label>
            <select name="user_id" class="w-full border px-3 py-2 rounded" value="{{ auth()->user()->id }}"required>
          
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block font-bold mb-2">Técnico Responsável</label>
            <select name="tecnico_id" class="w-full border px-3 py-2 rounded" required>
            
                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id }}">{{ $tecnico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Problema</label>
            <input type="text" name="Problema" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Equipamento</label>
            <select name="equipamentos_id" class="w-full border px-3 py-2 rounded" required>
               
                @foreach($equipamentos as $equipamento)
                    <option value="{{ $equipamento->id }}">{{ $equipamento->Marca }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Local</label>
            <select name="local_id" class="w-full border px-3 py-2 rounded" required>
                
                @foreach($local as $local)
                    <option value="{{ $local->id }}">{{ $local->bloco }} - {{ $local->sala }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="Solucao" class="block font-bold mb-2">Solução</label>
            <input type="text" name="Solucao" id="Solucao" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Status</label>
            <select name="Status" class="w-full border px-3 py-2 rounded" required>
                <option value="Aberto">Aberto</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluído">Concluído</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Tipo de Manutenção</label>
            <select name="TipoManutencao" class="w-full border px-3 py-2 rounded" required>
            <option value="Preventiva">Preventiva</option>
            <option value="Corretiva">Corretiva</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Data de Abertura</label>
            <input type="date" name="DataAbertura" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Última Atualização</label>
            <input type="date" name="DataUltimaAtualizacao" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Nº OS</label>
            <input type="text" name="NumeroDaOrdemDeServico" class="w-full border px-3 py-2 rounded" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Salvar</button>
    </form>
</div>
@endsection