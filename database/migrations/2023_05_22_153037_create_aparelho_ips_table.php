<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparelhoIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparelho_ip', function (Blueprint $table) {
            $table->id('id_aparelho_ip');
            $table->unsignedBigInteger('id_modelo_aparelho_ip');
            $table->string('serial_number', 50)->nullable();
            $table->string('mac_address', 17)->nullable();
            $table->string('bem_patrimonial', 6)->nullable();
            $table->string('bem_patrimonial_base', 6)->nullable();
            $table->unsignedBigInteger('id_status_aparelho_ip');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('cadastrado_por');
            $table->string('url_foto', 45)->nullable();
            $table->unsignedBigInteger('id_fonte')->nullable();
            $table->string('base', 45)->nullable();
            $table->string('monofone', 45)->nullable();
            $table->string('espiral', 45)->nullable();
            $table->string('observacao', 100)->nullable();
            $table->unsignedBigInteger('alterado_por')->nullable();
            $table->unsignedBigInteger('id_ultimo_cliente')->nullable();
            $table->unique('id_aparelho_ip');
            // $table->unique('serial_number');
            $table->unique('mac_address');
            $table->unique('bem_patrimonial');
            $table->unique('bem_patrimonial_base');
            $table->unique('url_foto');
            $table->index('id_ultimo_cliente');
            $table->foreign('id_modelo_aparelho_ip')
                ->references('id_modelo_aparelho_ip')
                ->on('modelo_aparelho_ip')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('id_status_aparelho_ip')
                ->references('id_status_aparelho_ip')
                ->on('status_aparelho_ip')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('id_cliente')
                ->references('id_cliente')
                ->on('cliente')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('cadastrado_por')
                ->references('id_usuario')
                ->on('usuarios')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('alterado_por')
                ->references('id_usuario')
                ->on('usuarios')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('id_fonte')
                ->references('id_fonte')
                ->on('fontes')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('id_ultimo_cliente')
                ->references('id_cliente')
                ->on('cliente')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aparelho_ip', function (Blueprint $table) {
            $table->dropForeign(['id_modelo_aparelho_ip']);
            $table->dropForeign(['id_status_aparelho_ip']);
            $table->dropForeign(['id_cliente']);
            $table->dropForeign(['cadastrado_por']);
            $table->dropForeign(['alterado_por']);
            $table->dropForeign(['id_fonte']);
            $table->dropForeign(['id_ultimo_cliente']);
        });
        Schema::dropIfExists('aparelho_ip   ');
    }
}
