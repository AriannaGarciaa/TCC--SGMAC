<?php

namespace App\Http\Controllers;

use App\Models\Chamados;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChamadosController extends Controller
{
    // Formulário externo (sem login)
    public function createExterno()
    {
        return view('chamadosExternos.create');
    }

    // Salvar chamado vindo de formulário externo
 public function storeExterno(Request $request)
{
    $chamado = new Chamados();
    $chamado->Local = $request->Local;
    $chamado->DescricaoProblema = $request->DescricaoProblema;
    $chamado->NomePessoa = $request->NomePessoa;
    $chamado->email = $request->email;
    $chamado->tipo = 'Externo';
    
    $chamado->save();

    return redirect()->route('chamadosExternos.show', $chamado->id)->with('success', 'Chamado enviado com sucesso!');
}

public function showExterno($id)
{
    $chamado = Chamados::findOrFail($id);
    return view('chamadosExternos.show', compact('chamado'));
}
   
    public function index()
    {
        $chamados = Chamados::orderBy('created_at', 'desc')->get();
        return view('chamados.index', compact('chamados'));
    }

    // Exibe os detalhes de um chamado específico
    public function show($id)
    {
        $chamado = Chamados::findOrFail($id);
        return view('chamados.show', compact('chamado'));
    }

    // Exibe o formulário de criação (tela interna)
    public function create()
    {
        return view('chamados.create');
    }

    // Salva um novo chamado (via painel interno)
    public function store(Request $request)
    {

        $chamado = new Chamados();
        $chamado->NomePessoa = $request->NomePessoa;
        $chamado->Local = $request->Local;
        $chamado->DescricaoProblema = $request->DescricaoProblema;
        $chamado->solucao = $request->solucao;
        $chamado->tipo = 'Interno';

        $chamado->save();

        return redirect()->route('chamados.index')->with('success', 'Chamado criado com sucesso!');
    }

    // Formulário de edição
    public function edit($id)
    {
        $chamado = Chamados::findOrFail($id);
        return view('chamados.edit', compact('chamado'));
    }

    // Atualiza um chamado
    public function update(Request $request, $id)
    {
        $request->validate([
            'Local' => 'required|string|max:100',
            'DescricaoProblema' => 'required|string|max:300',
            'status' => 'required|in:aberto,em andamento,finalizado',
            'solucao' => 'nullable|string|max:300',
        ]);

        $chamado = Chamados::findOrFail($id);
        $chamado->update($request->all());

        return redirect()->route('chamados.index')->with('success', 'Chamado atualizado com sucesso!');
    }

    // Deleta um chamado
    public function destroy($id)
    {
        Chamados::destroy($id);
        return redirect()->route('chamados.index')->with('success', 'Chamado deletado com sucesso!');
    }
}
