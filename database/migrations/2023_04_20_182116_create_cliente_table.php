<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id('id_cliente');
            $table->string('nome_cliente', 45);
            $table->string('razao_social', 200)->nullable();
            $table->string('nome_fantasia', 200)->nullable();
            $table->string('cnpj', 18)->nullable();
            $table->string('cpf', 14)->nullable();
            $table->string('inscricao_estadual', 9)->nullable();
            $table->string('inscricao_municipal', 11)->nullable();
            $table->string('email_principal', 100)->nullable();
            $table->string('logradouro', 200)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('telefone_principal', 14)->nullable();
            $table->string('responsavel', 45)->nullable();
            $table->string('telefone_responsavel', 15)->nullable();
            $table->string('email_responsavel', 100)->nullable();
            $table->string('site', 100)->nullable();
            $table->string('url_contrato', 200)->nullable();
            $table->unsignedBigInteger('id_status_contrato');
            $table->string('url_proposta', 200)->nullable();
            $table->string('observacao', 500)->nullable();
            $table->string('helpdesk', 3)->nullable();
            $table->string('link_internet', 3)->nullable();
            $table->string('voip', 3)->nullable();
            $table->string('pabx_analogico', 3)->nullable();
            $table->string('cftv', 3)->nullable();
            $table->string('firewall', 3)->nullable();
            $table->string('computador', 3)->nullable();
            $table->string('aparelho_ip', 3)->nullable();
            $table->string('impressora', 3)->nullable();
            $table->string('pabx', 3)->nullable();
            $table->string('dvr', 3)->nullable();
            $table->string('locacao_firewall', 3)->nullable();
            $table->string('modem', 3)->nullable();

            $table->timestamps();

            $table->unique('id_cliente');
            $table->unique('nome_cliente');
            $table->unique('razao_social');
            $table->unique('nome_fantasia');
            $table->index('id_status_contrato');

            $table->foreign('id_status_contrato')
                ->references('id_status_contrato')
                ->on('status_contrato')
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
        Schema::table('cliente', function (Blueprint $table) {
            $table->dropForeign(['id_status_contrato']);
        });
        Schema::dropIfExists('cliente');
    }
}
