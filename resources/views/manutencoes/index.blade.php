@extends('layouts.app')

@section('content')
<div class="container mx-auto py-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Lista de Manutenções</h2>
        <a href="{{ route('manutencoes.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Adicionar Manutenção</a>
        <a href="{{ route('manutencoes.relatorio') }}" class="bg-pink-500 text-white px-4 py-2 rounded">Gerar Relatorio</a>

    </div>
    <table class="min-w-full bg-white border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border">ID:</th>
                <th class="py-2 px-4 border">Usuário Responsável:</th>
                <th class="py-2 px-4 border">Técnico Responsável:</th>
                <th class="py-2 px-4 border">Problema:</th>
                <th class="py-2 px-4 border">Equipamento </th>
                <th class="py-2 px-4 border">Local: bloco/sala</th>
                <th class="py-2 px-4 border">Solução:</th>
                <th class="py-2 px-4 border">Status:</th>
                <th class="py-2 px-4 border">Tipo:</th>
                <th class="py-2 px-4 border">Data de Abertura:</th>
                <th class="py-2 px-4 border">Última Atualização:</th>
                <th class="py-2 px-4 border">Nº OS:</th>
                <th class="py-2 px-4">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($manutencoes as $manutencao)
            <tr>
                <td class="py-2 px-4 border">{{ $manutencao->id }}</td>
                <td class="py-2 px-4 border">{{ $manutencao->user->name }}</td>
                <td class="py-2 px-4 border">{{ $manutencao->tecnico->nome }}</td>
                <td class="py-2 px-4 border">{{ $manutencao->Problema }}</td>
                <td class="py-2 px-4 border">{{ $manutencao->equipamentos->Marca}}</td>
                <td class="py-2 px-4 border">{{ $manutencao->local->bloco }} - {{ $manutencao->local->sala }}</td> 
                <td class="py-2 px-4 border">{{ $manutencao->Solucao }}</td>
                <td class="py-2 px-4 border">{{ $manutencao->Status }}</td>
                <td class="py-2 px-4 border">{{ $manutencao->TipoManutencao }}</td>
                <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($manutencao->DataAbertura)->format('d/m/Y') }}</td>
                <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($manutencao->DataUltimaAtualizacao)->format('d/m/Y') }}</td>

                <td class="py-2 px-4 border">{{ $manutencao->NumeroDaOrdemDeServico }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('manutencoes.show', $manutencao->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Ver</a>
                    <a href="{{ route('manutencoes.edit', $manutencao->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Editar</a>
                    <form action="{{ route('manutencoes.destroy', $manutencao->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection