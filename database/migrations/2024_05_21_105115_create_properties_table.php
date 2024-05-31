<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('alamat');
            $table->integer('luas');
            $table->integer('lebar');
            $table->integer('jumlah_lantai');
            $table->date('tanggal_jual');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longtitude', 10, 7);
            $table->decimal('harga', 15, 2);
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
        Schema::dropIfExists('properties');
    }
}
