<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealEstatesTable extends Migration
{
    public function up()
    {
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('property_id');
            $table->decimal('uang_muka', 15, 2);
            $table->integer('loan_term');
            $table->decimal('harga', 15, 2);
            $table->string('asuransi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('real_estates');
    }
}

