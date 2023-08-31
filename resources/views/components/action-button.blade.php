@props(['editUrl', 'deleteUrl', 'id', 'name'])
@if ($editUrl)
    <a href="{{ $editUrl }}" class="btn btn-icon btn-success btn-sm mr-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil fs-4"></i></a>
@endif
@if (isset($deleteUrl) && $deleteUrl != '#')
    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
    <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $id }}"><i
            class="bi bi-trash fs-4"></i></a>
    </span>
    <div class="modal fade" tabindex="-1" id="kt_modal_{{ $id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <div class="swal2-icon swal2-warning swal2-icon-show border-warning text-warning"
                        style="display: flex;">
                        <div class="swal2-icon-content" style="font-size: 70px">!</div>
                    </div>
                </div>
                <div class="modal-body mx-auto">
                    <p>Are you sure you want to delete <b>{{ $name ?? '' }}</b> ?</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0">
                    <a href="{{ $deleteUrl }}" type="button" class="btn btn-danger">Yes, Delete</a>
                    <button type="button" class="btn btn-active-light-primary" data-bs-dismiss="modal">No,
                        Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endif
