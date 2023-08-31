@include('admin.customer-details.basic_info')
<div class="{{ Request::query('tab') === 'profile' || !Request::query('tab') ? '' : '' }} p-0 mb-5">
    <div class="tab-content" id="myTabContent">
        @if (Request::query('tab') === 'profile')
            @can('View Customer Profile')
                @include('admin.customer-details.profile')
            @endcan
        @elseif(Request::query('tab') === 'addresses')
            @can('View Customer Addresses')
                @include('admin.customer-details.addresses')
            @endcan
        @elseif(Request::query('tab') === 'communities')
            @can('View Customer Communities')
                @include('admin.customer-details.communities')
            @endcan
        @elseif(Request::query('tab') === 'listing')
            @can('View Customer Listing')
                @include('admin.customer-details.listing')
            @endcan
{{--        @elseif(Request::query('tab') === 'activity')--}}
{{--            @can('View Customer Activity')--}}
{{--                @include('admin.customer-details.activity')--}}
{{--            @endcan--}}
        @elseif(Request::query('tab') === 'listing_viewed')
            @can('View Customer Product Viewed')
                @include('admin.customer-details.listings_viewed')
            @endcan
        @elseif(Request::query('tab') === 'verification')
            @can('View Customer Verification')
                @include('admin.customer-details.verification')
            @endcan
        @elseif(Request::query('tab') === 'update_password')
            @can('View Customer Update Password')
                @include('admin.customer-details.update_password')
            @endcan
        @elseif(Request::query('tab') === 'reported_user')
            @can('View Customer User Reported')
                @include('admin.customer-details.reported_user')
            @endcan
        @else
            @can('View Customer Profile')
                @include('admin.customer-details.profile')
            @endcan
        @endif
    </div>
</div>
