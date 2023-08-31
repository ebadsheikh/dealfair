<div class="tab-pane fade show active" id="product" role="tabpanel">
    <div class="card card-flush">
        <!--begin::Body-->
        <div class="card-body pt-6">
            @if(count($userData['listingVieweds']) > 0)
                <!--begin::Timeline-->
                <div class="">
                    <table
                        class="table align-middle border rounded table-row-dashed fs-6 g-5"
                        id="kt_datatable_example">
                        <thead>
                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase">
                            <th class="text-start min-w-50px">Ip</th>
                            <th class="text-start min-w-50px">Listing</th>
                            <th class="text-start min-w-50px">Request From</th>
                            <th class="text-start min-w-50px">Browser</th>
                            <th class="text-start min-w-50px">Browser Version</th>
                            <th class="text-start min-w-50px">Platform</th>
                            <th class="text-start min-w-50px">Device Type</th>
                        </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                        @foreach ($userData['listingVieweds'] as $listingViewed)
                            <tr class="text-start">
                                <td class="text-dark">{{ $listingViewed->ip }}</td>
                                <td class="text-dark"><a href="{{route('listing.details',$listingViewed->listings->slug)}}" target="_blank">{{ $listingViewed->listings->title }}</a></td>
                                <td class="text-dark">{{ $listingViewed->request_from }}</td>
                                <td class="text-dark">{{ $listingViewed->browser }}</td>
                                <td class="text-dark">{{ $listingViewed->browser_version }}</td>
                                <td class="text-dark">{{ $listingViewed->platform }}</td>
                                <td class="text-dark">{{ $listingViewed->device_type }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end::Timeline-->

            @else

                <h3 class="text-center">No Listing Viewed</h3>

            @endif

        </div>
        <!--end: Card Body-->
    </div>
</div>
