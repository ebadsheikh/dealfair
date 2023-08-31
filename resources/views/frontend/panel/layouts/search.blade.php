<div class="card rounded-0 bgi-no-repeat bgi-position-x-end bgi-size-cover" style="background-color: #663259;background-size: auto 100%; background-image: url(assets/media/misc/taieri.svg)">
    <div class="card-body container-fluid pt-10 pb-8">
        <div class="d-flex align-items-center">
            <h1 class="fw-semibold me-3 text-white">Search Products</h1>
        </div>

        <div class="d-flex flex-column">
            <div class="d-lg-flex align-lg-items-center">
                <div class="rounded d-flex flex-column flex-lg-row align-items-lg-center bg-body p-5 w-xxl-850px h-lg-60px me-lg-10 my-5">
                    <div class="row flex-grow-1 mb-5 mb-lg-0">
                        <div class="col-lg-4 d-flex align-items-center mb-3 mb-lg-0">
                            <i class="ki-outline ki-magnifier fs-1 text-gray-400 me-1"></i>
                            <input type="text" class="form-control form-control-flush flex-grow-1" name="search" value="" placeholder="Your Search" />
                        </div>

                        <div class="col-lg-4 d-flex align-items-center mb-5 mb-lg-0">
                            <div class="bullet bg-secondary d-none d-lg-block h-30px w-2px me-5"></div>
                            <i class="ki-outline ki-element-11 fs-1 text-gray-400 me-1"></i>
                            <select class="form-select border-0 flex-grow-1" data-control="select2" data-placeholder="Category" data-hide-search="true">
                                <option value=""></option>
                                <option value="1" selected="selected">Category</option>
                                <option value="2">In Progress</option>
                                <option value="3">Done</option>
                            </select>
                        </div>

                        <div class="col-lg-4 d-flex align-items-center">
                            <div class="bullet bg-secondary d-none d-lg-block h-30px w-2px me-5"></div>
                            <i class="ki-outline ki-geolocation fs-1 text-gray-400 me-3"></i>
                            <a href="#" class="btn btn-color-muted px-0 text-start rounded-0 py-1" id="kt_modal_select_location_target" data-bs-toggle="modal" data-bs-target="#kt_modal_select_location">Location</a>
                        </div>
                    </div>

                    <div class="min-w-150px text-end">
                        <button type="submit" class="btn btn-dark" id="kt_advanced_search_button_1">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
