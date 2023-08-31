<div class="card card-flush py-5 ">
    <h1 class="text-dark fw-bold mb-6 fs-3 px-5">Search In Listing</h1>
    <div class="d-flex flex-column flex-md-row gap-3 px-5">
        <div class="col-md-6">
            <input class="form-control" placeholder="Pick date & time" id="kt_datepicker_7" />
        </div>
        <div class="col-md-6">
            <select class="form-select">
                <option>Select Type</option>
                <option value="1">Recent</option>
                <option value="2">Action</option>
                <option value="3">Sell</option>
                <option value="3">Both</option>
                <option value="3">Active</option>
            </select>
        </div>
    </div>

    <div class="card-body pt-5">
        <div class="table-responsive">
            @include('tables.product-table')
        </div>
    </div>
</div>


