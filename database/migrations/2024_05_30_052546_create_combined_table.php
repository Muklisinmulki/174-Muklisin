<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinedTable extends Migration
{
    public function up()
    {
        Schema::create('combined_table', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('property_id');
            $table->string('alamat');
            $table->integer('luas');
            $table->integer('lebar');
            $table->integer('jumlah_lantai');
            $table->date('tanggal_jual');
            $table->decimal('latitude', 10, 7);
            $table->decimal('longitude', 10, 7);
            $table->decimal('harga', 15, 2);
            $table->decimal('uang_muka', 15, 2);
            $table->integer('loan_term');
            $table->string('asuransi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('combined_table');
    }
}

