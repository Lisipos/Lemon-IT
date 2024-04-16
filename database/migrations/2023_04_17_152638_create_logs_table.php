<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Cria a tabela "logs"
        Schema::create('logs', function (Blueprint $table) {
            $table->id('id_logs');
            $table->string('acao', 50);
            $table->string('descricao', 200);
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->dateTime('data');
            $table->timestamps();

            // Define a chave estrangeira
            $table->foreign('id_usuario')
                ->references('id_usuario')
                ->on('usuarios')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');

            // Define os índices
            $table->unique('id_logs');
            $table->index('id_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove a chave estrangeira "id_usuario" da tabela "usuario"
        Schema::table('logs', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
        });

        // Remove a tabela "logs"
        Schema::dropIfExists('logs');
    }
}
