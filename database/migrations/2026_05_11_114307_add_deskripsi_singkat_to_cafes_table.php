<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up(): void
{
    Schema::table('cafes', function (Blueprint $table) {
        $table->string('deskripsi_singkat')->nullable()->after('description');
    });
}

public function down(): void
{
    Schema::table('cafes', function (Blueprint $table) {
        $table->dropColumn('deskripsi_singkat');
    });
}
};
