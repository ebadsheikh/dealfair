<div>
    <div class="mb-10" id="home">
        <div class="bgi-no-repeat bgi-size-cover bgi-position-x-center landing-dark-bg">
            <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header"
                 data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        @include('frontend.layouts.top-nav-logo')
                        {{-- @include('frontend.layouts.top-nav-search') --}}
                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                                 data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                                 data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                                 data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                                 data-kt-swapper-mode="prepend"
                                 data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                <div
                                    class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                                    id="kt_landing_menu">
                                    <div class="menu-item">
                                        @if (!GlobalHelper::getUser())
                                            <a href="{{ route('auth.signin') }}"
                                               class="menu-link nav-link active py-3 px-4 px-xxl-6"
                                               style="color: #bdbdbd;" data-kt-scroll-toggle="true"
                                               data-kt-drawer-dismiss="true">Sign
                                                In</a>
                                        @else
                                            @if (GlobalHelper::getUser()->hasRole(\App\Enums\RolesEnum::CUSTOMER->value))
                                                @include('frontend.layouts.user-menu')
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-10">
        <div class="row">
            <div class="col-md-8">
                <div>
                    <div class="bg-secondary rounded px-5 py-2">
                        <ol class="breadcrumb breadcrumb-line text-muted fs-6qx fw-bold mt-1">
                            <li class="breadcrumb-item pe-3"><a href="{{route('support')}}" class="pe-3">Dealfair Support</a></li>
                            <li class="breadcrumb-item pe-3"><a href="{{route('support.buyerfaqs',$article->articleCategory->slug )}}" class="pe-3">{{$article->articleCategory->name}}</a></li>
                            <li class="breadcrumb-item px-3 text-muted">{{$article->title}}</li>
                        </ol>
                    </div>
                    <h1 class="mt-6 mb-2 fw-bolder text-capitalize" style="font-size:2.5rem;">{{ $article->title }}?</h1>
                    <div class="gap-1 d-flex align-items-center">
                        <small class="fw-semibold">Updated</small>
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dot" viewBox="0 0 16 16">
                                <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                            </svg>
                        </span>
                        <small class="fw-semibold">{{ $article->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                <div>
                    <div class="article-image">
                        <P class="text-dark fw-normal fs-5 mt-9 mb-4">{!! $article->description !!}</P>
                    </div>
                    <div class="h-100 d-flex flex-column pe-lg-6 mb-lg-0 mb-7">
                        <div class="separator my-10"></div>
                        <div class="mx-auto mb-10">
                            <div id="section1" class="fw-semibold fs-5 text-gray-600 text-dark my-4">Was this
                                article helpful?
                            </div>
                            <div class="d-flex justify-content-between gap-3">
                                <button wire:click="incrementHelpfulCount" class="btn {{ ($isLike && $isLoggedIn) ? 'btn-primary' : 'btn-secondary' }}"><i class="fa fa-thumbs-up"></i> Yes</button>
                                <button wire:click="incrementNotHelpfulCount"  class="btn {{ (!$isLike && $isLoggedIn) ? 'btn-danger' : 'btn-secondary' }}"><i class="fa fa-thumbs-down"></i>No</button>
                            </div>
                            <div class="text-gray-600 text-dark my-3">{{ $helpfulCount }} out of
                                {{ $helpfulCount + $notHelpfulCount }} found this helpful
                            </div>
                        </div>
                        <div class="card card-custom shadow-lg card-flush">
                            <div class="card-body m-auto d-grid justify-content-center">
                                <h1 class="text-dark">Still no luck? We can help!</h1>
                                <div class="text-gray-600 text-dark mx-auto my-3">{{ $helpfulCount }} out of
                                    {{ $helpfulCount + $notHelpfulCount }} found this helpful
                                </div>
                                <a href="{{ route('ticket.create') }}" class="btn btn-primary" target="_blank">Submit a request</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ps-lg-6">
                    <div class="position-relative">
                        <div class="input-group mb-8">
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
                                            <h5 class="text-black fw-bold m-0 cursor-pointer" wire:click.prevent="searchArticle('{{ $record->title }}')">{{ $record->title }}</h5>
                                            <ol class="breadcrumb breadcrumb-line text-muted fs-6qx fw-semibold mt-1">
                                                <li class="breadcrumb-item pe-3"><a href="{{ route('support') }}" class="pe-3">Dealfair Support</a></li>
                                                <li class="breadcrumb-item pe-3"><a href="{{route('support.buyerfaqs',$record->articleCategory->slug )}}" class="pe-3">{{ $record->articleCategory->name }}</a></li>
                                                <li class="breadcrumb-item px-3 text-primary">{{ $record->title  }}</li>
                                            </ol>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="mb-6">
                        <h1 class="mt-3 mb-7 fs-2 text-dark fw-bolder text-dark lh-base">Articles in this
                            section</h1>
                        <div class="d-flex flex-column my-7" style="row-gap: 20px;">
                            @foreach ($articleCategories->articles as $item)
                                <div class="d-flex align-items-center justify-content-between gap-5 ">
                                    <a href="{{ route('support.singlefaqs', $item->slug) }}"
                                       class="text-gray-700 fw-bold article-title">{{ $item->title }}?
                                    </a>
                                    <div class="chevron-icon">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
