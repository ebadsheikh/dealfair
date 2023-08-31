@php
    use App\Helpers\GlobalHelper;
@endphp
<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="card card-p-0 card-flush">
                <div class="card-body">
                    <div class="card card-flush py-4">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="col-form-label required fw-semibold fs-6">Keyword</label>
                                <input type="text" name="keyword"
                                       class="form-control form-control-lg mb-3 mb-lg-0"
                                       placeholder="Enter keyword here..." wire:model="keyword"/>
                                @error ('keyword')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label required fw-semibold fs-6">Category</label>
                                <div wire:ignore>
                                    <select id="keywordCategory" class="form-select form-select-lg fw-semibold"
                                            data-control="select2" data-placeholder="Please select category">
                                        <option></option>
                                        @foreach ($categories as $category)
                                            <option
                                                value="{{ GlobalHelper::generateCategoryTree($category)['id'] }}">{{ GlobalHelper::generateCategoryTree($category)['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error ('category')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="col-form-label required fw-semibold fs-6">Brands</label>
                                <div wire:ignore>
                                    <select id="keywordBrand" class="form-select" name="brand_id" data-control="select2"
                                            data-placeholder="Please select brand">
                                        <option></option>
                                    </select>
                                </div>
                                @error ('brand')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label required">Tags</label>
                                <div wire:ignore>
                                    <input id="keywordTags" class="form-control"
                                           placeholder="Type tags here and separate with comma or press enter on each tag"/>
                                    <span class="fs-7 text-muted">You can add upto 10 tags. Minimum 5 characters & Maximum 15 characters for each tag allowed.</span>
                                </div>
                                @error ('keywordTags')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Weight</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter weight here..." wire:model="weight"/>
                                    <span class="input-group-text">LBS</span>
                                </div>
                                @error ('weight')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Length</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter length here..." wire:model="length"/>
                                    <span class="input-group-text">INCH</span>
                                </div>
                                @error ('length')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Width</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter width here..." wire:model="width"/>
                                    <span class="input-group-text">INCH</span>
                                </div>
                                @error ('width')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Height</label>
                                <div class="input-group">
                                    <input type="text" class="form-control"
                                           placeholder="Enter height here..." wire:model="height"/>
                                    <span class="input-group-text">INCH</span>
                                </div>
                                @error ('height')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 d-flex justify-content-end mt-6">
                                <a href="{{ route('admin.keywords.index') }}" class="btn btn-light me-5">Cancel</a>
                                <button wire:click="storeKeyword" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    <script>
        document.addEventListener("livewire:load", () => {

            keywordCategory();

            keywordBrand();

            keywordTags();

            Livewire.on('brandsUpdated', function (brandsData) {
                let keywordBrand = $('#keywordBrand');
                keywordBrand.empty();
                brandsData.forEach(brand => {
                    keywordBrand.append(`<option value="${brand.id}">${brand.name}</option>`);
                });
                keywordBrand.val('').trigger('change');
            });

        })

        function keywordCategory() {
            let keywordCategory = $('#keywordCategory');

            keywordCategory.select2();
            keywordCategory.on('change', function (e) {
                const data = keywordCategory.select2("val");
                @this.
                set('category', data);
            });
        }

        function keywordBrand() {
            let keywordBrand = $('#keywordBrand');

            keywordBrand.select2();
            keywordBrand.on('change', function (e) {
                const data = keywordBrand.select2("val");
                @this.
                set('brand', data);
            });
        }

        function keywordTags() {
            let keywordTags = document.querySelector("#keywordTags");

            let keywordTagify = new Tagify(keywordTags, {
                maxTags: 10,
                delimiters: ',',
                pattern: /^.{2,15}$/
            });

            keywordTagify.on('add', function (e) {
                // remove last added tag if the total length exceeds
                if (e.detail.data.value > 15)
                    keywordTagify.removeTag(e.detail.data.value); // removes the last added tag
            });

            keywordTagify.on('change', function (e) {
                const data = e.detail.value;
                @this.
                set('keywordTags', data);
            });
        }
    </script>
@endpush
