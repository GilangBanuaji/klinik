<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm')->nullable();
            $table->string('fullname')->nullable();
            $table->string('jenis_kel')->nullable();
            $table->string('no_bpjs', 50)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('riwayat_alergi_obat', 255)->nullable();
            $table->string('ttl', 150)->nullable();
            $table->string('pekerjaan', 25)->nullable();
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
        Schema::dropIfExists('pasiens');
    }
}
