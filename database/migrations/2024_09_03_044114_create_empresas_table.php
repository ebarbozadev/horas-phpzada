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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('RAZAO_SOCIAL'); // Razão Social
            $table->string('NOME_FANTASIA'); // Nome Fantasia
            $table->enum('TP_PESSOA', ['F', 'J']); // Tipo de Pessoa (Física ou Jurídica)
            $table->string('DOCUMENTO'); // Documento (CPF ou CNPJ)
            $table->boolean('ATIVO')->default(true); // Status (Ativo/Inativo)
            $table->timestamp('DATA_CRIACAO')->useCurrent(); // Data de Criação
            $table->timestamp('DATA_MODIFICACAO')->useCurrent()->nullable(); // Data de Modificação
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};