<div class="mb-10 mb-lg-20" id="home">
    <div class="bg-light">
        <div class="container ">
            <div class="row align-items-center h-lg-350px">
                <div class="col-md-6">
                        <h1 class="lh-base fw-bolder fs-2x fs-lg-3x text-black mb-5 mb-lg-10">Hi, How Can We Help You?</h1>
                        <div class="position-relative">
                            <div class="input-group mb-2">
                                <input id="searchTitle" type="text" wire:model="searchTitle" placeholder="Ask us a question.." class="form-control form-control-lg p-5"  wire:keyup="searchTitle" name="searchTitle" autocomplete="off"/>
                                <span class="input-group-text btn btn-primary p-5" wire:click="searchAll" id="basic-addon2"><i class="fas fa-search"></i></span>
                            </div>
                            @if (!empty($titleSearchResult) && $showTitleSuggestion)
                                <div class="w-100 shadow rounded-3 bg-white position-absolute z-index-3" style="top: 5rem;">
                                    <h6 class="text-black-50 py-6 text-center m-0">Top Article Results</h6>
                                    @foreach ($titleSearchResult as $record)
                                        <div>
                                            <div class="search-separator"></div>
                                            <div class="px-3 py-5">
                                                <h5 class="text-black fw-bold m-0" wire:click.prevent="searchArticle('{{ $record->title }}')">{{ $record->title }}</h5>
                                                <ol class="breadcrumb breadcrumb-line text-muted fs-6qx fw-semibold mt-1">
                                                    <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">Dealfair Support</a></li>
                                                    <li class="breadcrumb-item pe-3"><a href="#" class="pe-3">{{ $record->articleCategory->name }}</a></li>
                                                    <li class="breadcrumb-item px-3 text-primary">{{ $record->title  }}</li>
                                                </ol>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="flex-equal d-flex justify-content-center align-items-end ms-5">
                        <!--begin::Illustration-->
                        <img src="{{ asset('assets/media/support-banner.png') }}" alt=""
                            class="mw-100 mh-125px mh-lg-275px mb-lg-n12" />
                        <!--end::Illustration-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Landing hero-->
    <!--end::Wrapper-->
</div>
<!--begin::Row-->
<div class="container">
    <div class="row g-10 mb-8 mb-xl-12">
        @foreach ($articleCategegories as $articleCategegorie)
            <!--begin::Col-->
            <div class="col-md-4 px-8">
                <div class="d-flex align-items-baseline">
                    <div><i class="{{ $articleCategegorie->icon }}" style="color: #5d6eb3; font-size: 20px;"></i></div>
                    <div class="ms-3">
                        <a class="text-black fw-bolder article-title fs-2" href="{{route('support.buyerfaqs',$articleCategegorie->slug)}}">{{ $articleCategegorie->name }}</a>
                    </div>
                </div>
                <hr class="mx-2" >
                <div class="px-0">
                    <div class="d-flex flex-column my-7" style="row-gap: 23px;">
                        @foreach ($articleCategegorie->articles as $article)
                            <div class="d-flex align-items-center justify-content-between gap-5 ">
                                <a href="{{ Route('support.singlefaqs', $article->slug) }}"
                                   class="text-gray-700 fw-bold article-title">{{ $article->title }}
                                </a>
                                <div class="chevron-icon">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--end::Col-->
        @endforeach

    </div>
</div>
