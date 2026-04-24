<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('review_logs', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('admin_id');
        $table->foreign('admin_id')->references('admin_id')->on('admins')->onDelete('cascade');
        $table->unsignedBigInteger('review_id')->nullable();
        $table->foreign('review_id')->references('id')->on('reviews')->onDelete('set null');
        $table->string('action'); // contoh: "deleted"
        $table->timestamps();
    });
    }

    public function down() {
        Schema::dropIfExists('review_logs');
    }
};
