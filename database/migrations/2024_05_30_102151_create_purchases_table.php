<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('property_id');
            $table->double('latitude');
            $table->double('longtitude');
            $table->integer('uang_muka');
            $table->integer('loan_term');
            $table->integer('harga');
            $table->string('asuransi');
            $table->timestamps();

            // Add foreign key constraints if needed
            // $table->foreign('id_user')->references('id')->on('users');
            // $table->foreign('property_id')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
