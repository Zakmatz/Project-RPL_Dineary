<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
    Schema::create('cafes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('address');
        $table->text('description')->nullable();
        $table->string('phone')->nullable();
        $table->string('open_hours')->nullable();
        $table->string('price_range')->nullable();
        $table->string('photo')->nullable();
        $table->timestamps();
    });
}
};
