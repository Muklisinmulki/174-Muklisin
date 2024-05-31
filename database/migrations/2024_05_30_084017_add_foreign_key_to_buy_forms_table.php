<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToBuyFormsTable extends Migration
{
    public function up()
    {
        Schema::table('buy_forms', function (Blueprint $table) {
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('buy_forms', function (Blueprint $table) {
            $table->dropForeign(['property_id']);
        });
    }
}

