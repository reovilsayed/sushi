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
        Schema::table('products', function (Blueprint $table) {
            $table->string('name_ae')->nullable();
            $table->text('composition_ae')->nullable();
            $table->string('allergenes_ae')->nullable();
            $table->text('text_ae')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name_ae', 'composition_ae', 'allergenes_ae', 'text_ae');
        });
    }
};
