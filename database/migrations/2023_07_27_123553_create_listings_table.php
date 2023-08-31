<?php

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('ul_id', 20);//unique listing id
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('store_id')->nullable()->constrained('stores')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('title', 100)->index();
            $table->string('slug', 110)->unique();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('product_condition', 20)->index();
            $table->string('listing_type', 20)->nullable()->index();
            $table->string('brand', 30)->nullable()->index();
            $table->unsignedBigInteger('starting_bid')->default(0);
            $table->dateTime('auction_end')->nullable();
            $table->unsignedSmallInteger('selling_fees')->default(0);
            $table->unsignedSmallInteger('payment_charges_fixed')->default(0);
            $table->unsignedSmallInteger('payment_charges_percentage')->default(0);
            $table->unsignedBigInteger('price')->default(0);
            $table->unsignedBigInteger('discounted_price')->default(0);
            $table->longText('description');
            $table->unsignedInteger('quantity')->default(1);
            $table->string('shipping_cost_payer', 20)->nullable();
            $table->unsignedTinyInteger('visible_range')->default(0);
            $table->double('pickup_latitude', 11, 5)->default(0);
            $table->double('pickup_longitude', 11, 5)->default(0);
            $table->text('pickup_address')->nullable();
            $table->string('pickup_city', 50)->nullable();
            $table->string('pickup_state', 50)->nullable();
            $table->string('pickup_zip', 30)->nullable();
            $table->string('pickup_country', 20)->nullable();
            $table->string('status', 50)->default(ProductStatusEnum::DRAFT->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
