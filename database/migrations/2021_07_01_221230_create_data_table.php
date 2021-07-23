<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names');
            $table->string('gender');
            $table->string('dob');
            $table->string('email')->unique();
            $table->string('nationality');
            $table->string('phone_number')->unique();
            $table->string('state_of_origin');
            $table->string('lga');
            $table->string('clan');
            $table->string('family_name');
            $table->integer('nin')->unique();
            $table->string('passport_path');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('data');
    }
}
