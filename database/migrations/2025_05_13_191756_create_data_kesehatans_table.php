<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataKesehatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_kesehatans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('kader_id');
            $table->float('tinggi_badan');
            $table->float('berat_badan');
            $table->float('tekanan_darah');
            $table->float('lingkar_lengan');
            $table->float('lingkar_perut');
            $table->float('pengecekan_anemia');
            $table->timestamps();
        });
        // $table->foreignId('user_id')->constrained()->onDelete('cascade');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_kesehatans');
    }
}
