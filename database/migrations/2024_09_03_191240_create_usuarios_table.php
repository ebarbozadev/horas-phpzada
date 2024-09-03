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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->integer('ID_EMPRESA')->constrained('empresas');
            $table->string('NOME');
            $table->string('EMAIL');
            $table->string('SENHA');
            $table->boolean('ATIVO')->default(true); // Status (Ativo/Inativo)
            $table->timestamp('DATA_CRIACAO')->useCurrent(); // Data de Criação
            $table->timestamp('DATA_MODIFICACAO')->useCurrent()->nullable(); // Data de Modificação
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
