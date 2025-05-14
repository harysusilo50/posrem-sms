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
            $table->double('tinggi_badan');
            $table->double('berat_badan');
            $table->string('tekanan_darah');
            $table->double('lingkar_lengan');
            $table->double('lingkar_perut');
            $table->string('pengecekan_anemia');
            $table->date('tgl_pemeriksaan');
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
