<?php

use App\Enums\KeywordStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('keywords')) {
            Schema::create('keywords', function (Blueprint $table) {
                $table->id();
                $table->string('keyword', 100)->unique();
                $table->foreignId('brand_id')->constrained('brands')->cascadeOnUpdate()->cascadeOnDelete();
                $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('weight')->nullable()->default(0);
                $table->string('length')->nullable()->default(0);
                $table->string('width')->nullable()->default(0);
                $table->string('height')->nullable()->default(0);
                $table->string('status')->default(KeywordStatusEnum::ACTIVE->value);
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keywords');
    }
};
