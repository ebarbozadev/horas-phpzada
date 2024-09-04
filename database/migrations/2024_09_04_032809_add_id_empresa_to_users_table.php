<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdEmpresaToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Adiciona a coluna e a chave estrangeira, se ainda não existir
            if (!Schema::hasColumn('usuarios', 'ID_EMPRESA')) {
                $table->unsignedBigInteger('ID_EMPRESA')->default(1);
                $table->foreign('ID_EMPRESA')->references('id')->on('empresas')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Remove a chave estrangeira, se existir
            if (Schema::hasColumn('usuarios', 'ID_EMPRESA')) {
                $table->dropForeign(['ID_EMPRESA']);
                $table->dropColumn('ID_EMPRESA');
            }
        });
    }
}
