@include('admin.staff-details.basic_info')
<div class="{{(Request::query('tab') === 'profile' || !Request::query('tab'))  ? '' : ""}} p-0 mb-5">
    <div class="tab-content" id="myTabContent">
        @if(Request::query('tab') === 'profile')
        @include('admin.staff-details.profile')
        @elseif(Request::query('tab') === 'activity')
        @include('admin.staff-details.activity')
        @elseif(Request::query('tab') === 'update_password')
        @include('admin.staff-details.update_password')
        @else
        @include('admin.staff-details.profile')
        @endif
    </div>
</div>
