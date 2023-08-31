<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\CategoryStatusEnum;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('slug', 100)->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->string('image_url', 255)->nullable();
            $table->string('status')->default(CategoryStatusEnum::ACTIVE->value);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
