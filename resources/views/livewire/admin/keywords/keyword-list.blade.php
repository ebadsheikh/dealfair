@php
    use App\Enums\KeywordStatusEnum;
    use App\Helpers\StatusCssClassHelper;
@endphp
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
    <div class="card card-p-0 card-flush">
        <div class="row mb-5">
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Keyword</label>
                <input wire:model="searchKeyword" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search by Keyword here..."/>
            </div>
            <div class="col-md-4">
                <label class="col-form-label required fw-semibold fs-6">Search By Category</label>
                <input wire:model="searchCategory" type="text" class="form-control form-control-lg mb-3 mb-lg-0"
                       placeholder="Search by category here..."/>
            </div>
            <div class="col-md-4">
                <label class="col-form-label fw-semibold fs-6">Search By Status</label>
                <select wire:model="searchStatus" id="searchStatus"
                        class="form-select form-select-lg fw-semibold">
                    <option value="">Show All</option>
                    @foreach(KeywordStatusEnum::toArray() as $keywordStatus)
                        <option value="{{$keywordStatus}}" {{$keywordStatus == $searchStatus ? 'selected' : ''}}>Show {{ucwords($keywordStatus->value )}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="card-body">
            @if ($keywords->count() > 0)
                <table class="table align-middle border rounded table-row-dashed fs-6 g-5">
                    <thead>
                    <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="text-center min-w-100px">Keyword</th>
                        <th class="text-center min-w-100px">Brand</th>
                        <th class="text-center min-w-100px">Category</th>
                        <th class="text-center min-w-100px">Tags</th>
                        <th class="text-center min-w-100px">Status</th>
                        <th class="text-center min-w-200px">Action</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($keywords as $key => $keyword)
                        <tr class="text-center">
                            <td class="text-dark">{{ $keyword->keyword }}</td>
                            <td class="text-dark">{{ $keyword->brand->name }}</td>
                            <td class="text-dark">{{ $keyword->category->name}}</td>
                            <td class="text-dark">
                                @foreach ($keyword->keywordTags as $keywordTag)
                                    <span class="badge badge-success">{{ $keywordTag->tag }}</span>
                                @endforeach
                            </td>
                            <td class="text-dark">
                                <span class="btn-group">
                                    <button type="button"
                                            class="btn btn-sm {{ StatusCssClassHelper::keywordStatusCssClass($keyword->status) }} dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ ucfirst($keyword->status) }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ route('admin.keywords.update.status', [$keyword->id, KeywordStatusEnum::ACTIVE->value]) }}">{{ ucfirst(KeywordStatusEnum::ACTIVE->value) }}</a>
                                        <a class="dropdown-item"
                                           href="{{ route('admin.keywords.update.status', [$keyword->id, KeywordStatusEnum::PENDING->value]) }}">{{ ucfirst(KeywordStatusEnum::PENDING->value) }}</a>
                                        <a class="dropdown-item"
                                           href="{{ route('admin.keywords.update.status', [$keyword->id, KeywordStatusEnum::DRAFT->value]) }}">{{ ucfirst(KeywordStatusEnum::DRAFT->value) }}</a>
                                    </div>
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.keywords.edit', $keyword->id) }}"
                                   data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Keyword"
                                   class="btn btn-icon btn-success btn-sm mr-2"><i
                                        class="bi bi-pencil fs-4"></i></a>

                                <span data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Keyword">
                                        <a class="btn btn-icon btn-danger btn-sm mr-2" data-bs-toggle="modal"
                                           data-bs-target="#delete{{ $keyword->id }}"><i
                                                class="bi bi-trash fs-4"></i></a>
                               </span>
                            </td>
                        </tr>

                        <div class="modal fade" tabindex="-1" id="delete{{ $keyword->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header pb-0 border-0">
                                        <div
                                            class="swal2-icon swal2-warning swal2-icon-show border-warning text-warning"
                                            style="display: flex;">
                                            <div class="swal2-icon-content" style="font-size: 70px">!</div>
                                        </div>
                                    </div>
                                    <div class="modal-body mx-auto">
                                        <p>Are you sure you want to delete category <b>{{ $keyword->keyword ?? '' }}</b> ?
                                        </p>
                                    </div>
                                    <div class="modal-footer justify-content-center border-0 pt-0">
                                        <a href="{{ route('admin.keywords.destroy', $keyword->id) }}"
                                           type="button" class="btn btn-danger">Yes, Delete</a>
                                        <button type="button" class="btn btn-active-light-primary"
                                                data-bs-dismiss="modal">No, Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center m-5">
                    <h4>No Data Found</h4>
                </div>
            @endif
        </div>
        <div class="card-footer m-4">
            <div class="d-flex justify-content-end">
                {{ $keywords->links() }}
            </div>
        </div>
    </div>
</div>
