@php
    use App\Enums\ProductListingTypesEnum;
    use App\Helpers\GlobalHelper;
@endphp
<div class="mt-2">
    @if ($listing->listing_type == ProductListingTypesEnum::SELL->value)
        @if ($listing->discounted_price > 0)
            <div class="fw-bold df-sp-price">
                {{GlobalHelper::formatPrice(($listing->price - $listing->discounted_price))}}
            </div>
            <div class="d-flex align-items-center gap-2">
                <div class="fw-semibold text-decoration-line-through df-discounted-price">
                    {{GlobalHelper::formatPrice($listing->price)}}
                </div>
                <small class="text-black">
                    ({{ round(($listing->discounted_price / $listing->price) * 100) }} % off)
                </small>
            </div>
        @else
            <div class="fw-bold df-sp-price">
                {{GlobalHelper::formatPrice($listing->price)}}
            </div>
        @endif
    @elseif($listing->listing_type == ProductListingTypesEnum::BOTH->value)
        <div class="fw-bold df-sp-price">
            {{GlobalHelper::formatPrice($listing->price)}}
        </div>
    @endif
</div>
