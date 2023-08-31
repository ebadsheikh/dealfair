<?php

use App\Enums\UserStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasTable('user_profiles')) {
            Schema::create('user_profiles', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->unique()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('username', 20)->unique();
                $table->date('date_of_birth');
                $table->string('telephone', 25)->unique();
                $table->unsignedTinyInteger('onboarding_step')->default(1);
                $table->boolean('show_name')->default(false);
                $table->string('status', 30)->default(UserStatusEnum::ACTIVE->value);
                $table->boolean('is_verification_badge_allowed')->default(false);
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
