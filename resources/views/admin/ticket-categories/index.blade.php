@extends('admin.layouts.master')

@section('title', 'Dealfair | Ticket Categories')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Ticket
                        Categories</h1>
                    {{ Breadcrumbs::render('adminTicketCategoriesPage') }}
                </div>
                @can('Create Ticket Category')
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="#" class="btn fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#add-ticket-category">Add New Tick Category</a>
                </div>
                @endcan

                <div class="modal fade" tabindex="-1" id="add-ticket-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Ticket Category</h3>
                                <!--begin::Close-->
                                <div class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span class="svg-icon svg-icon-1"></span>
                                </div>
                                <!--end::Close-->

                            </div>
                            <form action="{{ route('admin.ticket.category.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Name</label>
                                            <input name="name" placeholder="Enter name here..."
                                                class="form-control form-control-lg" value="{{ old('name') }}" />
                                            @error('name')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @livewire('admin.ticket-category.ticket-category-list')
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#add-ticket-category').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    </script>
    @if ($errors->has('name'))
        <script type="text/javascript">
            $(document).ready(function() {
                $('#add-ticket-category').modal('show');
            });
        </script>
    @endif
@endpush
