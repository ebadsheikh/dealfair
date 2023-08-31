@extends('admin.layouts.master')

@section('title', 'Dealfair | Article Categories')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Article
                        Categories</h1>
                    {{ Breadcrumbs::render('adminArticleCategoryPage') }}
                </div>
                @can('Create Article Category')
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <a href="#" class="btn fw-bold btn-primary" data-bs-toggle="modal"
                            data-bs-target="#add-category">Add New Article Category</a>
                    </div>
                @endcan

                <div class="modal fade" tabindex="-1" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Add Article Category</h3>
                                <div class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span class="svg-icon svg-icon-1"></span>
                                </div>
                            </div>
                            <form action="{{ route('admin.article.category.store') }}" method="POST">
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
                                    <div class="row">
                                        <div class="fv-row mb-10">
                                            <label class="form-label required">Icon</label>
                                            <input name="icon" placeholder="fa fa-user"
                                                class="form-control form-control-lg" value="{{ old('icon') }}" />
                                            <small class="">Click <a href="https://fontawesome.com/icons"
                                                    target="_blank" class="text-primary">here</a> to find available icons
                                                using FontAwesome.</small>
                                            @error('icon')
                                                <div class="error text-danger">{{ $message }}
                                                </div>
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
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                                <thead>
                                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                                        <th class="text-center min-w-50px">#</th>
                                        <th class="text-center min-w-50px">Name</th>
                                        @canany(['Edit Article Category', 'Delete Article Category'])
                                            <th class="text-center min-w-100px">Action</th>
                                        @endcanany

                                    </tr>
                                </thead>

                                <tbody class="fw-semibold text-gray-600">
                                    @foreach ($articleCategories as $category)
                                        <tr class="text-center">
                                            <td class="text-dark">{{ $loop->iteration }}</td>
                                            <td class="text-dark">{{ $category->name }}</td>
                                            <td class="text-dark">
                                                <div class="">
                                                    @can('Edit Article Category')
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                            <a href="#" class="btn btn-icon btn-success btn-sm mr-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_{{ $category->id }}"><i
                                                                    class="bi bi-pencil fs-4"></i></a>
                                                        </span>
                                                    @endcan

                                                    @can('Delete Article Category')
                                                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <a class="btn btn-icon btn-danger btn-sm mr-2"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#delete{{ $category->id }}"><i
                                                                    class="bi bi-trash fs-4"></i></a>
                                                        </span>
                                                    @endcan

                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal fade" tabindex="-1" id="kt_modal_{{ $category->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title">Edit Article Category</h3>
                                                        <div class="btn btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span class="svg-icon svg-icon-1"></span>
                                                        </div>
                                                    </div>
                                                    <form
                                                        action="{{ route('admin.article.category.update', $category->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="fv-row mb-10">
                                                                    <label class="form-label required">Name</label>
                                                                    <input name="name" placeholder="Enter name here..."
                                                                        class="form-control form-control-lg"
                                                                        value="{{ old('name', $category->name) }}" />
                                                                    @error('name')
                                                                        <div class="error text-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="fv-row mb-10">
                                                                    <label class="form-label required">Icon</label>
                                                                    <input name="icon" placeholder="fa fa-user"
                                                                        class="form-control form-control-lg"
                                                                        value="{{ old('icon', $category->icon) }}" />
                                                                    <small class="">Click <a
                                                                            href="https://fontawesome.com/icons"
                                                                            target="_blank" class="text-primary">here</a>
                                                                        to find available icons using FontAwesome.</small>
                                                                    @error('icon')
                                                                        <div class="error text-danger">{{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" tabindex="-1" id="delete{{ $category->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header pb-0 border-0">
                                                        <div class="swal2-icon swal2-warning swal2-icon-show border-warning text-warning"
                                                            style="display: flex;">
                                                            <div class="swal2-icon-content" style="font-size: 70px">!
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body mx-auto">
                                                        <p>Are you sure you want to delete
                                                            <b>{{ $category->name ?? '' }}</b> ?</p>
                                                    </div>
                                                    <div class="modal-footer justify-content-center border-0 pt-0">
                                                        <a href="{{ route('admin.article.category.destroy', $category->id) }}"
                                                            type="button" class="btn btn-danger">Yes, Delete</a>
                                                        <button type="button" class="btn btn-active-light-primary"
                                                            data-bs-dismiss="modal">No,
                                                            Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')

    <script>
        $(document).ready(function() {
            $('#add-category').modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    </script>
    @if (count($errors) > 0)
        <script type="text/javascript">
            $(document).ready(function() {
                $('#add-category').modal('show');
            });
        </script>
    @endif

@endpush
