<?php

use App\Enums\RequestFromTypesEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listing_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('listing_id')->constrained('listings')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('ip', 50);
            $table->string('request_from')->default(RequestFromTypesEnum::WEBSITE->value);
            $table->string('browser', 100)->nullable();
            $table->string('browser_version', 20)->nullable();
            $table->string('platform', 20)->nullable();
            $table->string('device_type', 20)->nullable();
            $table->boolean('is_robot')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listing_views');
    }
};
