<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Dalam migrasi atau definisi skema tabel 'users'
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
>>>>>>> ad09c1548b0f0f80fedec977885a536e811cfb98
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
<<<<<<< HEAD
            $table->string('phone_number')->nullable();
            $table->string('role')->nullable()->default('client'); // Kolom 'role' menjadi nullable dan memiliki nilai default
=======
>>>>>>> ad09c1548b0f0f80fedec977885a536e811cfb98
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
<<<<<<< HEAD
=======

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
>>>>>>> ad09c1548b0f0f80fedec977885a536e811cfb98
    }

    /**
     * Reverse the migrations.
<<<<<<< HEAD
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
=======
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
>>>>>>> ad09c1548b0f0f80fedec977885a536e811cfb98
