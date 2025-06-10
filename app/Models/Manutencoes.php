<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manutencoes extends Model
{
    use HasFactory;

    protected $table = 'manutencoes'; 

    protected $fillable = [
        'user_id',
        'tecnico_id',
        'Problema',
        'equipamentos_id',
        'local_id',
        'Solucao',
        'Status',
        'TipoManutencao',
        'DataAbertura',
        'DataUltimaAtualizacao',
        'NumeroDaOrdemDeServico'
    ];

    public function tecnico()
    {
        return $this->belongsTo(TecnicoManutencao::class, 'tecnico_id');
    }

    public function equipamentos()
{
    return $this->belongsTo(Equipamentos::class, 'equipamentos_id');
}


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }

}
