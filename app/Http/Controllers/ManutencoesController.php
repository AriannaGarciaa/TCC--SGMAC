<?php

namespace App\Http\Controllers;

use App\Models\Manutencoes;
use App\Models\User;
use App\Models\Local;
use App\Models\TecnicoManutencao;
use App\Models\Equipamentos;
use Illuminate\Http\Request;
 use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class ManutencoesController extends Controller
{
    // Lista todas as manutenções com equipamentos relacionados
    public function index()
    {
        $manutencoes = Manutencoes::with('user','tecnico','equipamentos','local')->get();
        return view('manutencoes.index', compact('manutencoes'));
    }

    // Mostra o formulário de criação de manutenção
    public function create()
    {
        $equipamentos = Equipamentos::all();
        $local = Local::all();
        $users = User::all();
        $tecnicos = TecnicoManutencao::all();
        return view('manutencoes.create', compact('equipamentos', 'users', 'tecnicos', 'local'));
    }

    // Salva uma nova manutenção com equipamentos relacionados
    public function store(Request $request)
    {
        $manutencao = new Manutencoes();
        $manutencao->user_id = $request->user_id;
        $manutencao->tecnico_id = $request->tecnico_id;
        $manutencao->equipamentos_id= $request->equipamentos_id;
        $manutencao->local_id= $request->local_id;
        $manutencao->Problema = $request->Problema;
        $manutencao->Solucao = $request->Solucao;
        $manutencao->Status = $request->Status;
        $manutencao->TipoManutencao = $request->TipoManutencao;
        $manutencao->DataAbertura = $request->DataAbertura;
        $manutencao->DataUltimaAtualizacao = $request->DataUltimaAtualizacao;
        $manutencao->NumeroDaOrdemDeServico = $request->NumeroDaOrdemDeServico;

        $manutencao->save();

        return redirect()->route('manutencoes.index')->with('success', 'Manutenção criada com sucesso!');
    }

    public function show($id)
    {
        $manutencao = Manutencoes::with('equipamentos')->findOrFail($id);
        return view('manutencoes.show', compact('manutencao'));
    }

    public function edit($id)
    {
        $manutencao = Manutencoes::findOrFail($id);
        $equipamentos = Equipamentos::all();
        return view('manutencoes.edit', compact('manutencao', 'equipamentos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'Problema' => 'required|string',
            'equipamentos_id' => 'required|array',
            'local_id' => 'required|exists:local,id',
            'Solucao' => 'required|string',
            'Status' => 'required|string',
            'TipoManutencao' => 'required|string',
            'DataAbertura' => 'required|date',
            'DataUltimaAtualizacao' => 'nullable|date',
            'NumeroDaOrdemDeServico' => 'nullable|string',
            
        ]);

        $manutencao = Manutencoes::findOrFail($id);
        $manutencao->update($data);

        if ($request->has('equipamentos')) {
            $manutencao->equipamentos()->sync($request->equipamentos);
        }

        return redirect()->route('manutencoes.index')->with('success', 'Manutenção atualizada com sucesso!');
    }

  
    public function destroy($id)
    {
        $manutencao = Manutencoes::findOrFail($id);
        $manutencao->delete();

        return redirect()->route('manutencoes.index')->with('success', 'Manutenção removida com sucesso!');
    }


    // gerar relatorio
  public function relatorio() {
    $manutencao = Manutencoes::orderByDesc('created_at')->get();

    $pdf = PDF::loadView('manutencoes.relatorio', ['manutencoes' => $manutencao])->setPaper('a4', 'portrait');

    return $pdf->stream('manutencoes-relatorio.pdf');
}



}