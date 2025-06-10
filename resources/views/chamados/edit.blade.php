@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Editar Chamado</h1>
    <form action="{{ route('chamados.update', $chamado->id) }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        @csrf
        @method('PUT')
       
            <input type="hidden" name="NomePessoa" id="NomePessoa" value="{{ Auth::user()->name }}">

        <div class="mb-3">
            <label for="Local" class="form-label block text-gray-700 font-semibold mb-2">Local (Bloco/Sala):</label>
            <input type="text" name="Local" id="Local"class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $chamado->Local }}" required>
        </div>

        <div class="mb-3">
            <label for="DescricaoProblema" class="form-label block text-gray-700 font-semibold mb-2">Descrição do Problema:</label>
            <input type="text" name="DescricaoProblema" id="DescricaoProblema" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$chamado->DescricaoProblema}}" required>
        </div>

        <div class="mb-3">
            <label for="solucao" class="form-label block text-gray-700 font-semibold mb-2">Solução:</label>
        <input type="text" name="solucao" id="solucao"class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{$chamado->solucao}}"required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label block text-gray-700 font-semibold mb-2">Status:</label>
            <select name="status" id="status" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="aberto" {{ $chamado->status == 'aberto' ? 'selected' : '' }}>Aberto</option>
                <option value="em andamento" {{ $chamado->status == 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="finalizado" {{ $chamado->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
            </select>
        </div>
        
    
        <div class="flex justify-between">
            <button type="submit" class="w-1/2 bg-green-900 text-white py-2 rounded-lg hover:bg-green-800 mr-2">Salvar</button>
            <a href="{{ route('equipamentos.index') }}" class="w-1/2 bg-red-900 text-white py-2 rounded-lg hover:bg-red-800 ml-2 text-center">Cancelar</a>
        </div>
        </form>
</div>
@endsection
