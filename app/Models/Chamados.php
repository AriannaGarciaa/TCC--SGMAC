<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chamados extends Model
{
    use HasFactory;
    protected $table = 'chamados';
    protected $guarded = [];

    public static function createTable()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('Local');
            $table->text('DescricaoProblema');
            $table->string('NomePessoa');
            $table->string('status');
            $table->string('solucao');
            $table->string('email');
            $table->string('tipo');

            $table->timestamps();
        });
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'chamados_id', 'id');
    }
}
