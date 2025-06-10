<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('tecnico_id')->constrained('tecnicos')->onDelete('cascade');
            $table->text('Problema', 300);
            $table->foreignId('equipamentos_id')->constrained('equipamentos')->onDelete('cascade');
            $table->foreignId('local_id')->constrained('locais')->onDelete('cascade');
            $table->text('Solucao', 300);
            $table->string('Status', 20);
            $table->string('TipoManutencao', 50);
            $table->date('DataAbertura');
            $table->date('DataUltimaAtualizacao')->nullable();
            $table->string('NumeroDaOrdemDeServico', 300)->nullable();
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manutencoes');
    }

   
};
