<div class="card card-flush">
    <div class="row p-5">
        <h1 class="d-flex text-dark fw-bold my-1 fs-3">Search In Communities</h1>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Search by zip code" wire:model="searchZip"
                name="searchZip" />
        </div>
        <div class="col-md-6">
            <select class="form-select" wire:model="searchType" name="searchType">
                <option>Select Type</option>
                <option value="recentJoins">Recent Joins</option>
                <option value="mostActive">Most Active</option>
            </select>
        </div>
    </div>

    <div class="card-body pt-0">
        @include('tables.community-table')
    </div>
</div>
