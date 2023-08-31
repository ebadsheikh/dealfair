@extends('frontend.user-panel.layouts.master')
@section('title', 'Dealfair | Support Ticket')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Support Ticket
                    </h1>
                    {{--            {{ Breadcrumbs::render('frontendAddTicketPage') }}--}}
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('ticket.index') }}" class="btn btn-sm fw-bold btn-primary"><i class="bi bi-arrow-left"></i>Go Back</a>
                </div>

            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush py-5 px-5">
                    <form class="row g-5 pt-5" method="POST"
                          enctype="multipart/form-data"
                          action="{{ route('ticket.store') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-6">
                                <!--begin::Label-->
                                <label
                                    class="col-form-label required fw-semibold fs-6">Subject</label>
                                <!--end::Label-->
                                <input type="text" name="subject"
                                       class="form-control form-control-lg mb-3 mb-lg-0"
                                       placeholder="Subject"
                                       value="{{ old('subject') }}"/>
                                @error('subject')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-6">
                                <!--begin::Label-->
                                <label
                                    class="col-form-label required fw-semibold fs-6">Category</label>
                                <!--end::Label-->
                                <select name="ticket_category_id" aria-label="Select "
                                        data-control="select2"
                                        data-placeholder="Select a Category..."
                                        class="form-select form-select-lg fw-semibold">
                                    <option value=""></option>
                                    @foreach ($ticketCategories as $ticketCategory)
                                        <option
                                            value="{{ $ticketCategory->id }}">{{ $ticketCategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ticket_category_id')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-6">
                                <!--begin::Label-->
                                <label
                                    class="col-form-label required fw-semibold fs-6">Description</label>
                                <!--end::Label-->
                                <textarea name="description"
                                          id="kt_docs_ckeditor_classic">{{ old('description') }}</textarea>
                                @error('description')
                                <div class="error text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-end px-8">
                            <!--begin::Button-->
                            <a href="{{ route('ticket.index')  }}" class="btn btn-light me-5">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    <script>
        ClassicEditor.create(document.querySelector('#kt_docs_ckeditor_classic'), {
            ckfinder: {
                uploadUrl: "{{ route('admin.article.uploadfile', ['_token' => csrf_token()]) }}",

            }
        })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
