@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <h1 class="text-2xl font-bold mb-6 text-center">Criar Novo Chamado</h1>

    <form action="{{ route('chamados.store') }}" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
        @csrf
        <!-- Campo de Tipo de Chamado adm estagiario-->
<div class ="mb-3">
    <input type="hidden" name="NomePessoa" id="NomePessoa" value="{{ Auth::user()->name }}">

        <div class="mb-3">
            <label for="Local" class="form-label block text-gray-700 font-semibold mb-2">Local (Bloco/Sala):</label>
            <select name="Local" id="Local"class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
                <option value="">Selecione o local </option>
                @foreach($local as $local)
                <option value="{{ $local->id }}">{{ $local->bloco }} - {{ $local->sala }}</option>
                @endforeach

            </select>
                
        </div>

        <div class="mb-3">
            <label for="DescricaoProblema" class="form-label block text-gray-700 font-semibold mb-2">Descrição do Problema:</label>
            <input type="text" name="DescricaoProblema" id="DescricaoProblema" class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"  required>
        </div>

        <div class="mb-3">
            <label for="solucao" class="form-label block text-gray-700 font-semibold mb-2">Solução:</label>
        <input type="text" name="solucao" id="solucao"class="form-control w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        </div>
    
       
        <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-lg hover:bg-blue-800">Salvar</button>
    </form>
</div>
@endsection
