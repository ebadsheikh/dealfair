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
        Schema::create('reported_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reported_by')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('reported_to')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('reason_id')->constrained('reported_user_reasons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_users');
    }
};
