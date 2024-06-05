<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('follow')) {
            Schema::create('follow', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->foreignId('user_id')->constrained();
                $table->bigInteger('followeduser');
                $table->foreign('followeduser')->references('id')->on('users');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follow');
    }
};
