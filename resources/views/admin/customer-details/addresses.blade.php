<div class="tab-pane fade show active" id="address" role="tabpanel">
    <div class="card mb-5 mb-xl-10">
        <div id="kt_account_settings_profile_details" class="collapse show">
            <div class="card-body">
                <table
                    class="table align-middle border rounded table-row-dashed fs-6 g-5"
                    id="kt_datatable_example">
                    <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase">
                        <th class="text-start min-w-50px">#</th>
                        <th class="text-start min-w-50px">Address</th>
                        <th class="text-start">Zip</th>
                    </tr>
                    </thead>
                    <tbody class="fw-semibold text-gray-600">
                    @foreach ($user->userAddresses as $user_address)
                        <tr class="text-start">
                            <td class="text-dark">{{ $loop->iteration }}</td>
                            <td class="text-dark">{{ $user_address->address }}</td>
                            <td class="text-dark">{{ $user_address->zip }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
