<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('menus', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cafe_id')->constrained('cafes')->onDelete('cascade');
        $table->string('name');
        $table->string('price')->nullable(); // contoh: "Rp 25.000"
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
};
