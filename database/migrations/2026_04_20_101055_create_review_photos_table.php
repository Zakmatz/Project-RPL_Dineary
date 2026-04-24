<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('review_photos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('review_id')->constrained('reviews')->onDelete('cascade');
        $table->string('photo_path'); // path file foto di storage
        $table->timestamps();
    });
}
};
