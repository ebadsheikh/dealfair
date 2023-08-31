<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('communities')) {
            Schema::create('communities', function (Blueprint $table) {
                $table->id();
                $table->string('name', 150);
                $table->string('slug', 200);
                $table->string('short_name', 100);
                $table->string('zip', 30)->unique();
                $table->string('state', 50);
                $table->string('state_code', 6);
                $table->string('city', 30);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
