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
        Schema::table('users', function (Blueprint $table) {
            $table->string('blood_type')->nullable();
            $table->string('zodiac_sign')->nullable();
            $table->string('favorite_animal')->nullable();
            $table->string('secret_wish')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn(['blood_type', 'zodiac_sign', 'favorite_animal', 'secret_wish']);
        // });
    }
};
