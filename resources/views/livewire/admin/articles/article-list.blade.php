@php
    use App\Enums\ArticleStatusEnum;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Title</label>
                <input wire:model="searchName" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                    placeholder="Search by title here..." />
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Article Category</label>
                <select wire:model="searchArticleCategory" id="searchArticleCategory"
                    class="form-select form-select-lg fw-semibold">
                    <option value="">All Article Categories</option>
                    @foreach ($articleCategories as $articleCategory)
                        <option value="{{ $articleCategory->id }}">{{ $articleCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus" class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach (ArticleStatusEnum::toArray() as $articleStatus)
                        <option value="{{ $articleStatus }}" {{ $articleStatus == $searchStatus ? 'selected' : '' }}>
                            Show {{ ucwords($articleStatus->value) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_example">
                <thead>
                    <tr class="text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="min-w-50px">Title</th>
                        <th class="min-w-50px">Category</th>
                        <th class="min-w-50px">Status</th>
                        @canany(['View Article Detail', 'Edit Article', 'Delete Article'])
                            <th class="min-w-100px">Action</th>
                        @endcanany

                    </tr>
                </thead>

                <tbody class="fw-semibold text-gray-600">
                    @foreach ($articles as $article)
                        <tr class="">
                            <td class="text-dark">{{ $article->title }}</td>
                            <td class="text-dark">{{ $article->articleCategory->name }}</td>
                            <td class="text-dark">
                                <span class="btn-group">
                                    @can('Update Article Status')
                                        <button type="button"
                                            class="btn btn-sm {{ $article->status == 'publish' ? 'btn-primary' : 'btn-danger' }} dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ ucfirst($article->status) }}
                                        </button>
                                    @else
                                        <button type="button"
                                            class="btn btn-sm {{ $article->status == 'publish' ? 'btn-primary' : 'btn-danger' }} dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" disabled>
                                            {{ ucfirst($article->status) }}
                                        </button>
                                    @endcan

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.article.status', [$article->slug, \App\Enums\ArticleStatusEnum::PUBLISH->value]) }}">{{ ucfirst(\App\Enums\ArticleStatusEnum::PUBLISH->value) }}</a>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.article.status', [$article->slug, \App\Enums\ArticleStatusEnum::DRAFT->value]) }}">{{ ucfirst(\App\Enums\ArticleStatusEnum::DRAFT->value) }}</a>
                                    </div>
                                </span>
                            </td>
                            <td class="text-dark">
                                @can('View Article Detail')
                                    <a type="button" href="{{ route('support.singlefaqs', $article->slug) }}"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="View Article"
                                        class="btn btn-icon btn-primary btn-sm mr-2"><i class="bi bi-eye fs-4"></i></a>
                                @endcan
                                @can('Edit Article')
                                    <a href="{{ route('admin.article.edit', $article->slug) }}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit Article"
                                        class="btn btn-icon btn-success btn-sm mr-2"><i class="bi bi-pencil fs-4"></i></a>
                                @endcan

                                @can('Delete Article')
                                    <a href="#" class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Article"
                                        data-bs-target="#delete{{ $article->slug }}"><i class="bi bi-trash fs-4"></i></a>
                                @endcan
                            </td>
                        </tr>
                        <div class="modal fade" tabindex="-1" id="delete{{ $article->slug }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3>Delete</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete ?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Close</button>
                                        <a href="{{ Route('admin.article.destroy', $article->slug) }}" type="button"
                                            class="btn btn-danger">Ok</a>
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
