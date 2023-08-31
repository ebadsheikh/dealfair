<table class="table align-middle border rounded table-row-dashed fs-6 g-5" id="kt_datatable_example">
    <thead>
        <!--begin::Table row-->
        <tr class="text-center text-gray-400 fw-bold fs-7 text-uppercase">
            <th class="text-center min-w-50px">Reported By</th>
            <th class="text-center min-w-50px">Reported To</th>
            <th class="text-center min-w-100px">Reason</th>
            <th class="text-center min-w-100px">Description</th>
            <th class="text-center min-w-200px">Action</th>
        </tr>
        <!--end::Table row-->
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach ($reportedUsers as $reportedUser)
        <tr class="text-center">
            <td class="text-dark">{{$reportedUser->reportedBy->full_name}}</td>
            <td class="text-dark">{{$reportedUser->reportedTo->full_name}}</td>
            <td class="text-dark">{{$reportedUser->reason->type}}</td>
            <td class="text-dark">{{$reportedUser->description}}</td>
            <td class="text-dark">
                <div class="">
                    <x-action-button id="1" editUrl="#" deleteUrl="#" />
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
