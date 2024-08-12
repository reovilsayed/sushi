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
        Schema::table('restaurants', function (Blueprint $table) {
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('post_code');
            $table->string('zip_code');
            $table->string('number');
            $table->foreignId('zone_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('restaurants', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('post_code');
            $table->dropColumn('zip_code');
            $table->dropColumn('number');
            $table->dropColumn('zone_id');
        });
    }
};
