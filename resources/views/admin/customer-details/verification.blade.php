<div class="tab-pane fade show active" id="address" role="tabpanel">

    @if ($user->userProfile->hasMedia('verification_images'))
        <div class="d-flex">
            <div class="col-md-4">
                <div class="d-flex flex-column gap-5 gap-lg-10  mb-7 me-lg-10">
                    <div class="card card-flush ">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Verifications</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">

                            @foreach ($user->userProfile->getMedia('verification_images') as $key => $image)
                                <div>
                                    <label class="d-flex align-items-center form-label mb-5 required">
                                        {{ $key == 0 ? 'Verification ID' : 'Government ID' }}</label>
                                    <div class="d-flex  flex-stack mb-10 ">
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 justify-content-center me-2">
                                                <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                    data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-300px h-150px"
                                                        style="background-image: url({{ $image->getUrl() }})">
                                                    </div>

                                                    <a href="{{ Route('admin.customers.download.media', $image) }}"
                                                        class="btn btn-icon btn-circle btn-active-color-primary bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        aria-label="Change Government ID" data-kt-initialized="1">
                                                        <i class="bi bi-download fs-7"></i>
                                                    </a>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-center">
                                <a href="{{ Route('admin.customers.allow.verification', [$user->id, 1]) }}"
                                    class="btn btn-primary">Approve</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                    <form action="{{route('admin.user.verification.rejected',$user->id)}}" method="post">
                        @csrf
                        <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <div class="d-flex flex-column flex-wrap me-3">
                                    <h2 class="d-flex fs-3 flex-column justify-content-center my-0">Email Settings</h2>
                                    <span class="text-muted bold text-dark">This section will be used for rejecting
                                        verifications</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <div class="form-group row">
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <label class="col-lg-12 col-form-label required fw-bold fs-6">Subject</label>
                                    <input type="text" name="subject" class="form-control"
                                        placeholder="Enter Subject" value="{{ old('subject',$emailTemplate->subject) }}">
                                    @if ($errors->has('subject'))
                                        <div class="text-danger">{{ $errors->first('subject') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <label class="col-lg-12 col-form-label required fw-bold fs-6">Content</label>
                                    <textarea name="content" id="kt_docs_ckeditor_classic">{{ old('content',$emailTemplate->content) }}</textarea>
                                    @if ($errors->has('content'))
                                        <div class="text-danger">{{ $errors->first('content') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <label class="col-lg-12 col-form-label required fw-bold fs-6">Note</label>
                                    <textarea name="note" class="form-control">{{ old('note') }}</textarea>
                                    @if ($errors->has('note'))
                                        <div class="text-danger">{{ $errors->first('note') }}
                                        </div>
                                    @endif
                                </div>

                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>


                </div>
            </div>

        </div>
        <div class=" d-flex justify-content-end py-6 px-9">

            {{-- <div class="dropdown">
                <button
                    class="btn {{ $user->userProfile->is_verification_badge_allowed ? 'btn-primary' : 'btn-danger' }}  dropdown-toggle"
                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    {{ $user->userProfile->is_verification_badge_allowed ? 'Approved' : 'Rejected' }}
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item"
                        href="{{ Route('admin.customers.allow.verification', [$user->id, 1]) }}">Approved</a>
                    <a class="dropdown-item"
                        href="{{ Route('admin.customers.allow.verification', [$user->id, 0]) }}">Reject</a>
                </div>
            </div> --}}
        </div>
    @else
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Wrapper-->
                <div class="card-px text-center">
                    <!--begin::Title-->
                    <h2 class="fs-2x fw-bold mb-10">There are no verification added</h2>

                </div>
                <!--end::Wrapper-->
                <!--begin::Illustration-->
                <div class="text-center">
                    <img class="mw-100 mh-300px" alt=""
                        src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}" />
                </div>
                <!--end::Illustration-->
            </div>
            <!--end::Card body-->
        </div>
    @endif
</div>
@push('custom-scripts')
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#kt_docs_ckeditor_classic'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!-- scripts for dropdown button -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
@endpush
