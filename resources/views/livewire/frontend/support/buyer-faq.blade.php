<div class="mb-5" id="home">
    <div class="landing-header landing-dark-bg" data-kt-sticky="true" data-kt-sticky-name="landing-header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}" style="animation-duration: 0.3s; top: 0;">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between">
                @include('frontend.layouts.top-nav-logo')
                <div class="d-lg-block" id="kt_header_nav_wrapper">
                    <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                        data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                        data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true"
                        data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                        <!--begin::Menu-->
                        <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold"
                            id="kt_landing_menu">
                            <div class="menu-item">
                                @if (!GlobalHelper::getUser())
                                    <a href="{{ route('auth.signin') }}"
                                        class="menu-link nav-link active py-3 px-4 px-xxl-6" style="color: #bdbdbd;"
                                        data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Sign
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
    <div class="bg-light">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center mx-auto h-lg-150px">
                <div class="col-md-7">
                    <div class="position-relative">
                        <div class="input-group mb-2">
                            <input id="searchTitle" type="text" wire:model="searchTitle"
                                   placeholder="Ask us a question.." class="form-control form-control-lg p-5"
                                   wire:keyup="searchTitle" name="searchTitle" autocomplete="off"/>
                            <span class="input-group-text btn btn-primary p-5" wire:click="searchAll"
                                  id="basic-addon2"><i class="fas fa-search"></i></span>
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
                                                <li class="breadcrumb-item pe-3"><a href="{{route('support')}}" class="pe-3">Dealfair Support</a></li>
                                                <li class="breadcrumb-item pe-3"><a href="{{route('support.buyerfaqs',$record->articleCategory->slug )}}" class="pe-3">{{ $record->articleCategory->name }}</a></li>
                                                <li class="breadcrumb-item px-3 text-primary">{{ $record->title }}</li>
                                            </ol>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row ">
        <div class="col-md-2 bg-white">
            <div class="pt-4 rounded-3 shadow-sm bg-white">
                <h5 class="mb-3 px-4">Article Categories</h5>
                <div class="d-flex flex-column my-7" style="row-gap: 14px;">
                    @foreach($articleCategoryName as $name)
                        <div class="d-flex align-items-center justify-content-between gap-5 px-4">
                            <a href="{{ route('support.buyerfaqs', $name->slug) }}" class="text-gray-700 fw-bold fs-6 article-title">{{ $name->name }}
                            </a>
                            <div class="chevron-icon">
                                <i class="fas fa-chevron-right"></i>
                            </div>
                        </div>
                        <div class="search-separator"></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="p-4 rounded-3 shadow-sm bg-white">
                <h3>{{ count($articles) }} Results For "{{ $articleCategory->name }}"</h3>
                @foreach ($articles as $article)
                <div class="mt-7">
                    <div class="d-flex justify-content-between">
                        <ol class="breadcrumb breadcrumb-line text-muted fs-6qx fw-semibold mt-1">
                            <li class="breadcrumb-item pe-3"><a href="{{route('support')}}" class="pe-3 text-muted">Dealfair Support</a></li>
                            <li class="breadcrumb-item pe-3"><a href="{{route('support.buyerfaqs', $articleCategory->slug)}}" class="pe-3 text-muted">{{ $articleCategory->name }}</a></li>
                            <li class="breadcrumb-item px-3 text-muted">{{ $article->title }}</li>
                        </ol>
                        <small>{{ $article->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="d-flex align-items-baseline justify-content-between mt-2">
                        <a href="{{ route('support.singlefaqs', $article->slug) }}">
                            <h4 class="text-primary fw-bold">{{ $article->title }}</h4>
                        </a>
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
                                <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                            </svg>
                            <small class="ms-1">{{ $article->likeCount  }}</small>
                        </div>
                    </div>
                    <p class="mt-1">{{ Str::limit($article->description, 50) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
