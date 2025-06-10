<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\ChamadosController;
use App\Http\Controllers\TecnicoManutencaoController;
use App\Http\Controllers\ChamadosExternosController;
use App\Http\Controllers\ManutencoesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para Locais
    Route::get('/locais', [LocalController::class, 'index'])->name('locais.index');
    Route::get('/locais/create', [LocalController::class, 'create'])->name('locais.create');
    Route::post('/locais', [LocalController::class, 'store'])->name('locais.store');
    Route::get('/locais/{local}', [LocalController::class, 'show'])->name('locais.show');
    Route::get('/locais/{local}/edit', [LocalController::class, 'edit'])->name('locais.edit');
    Route::put('/locais/{local}', [LocalController::class, 'update'])->name('locais.update');
    Route::delete('/locais/{local}', [LocalController::class, 'destroy'])->name('locais.destroy');
    
    

    // Rotas para Equipamentos
    Route::get('/equipamentos', [EquipamentosController::class, 'index'])->name('equipamentos.index');
    Route::get('/equipamentos/create', [EquipamentosController::class, 'create'])->name('equipamentos.create');
    Route::post('/equipamentos', [EquipamentosController::class, 'store'])->name('equipamentos.store');
    Route::get('/equipamentos/{equipamento}', [EquipamentosController::class, 'show'])->name('equipamentos.show');
    Route::get('/equipamentos/{equipamento}/edit', [EquipamentosController::class, 'edit'])->name('equipamentos.edit');
    Route::put('/equipamentos/{equipamento}', [EquipamentosController::class, 'update'])->name('equipamentos.update');
    Route::delete('/equipamentos/{equipamento}', [EquipamentosController::class, 'destroy'])->name('equipamentos.destroy');


    // Rotas para chamados
    Route::get('/chamados', [ChamadosController::class, 'index'])->name('chamados.index');
    Route::get('/chamados/create', [ChamadosController::class, 'create'])->name('chamados.create');
    Route::post('/chamados', [ChamadosController::class, 'store'])->name('chamados.store');
    Route::get('/chamados/{chamado}', [ChamadosController::class, 'show'])->name('chamados.show');
    Route::get('/chamados/{chamado}/edit', [ChamadosController::class, 'edit'])->name('chamados.edit');
    Route::put('/chamados/{chamado}', [ChamadosController::class, 'update'])->name('chamados.update');
    Route::delete('/chamados/{chamado}', [ChamadosController::class, 'destroy'])->name('chamados.destroy');
    


    //Rotas para Tecnico em manutenção
    Route::get('/tecnicos', [TecnicoManutencaoController::class, 'index'])->name('tecnicos.index');
    
    Route::get('/tecnicos/create', [TecnicoManutencaoController::class, 'create'])->name('tecnicos.create');
    Route::post('/tecnicos', [TecnicoManutencaoController::class, 'store'])->name('tecnicos.store');
    Route::get('/tecnicos/{tecnico}', [TecnicoManutencaoController::class, 'show'])->name('tecnicos.show');
    Route::get('/tecnicos/{tecnico}/edit', [TecnicoManutencaoController::class, 'edit'])->name('tecnicos.edit');
    Route::put('/tecnicos/{tecnico}', [TecnicoManutencaoController::class, 'update'])->name('tecnicos.update');
    Route::delete('/tecnicos/{tecnico}', [TecnicoManutencaoController::class, 'destroy'])->name('tecnicos.destroy');
    
    //Rotas de manutençõe
    Route::get('/manutencoes', [ManutencoesController::class, 'index'])->name('manutencoes.index');
    Route::get('/manutencoes/create', [ManutencoesController::class, 'create'])->name('manutencoes.create');
    Route::post('/manutencoes', [ManutencoesController::class, 'store'])->name('manutencoes.store');
    Route::get('/manutencoes/{manutencao}', [ManutencoesController::class, 'show'])->name('manutencoes.show');
    Route::get('/manutencoes/{manutencao}/edit', [ManutencoesController::class, 'edit'])->name('manutencoes.edit');
    Route::put('/manutencoes/{manutencao}', [ManutencoesController::class, 'update'])->name('manutencoes.update');
    Route::delete('/manutencoes/{manutencao}', [ManutencoesController::class, 'destroy'])->name('manutencoes.destroy');

    
});


// Rotas de chamados externos (acesso público)
// Formulário externo
Route::get('/chamadosExternos/create', [ChamadosController::class, 'createExterno'])->name('chamadosExternos.create');
Route::post('/chamadosExternos', [ChamadosController::class, 'storeExterno'])->name('chamadosExternos.store');
Route::get('/chamadosExternos/{chamado}', [ChamadosController::class,'showExterno'])->name('chamadosExternos.show');


//Gerar relatorio
Route::get('/manutencoes/relatorio', [ManutencoesController::class, 'relatorio'])->name('manutencoes.relatorio');


require __DIR__.'/auth.php';
