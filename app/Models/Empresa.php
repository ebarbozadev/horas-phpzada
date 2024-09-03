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
            $table->string('razao_social'); // Razão Social
            $table->string('nome_fantasia'); // Nome Fantasia
            $table->enum('tp_pessoa', ['F', 'J']); // Tipo de Pessoa (Física ou Jurídica)
            $table->string('documento'); // Documento (CPF ou CNPJ)
            $table->boolean('ativo')->default(true); // Status (Ativo/Inativo)
            $table->timestamp('data_criacao')->useCurrent(); // Data de Criação
            $table->timestamp('data_modificacao')->useCurrent()->nullable(); // Data de Modificação
            $table->timestamps(); // Campos created_at e updated_at automáticos do Laravel
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};