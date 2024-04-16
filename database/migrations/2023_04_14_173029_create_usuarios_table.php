<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cria a tabela "autorizacao"
        Schema::create('autorizacao', function (Blueprint $table) {
            $table->id('id_autorizacao');
            $table->string('autorizacao', 45)->unique();
            $table->timestamps();
        });

        // Cria a tabela "usuario"
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nome_usuario', 45);
            $table->string('email_usuario', 100);
            $table->string('senha_usuario', 45);
            $table->unsignedBigInteger('id_autorizacao');
            $table->string('url_ass', 45);
            $table->string('url_img_perfil', 45);
            $table->timestamps();

            // Define as chaves estrangeiras
            $table->foreign('id_autorizacao')
                ->references('id_autorizacao')
                ->on('autorizacao')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove a chave estrangeira "id_autorizacao" da tabela "usuario"
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_autorizacao']);
        });
          // Remove as tabelas em ordem reversa
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('autorizacao');
    }
}
