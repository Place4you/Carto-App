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
        if (!Schema::hasTable('posts')) {
                Schema::create('posts', function (Blueprint $table) {
                    $table->id();
                    $table->timestamps();
                    $table->string('title');
                    $table->longText('body');
                    $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('posts');
        
    }
};
