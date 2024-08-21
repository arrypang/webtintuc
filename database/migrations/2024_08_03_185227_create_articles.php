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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('articleID');
            $table->string('title');
            $table->text('content');
            $table->string('slug');
            $table->string('image',500);
            $table->unsignedBigInteger('userID');
            $table->unsignedBigInteger('categoryID');
            $table->enum('status',['draft', 'pending_review', 'published', 'rejected'])->default('draft');
            $table->timestamps();


            $table->foreign('userID')->references('userID')->on('users');
            $table->foreign('categoryID')->references('categoryID')->on('categories');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
