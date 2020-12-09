<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentoFormasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento_formas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('pagamento_id')->unsigned()->nullable();
            $table->foreign('pagamento_id')->references('id')->on('pagamentos')->onDelete('cascade');;

            $table->bigInteger('forma_id')->unsigned()->nullable();
            $table->foreign('forma_id')->references('id')->on('formas')->onDelete('cascade');;
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
        Schema::dropIfExists('pagamento_formas');
    }
}
