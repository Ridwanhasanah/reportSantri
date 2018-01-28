<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmaliyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amaliyahs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            // Ibadah Wajib 
            $table->tinyInteger('subuh_jmh')->nullable();
            $table->tinyInteger('dzuhur_jmh')->nullable();
            $table->tinyInteger('ashar_jmh')->nullable();
            $table->tinyInteger('maghrib_jmh')->nullable();
            $table->tinyInteger('isya_jmh')->nullable();
            $table->tinyInteger('tilawah_alquran')->nullable();
            //Ibadah Sunnah
            $table->tinyInteger('tahajud')->nullable();
            $table->tinyInteger('witir')->nullable();
            $table->tinyInteger('qobliyah_subuh')->nullable();
            $table->tinyInteger('hafalan')->nullable();
            $table->tinyInteger('dhuha')->nullable();
            $table->tinyInteger('qobliyah_dzuhur')->nullable();
            $table->tinyInteger('badiyah_dzuhur')->nullable();
            $table->tinyInteger('badiyah_maghrib')->nullable();
            $table->tinyInteger('badiyah_isya')->nullable();
            $table->tinyInteger('puasa')->nullable();
            $table->tinyInteger('doa_ortu')->nullable();
            $table->tinyInteger('doa_donatur')->nullable();
            $table->tinyInteger('infaq')->nullable();
            $table->tinyInteger('dzikir_pagi')->nullable();
            $table->tinyInteger('dzikir_petang')->nullable();
            $table->tinyInteger('alkahfi')->nullable();
            $table->date('date')->nullable();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amaliyahs');
    }
}
