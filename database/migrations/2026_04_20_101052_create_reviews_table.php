<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up() {
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        $table->foreignId('cafe_id')->constrained('cafes')->onDelete('cascade');
        $table->tinyInteger('rating'); // nilai 1 sampai 5
        $table->text('comment');
        $table->timestamps();

        // 1 user hanya bisa review 1 kali per cafe
        $table->unique(['user_id', 'cafe_id']);
    });
}
};
