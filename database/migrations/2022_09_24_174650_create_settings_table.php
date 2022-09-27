<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('author',250);
            $table->string('keywords',250);
            $table->string('title',300);
            $table->longText('address');
            $table->longText('description');
            $table->string('email');
            $table->string('first_phone');
            $table->string('second_phone');
            $table->string('whatsApp');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('logo',200);
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
        Schema::dropIfExists('settings');
    }
}
