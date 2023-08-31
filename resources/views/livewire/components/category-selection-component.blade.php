<div>
    <label class="col-form-label required fw-semibold fs-6">Category</label>
    <input name="category_id" type="text" class="form-control fw-semibold" placeholder="Please select category"
    readonly/>
    @error ('category_id')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
