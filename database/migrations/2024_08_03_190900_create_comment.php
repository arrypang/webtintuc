<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comment', function (Blueprint $table) {
            $table->id('commentID');
            $table->text('content');
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('articleID');
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('articleID')->references('articleID')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
