@extends('layouts.pdf')

@section('title', 'Relatório de Manutenções')




@section('content')
    

    @foreach ($manutencoes as $manutencao)
    <div class="manutencao">

        <div class="field"><span class="label">Usuario</span> {{ $manutencao->user->name }}</div>
        <div class="field"><span class="label">Técnico</span> {{ $manutencao->tecnico->nome }}</div>
        <div class="field"><span class="label">Problema</span>{{ $manutencao->Problema }}</div>
        <div class="field"><span class="label">Solução</span> {{ $manutencao->Solucao }}</div>
        <div class="field"><span class="label">Equipamentos</span>{{ $manutencao->equipamentos->Marca}}</div>
        <div class="field"><span class="label">Local</span> {{ $manutencao->local->bloco}} - {{ $manutencao->local->sala }}</div>
        <div class="field"><span class="label">Status</span>{{ $manutencao->Status }}</div>
        <div class="field"><span class="label">Tipo</span> {{ $manutencao->TipoManutencao}}</div>
        <div class="field"><span class="label">Data de Abertura</span> {{ \Carbon\Carbon::parse($manutencao->DataAbertura)->format('d/m/Y') }}</div>
        <div class="field"><span class="label">Ultima Atualização</span> {{ \Carbon\Carbon::parse($manutencao->DataUltimaAtualizacao)->format('d/m/Y') }}</div>
        <div class="field"><span class="label">Nº Ordem de Serviço </span> {{ $manutencao->NumeroDaOrdemDeServico }}</div>


    </div>
   @endforeach
@endsection