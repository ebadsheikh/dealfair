<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\UserAddressTypesEnum;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('user_addresses')) {
            Schema::create('user_addresses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
                $table->text('full_name', 50)->nullable();
                $table->string('telephone', 25)->nullable();
                $table->text('address');
                $table->string('city', 50);
                $table->double('latitude', 11, 5);
                $table->double('longitude', 11, 5);
                $table->string('state', 50);
                $table->string('state_code', 50);
                $table->string('zip', 30);
                $table->string('address_type', 20)->default(UserAddressTypesEnum::PRIMARY->value);
                $table->foreignId('country_id')->constrained('countries')->cascadeOnUpdate()->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
