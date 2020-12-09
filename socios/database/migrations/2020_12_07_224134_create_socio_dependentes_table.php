<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_dependentes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('socio_id')->unsigned()->nullable();
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');

            $table->bigInteger('dependente_id')->unsigned()->nullable();
            $table->foreign('dependente_id')->references('id')->on('dependentes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socio_dependentes');
    }
}
