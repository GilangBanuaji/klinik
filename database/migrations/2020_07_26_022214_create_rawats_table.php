<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pasien_id')->unsigned();
            $table->string('tekanan_darah', 10)->nullable();
            $table->string('respirasi_rate', 15)->nullable();
            $table->string('tinggi_badan', 10)->nullable();
            $table->string('nadi', 10)->nullable();
            $table->string('suhu', 10)->nullable();
            $table->string('berat_badan', 10)->nullable();
            $table->string('status', 5)->nullable()->default('0');
            $table->string('sub_and_obj', 255)->nullable();
            $table->string('diagnosa', 255)->nullable();
            $table->string('terapi', 255)->nullable();
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
        Schema::dropIfExists('rawats');
    }
}
