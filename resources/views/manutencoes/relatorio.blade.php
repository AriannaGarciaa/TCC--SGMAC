@extends('layouts.pdf')

@section('title', 'Relatório de Manutenções')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Técnico</th>
                <th>Problema</th>
                <th>Equipamento</th>
                <th>Local</th>
                <th>Solução</th>
                <th>Status</th>
                <th>Tipo</th>
                <th>Abertura</th>
                <th>Atualização</th>
                <th>OS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($manutencoes as $manutencao)
            <tr>
                <td>{{ $manutencao->id }}</td>
                <td>{{ $manutencao->user->name }}</td>
                <td>{{ $manutencao->tecnico->nome }}</td>
                <td>{{ $manutencao->Problema }}</td>
                <td>{{ $manutencao->equipamentos->Marca }}</td>
                <td>{{ $manutencao->local->bloco }} - {{ $manutencao->local->sala }}</td>
                <td>{{ $manutencao->solucao }}</td>
                <td>{{ $manutencao->Status }}</td>
                <td>{{ $manutencao->TipoManutencao }}</td>
                <td>{{ $manutencao->DataAbertura->format('d/m/Y')}}</td>
                <td>{{ $manutencao->DataUltimaAtualizacao->format('d/m/Y') }}</td>
                <td>{{ $manutencao->NumeroDaOrdemDeServico }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
