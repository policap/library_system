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
        Schema::create('visitors_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id');
            $table->unsignedBigInteger('book_id');
            $table->enum('action',['read','like','share','suggest','recommend']);
            $table->foreign('visitor_id')->references('id')->on('visitors');
            $table->foreign('book_id')->references('id')->on('books');
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
        Schema::dropIfExists('visitors_books');
    }
};
