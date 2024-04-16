<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeloAparelhoIpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelo_aparelho_ip', function (Blueprint $table) {
            $table->id('id_modelo_aparelho_ip');
            $table->string('modelo_aparelho_ip', 45)->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *2023_05_22_102745_create_modelo_aparelho_ip_table.php
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelo_aparelho_ip');
    }
}
