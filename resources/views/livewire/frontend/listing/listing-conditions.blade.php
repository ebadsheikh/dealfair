@php
    use App\Enums\ProductConditionsEnum;
@endphp
<div class="row mb-2">
    <div class="col-3">
        <div class="text-gray-600 fw-semibold fs-5">Product Condition:</div>
    </div>
    @if ($listing->product_condition == ProductConditionsEnum::NEW->value)
        <div class="col-9">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-30px me-3">
                    <span class="symbol-label bg-light-warning">
                        <i class="ki-duotone ki-crown fs-1x text-warning">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">New</span>
                </span>
            </span>
        </div>
    @elseif($listing->product_condition == ProductConditionsEnum::LIKE_NEW->value)
        <div class="col-8">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-30px me-3">
                    <span class="symbol-label bg-light-warning">
                        <i class="ki-duotone ki-shield fs-1x text-warning">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">Like New</span>
                </span>
            </span>
        </div>
    @elseif($listing->product_condition == ProductConditionsEnum::GOOD->value)
        <div class="col-8">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-30px me-3">
                    <span class="symbol-label bg-light-warning">
                        <i class="ki-duotone ki-grid-2 fs-1x text-warning">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">Good</span>
                </span>
            </span>
        </div>
    @elseif($listing->product_condition == ProductConditionsEnum::FAIR->value)
        <div class="col-8">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-30px me-3">
                    <span class="symbol-label bg-light-warning">
                        <i class="ki-duotone ki-kanban fs-1x text-warning">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">Fair</span>
                </span>
            </span>
        </div>
    @elseif($listing->product_condition == ProductConditionsEnum::POOR->value)
        <div class="col-8">
            <span class="d-flex align-items-center me-2">
                <span class="symbol symbol-30px me-3">
                    <span class="symbol-label bg-light-warning">
                        <i class="ki-duotone ki-element-2 fs-1x text-warning">
                            <i class="path1"></i>
                            <i class="path2"></i>
                        </i>
                    </span>
                </span>
                <span class="d-flex flex-column">
                    <span class="fw-bold fs-6">Poor</span>
                </span>
            </span>
        </div>
    @endif
</div>
