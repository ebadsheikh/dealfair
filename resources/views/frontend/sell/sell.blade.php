@extends('frontend.layouts.master')
@section('content')
    <div class="container my-5 py-5 my-md-10 py-md-10 px-5 px-5">
        <div class="row ">
            <div class="d-none d-md-block col-md-2 ">
                <nav class="nav flex-column align-items-stretch rounded-4 py-10 bg-white"
                     style=" position: sticky; top: 11rem;">
                    <div class="nav-item">
                        <a class="nav-link fw-bold text-active-white bg-active-primary text-black text-uppercase" href="#stepsToSell">3 Steps
                            to
                            sell</a>
                        <div class="nav-item">
                            <a class="nav-link fw-bold text-active-white bg-active-primary text-black text-uppercase" href="#getInspired">Get
                                inspired</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link fw-bold text-active-white bg-active-primary text-black text-uppercase" href="#bestPractices">Best
                                Practices</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link fw-bold text-active-white bg-active-primary text-black text-uppercase" href="#readyToSell">Ready
                                to
                                sell?</a>
                        </div>

                    </div>
                </nav>
            </div>
            <div class="col-12 col-md-10">
                <div data-bs-spy="scroll" data-bs-target="#navbar-example3" data-bs-smooth-scroll="true"
                     class="scrollspy-example-2 " tabindex="0">
                    <div id="stepsToSell" class="py-6 py-md-10 px-5 bg-white rounded-4 mb-5">
                        <div class="fw-bolder text-uppercase fs-4 mb-5">3 Steps to sell</div>
                        <div class="row gy-5">
                            <div class="col-md-4">
                                <div class="card h-100 " style="border: 2px solid #eeeeee">
                                    <img src="{{asset('assets/media/list-card-img.jpg')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body text-center">
                                        <div class="text-dark fw-bolder fs-1 mb-2">List</div>
                                        <p class="text-muted mb-4 df-fs-14">Learn what to sell, how to photograph and
                                            describe
                                            it, and how to price it right.</p>
                                        <a id="watch-now" class="btn btn-primary" target="_blank">Watch Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 " style="border: 2px solid #eeeeee">
                                    <img src="{{asset('assets/media/ship-card-img.jpg')}}" class="card-img-top"
                                         style="height: 14.25rem; object-fit: cover;">
                                    <div class="card-body text-center">
                                        <div class="text-dark fw-bolder fs-1 mb-2">Ship</div>
                                        <p class="text-muted mb-4 df-fs-14">Learn how to pack your item, print your
                                            label, and
                                            ship with ease.</p>
                                        <a href="#" class="btn btn-primary ">Watch Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 " style="border: 2px solid #eeeeee">
                                    <img src="{{asset('assets/media/earn-card-img.jpg')}}" class="card-img-top"
                                         alt="...">
                                    <div class="card-body text-center">
                                        <div class="text-dark fw-bolder fs-1 mb-2">Earn cash</div>
                                        <p class="text-muted mb-4 df-fs-14">How do you want to be paid? We show you your<br>
                                            options.</p>
                                        <a href="#" class="btn btn-primary ">Check It Out</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="getInspired" class="py-6 py-md-10 px-5 bg-white rounded-4 mb-5">
                        <div class="row ">
                            <div class="col-12 col-md-5 col-lg-6">
                                <img src="{{ asset('assets/media/get_inspired.jpg') }}"
                                     class="d-block w-100 rounded-4" style="mix-blend-mode: multiply" alt="...">
                            </div>
                            <div class="col-12 col-md-7 col-lg-6 d-block d-md-flex">
                                <div
                                    class="d-flex px-4 px-lg-14 my-auto justify-content-center justify-content-md-start">
                                    <div>
                                        <h4 class="fs-3hx fw-bold text-black mb-3" id="dealfair-get-app"><span
                                                class="text-primary fw-bolder">Get</span>
                                            Inspired</h4>
                                        <div class="text-black fw-normal mb-3" style="font-size: 16px"
                                             id="dealfair-sell-buy">If
                                            you want to know what buyers are looking for, use our research to help you
                                            score
                                            more sales.
                                        </div>
                                        <div class="text-center text-md-start">
                                            <a href="#" class="btn btn-primary">Watch Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="bestPractices" class="py-6 py-md-10 px-5 bg-white rounded-4 mb-5">
                        <div class="row ">
                            <div class="col-12 col-md-7 col-lg-6 d-block d-md-flex">
                                <div
                                    class="d-flex px-4 px-lg-14 my-auto justify-content-center justify-content-md-start">
                                    <div>
                                        <h4 class="fs-3hx fw-bold text-black mb-3" id="dealfair-get-app"><span
                                                class="text-primary fw-bolder">Best</span>
                                            Practices</h4>
                                        <div class="text-black fw-normal mb-3" style="font-size: 16px"
                                             id="dealfair-sell-buy">
                                            Create listings that are sure to sell with these tips.
                                        </div>
                                        <div class="text-center text-md-start">
                                            <a href="#" class="btn btn-primary">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-5 col-lg-6">
                                <img src="{{ asset('assets/media/best_tip_to_sell.jpg') }}"
                                     class="d-block w-100 rounded-4" style="mix-blend-mode: multiply" alt="...">
                            </div>
                        </div>
                    </div>
                    <div id="readyToSell" class="py-6 py-md-10 px-5 bg-white rounded-4 mb-5">
                        <div class="row gy-5">
                            <div class="col-12 col-md-7 col-lg-6 d-block d-md-flex">
                                <div
                                    class="d-flex px-4 px-lg-14 my-auto justify-content-center justify-content-md-start">
                                    <div>
                                        <h4 class="fs-3hx fw-bold text-black mb-3" id="dealfair-get-app"><span
                                                class="text-primary fw-bolder">Ready</span>
                                            To Sell</h4>
                                        <div class="text-black fw-normal mb-3" style="font-size: 16px"
                                             id="dealfair-sell-buy">
                                            You have all the tools. Time to make extra cash.
                                        </div>
                                        <div class="text-center text-md-start">
                                            <a href="#" class="btn btn-primary">Watch Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7 col-lg-6 d-block d-md-flex">
                                <div
                                    class="d-flex px-4 px-lg-14 my-auto justify-content-center justify-content-md-start">
                                    <div>
                                        <div class="bg-white rounded-4 p-5 position-relative mb-2 shadow">
                                            <div
                                                class="position-absolute bg-primary border border-3 border-white rounded-circle text-white fw-bolder"
                                                style="top: 31%; left: -1.75rem; padding: 6px 12px;">1
                                            </div>
                                            <div class="fw-bold ">List Your Item</div>
                                            <p class="text-muted">You can list new or used items and pay a final value
                                                fee only
                                                when it sells. <a href="#">Learn more about fees</a>.</p>
                                        </div>
                                        <div class="bg-white rounded-4 p-5 position-relative ms-0 ms-md-10 mb-2 shadow">
                                            <div
                                                class="position-absolute bg-primary border border-3 border-white rounded-circle text-white fw-bolder"
                                                style="top: 31%; left: -1.75rem; padding: 6px 12px;">2
                                            </div>
                                            <div class="fw-bold ">Get Seller Protection</div>
                                            <p class="text-muted">You’re protected by policies, monitoring, and our
                                                customer
                                                service team.</p>
                                        </div>
                                        <div class="bg-white rounded-4 p-5 position-relative ms-0 ms-md-20 mb-2 shadow">
                                            <div
                                                class="position-absolute bg-primary border border-3 border-white rounded-circle text-white fw-bolder"
                                                style="top: 31%; left: -1.75rem; padding: 6px 12px;">3
                                            </div>
                                            <div class="fw-bold ">Choose When You Get Paid</div>
                                            <p class="text-muted">You can schedule either daily or weekly payouts, and
                                                we'll
                                                deposit your earnings directly into your bank account.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        // Function to open YouTube video in full-screen mode
        function openYouTubeVideo() {
            var videoId = 'HYb4FGDTBmw'; // Replace with your actual YouTube video ID
            var youtubeUrl = 'https://www.youtube.com/watch?v=' + videoId;
            document.getElementById('watch-now').setAttribute('href', youtubeUrl);

            // Create a new YouTube Iframe Player
            var player = new YT.Player('youtube-player', {
                videoId: videoId,
                events: {
                    'onReady': onPlayerReady,
                }
            });
        }

        // Function to be called when the YouTube player is ready
        function onPlayerReady(event) {
            event.target.playVideo(); // Autoplay video when the player is ready
            event.target.getIframe().requestFullscreen(); // Request full-screen mode
        }

        // Attach click event to the anchor tag
        document.getElementById('watch-now').addEventListener('click', openYouTubeVideo);
    </script>
@endpush
