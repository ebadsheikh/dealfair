@extends('frontend.layouts.master')
@section('title', 'report ' | 'Dealfair')
@section('content')
    <div>
        <div class="container p-lg-0 my-5">
            <div class="bg-secondary rounded px-5 py-2">
                Breadcrumbs
            </div>
        </div>
        <div class="container p-lg-0 mb-5">
            <div class="bg-white border border-2 border-gray-200 rounded-3 p-5">
                <div class="row gx-3 gx-md-4 gx-lg-6">
                    <div class="col-4 col-md-2 ">
                        <img class="rounded-3 shadow df-cps-img" src="{{asset('assets/media/products/10.png')}}"
                             alt="image"/>
                    </div>
                    <div class="col-8 col-md-10">
                        <div>Google Pixel 4a G025J Unlocked 128GB Black Good</div>
                        <div class="text-black"><span class="text-muted">Item no:</span> 185285411342</div>
                        <div class="text-black"><span class="text-muted">Seller:</span> yywirelesss</div>
                    </div>
                </div>
                <hr>
                <form method="POST">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>What is wrong with this listing?</option>
                        <option value="1">There is a problem with my order</option>
                        <option value="2">Some Listing information is missing, inaccurate or could be improved</option>
                        <option value="3">I have an issue with the price</option>
                        <option value="4">Parts of this page don't match</option>
                        <option value="5">This Listing or content is offensive</option>
                        <option value="5">This Listing is illegal, unsafe or suspicious</option>
                        <option value="6">Other</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
@endsection
