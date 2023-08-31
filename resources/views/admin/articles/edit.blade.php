@extends('admin.layouts.master')

@section('title', 'Edit Article')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Article</h1>
                    {{ Breadcrumbs::render('adminEditArticlePage') }}
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('admin.article.index') }}" class="btn btn-sm fw-bold btn-primary"><i
                            class="bi bi-arrow-left"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <div class="card card-p-0 card-flush">
                        <div class="card-body">
                            <div class="card card-flush py-4">
                                <form class="row g-5 pt-5" method="POST" enctype="multipart/form-data"
                                    action="{{ Route('admin.article.update', $article->slug) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Title</label>
                                            <input type="text" name="title"
                                                class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Title"
                                                value="{{ old('title', $article->title) }}" />
                                            @error('title')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Category</label>
                                            <select name="category_id" aria-label="Select " data-control="select2"
                                                data-placeholder="Select a Category..."
                                                class="form-select form-select-lg fw-semibold">
                                                <option value="">Select category</option>
                                                @foreach ($articleCateogories as $articleCategory)
                                                    <option value="{{ $articleCategory->id }}"
                                                        {{ $articleCategory->id == $article->category_id ? 'selected' : '' }}>
                                                        {{ $articleCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Tags</label>
                                            <input id="kt_tagify_1" name="tags"
                                                class="form-control form-control-lg mb-3 mb-lg-0" placeholder="Tags"
                                                value="{{ old('tags', $article->tags) }}" data-maxTags="6" />
                                            @error('tags')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Description</label>
                                            <textarea name="description" id="kt_docs_ckeditor_classic">{!! $article->description !!}</textarea>
                                            @error('description')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-6">
                                            <label class="col-form-label required fw-semibold fs-6">Status</label>
                                            <select name="status" aria-label="Select " data-control="select2"
                                                data-placeholder="Select a Status..."
                                                class="form-select form-select-lg fw-semibold">
                                                <option value="publish"
                                                    {{ $article->status == \App\Enums\ArticleStatusEnum::PUBLISH->value ? 'selected' : '' }}>
                                                    {{ ucwords(\App\Enums\ArticleStatusEnum::PUBLISH->value) }}
                                                </option>
                                                <option value="{{ \App\Enums\ArticleStatusEnum::DRAFT->value }}"
                                                    {{ $article->status == \App\Enums\ArticleStatusEnum::DRAFT->value ? 'selected' : '' }}>
                                                    {{ ucwords(\App\Enums\ArticleStatusEnum::DRAFT->value) }}
                                                </option>
                                            </select>
                                            @error('status')
                                                <div class="error text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('admin.article.index') }}" id="kt_ecommerce_edit_order_cancel"
                                            class="btn btn-light me-5">Cancel</a>
                                        <button type="submit" id="kt_ecommerce_edit_order_submit" class="btn btn-primary">
                                            <span class="indicator-label">{{ __('Save') }}</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    <script>
        // The DOM elements you wish to replace with Tagify
        let tagsInput = document.querySelector('#kt_tagify_1');

        // Initialize Tagify components on the above input
        let tagify = new Tagify(tagsInput, {
            maxTags: 6
        });

        // Listen for the add event and check the number of tags
        tagify.on('add', () => {
            if (tagify.value.length > 6) {
                tagify.removeLastTag();
            }
        });
    </script>

@endpush
