<div>
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5 mb-5">Assign Permissions</h2>
        </div>
        @foreach ($permissions as $permission)
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">{{ $permission['groupName'] }}</h3>
                        <div class="card-toolbar">
                            <label
                                class="form-check form-switch form-check-custom d-flex justify-content-between align-items-center form-check-solid fs-4">
                                <span class="form-check-label fw-semibold text-muted ms-0">
                                    Select All
                                </span>
                                <input class="form-check-input ms-2"
                                    wire:click="toggleGroupPermissions('{{ $permission['groupName'] }}')"
                                    type="checkbox" value="1" {{ $permission['selectAll'] ? 'checked' : '' }} />
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($permission['permissions'] as $permissionInfo)
                            <label
                                class="form-check form-switch form-check-custom d-flex justify-content-between align-items-center form-check-solid fs-4 mb-3">
                                <span class="form-check-label fw-semibold text-muted ms-0">
                                    {{ $permissionInfo['name'] }}
                                </span>
                                <input class="form-check-input"
                                    wire:click="togglePermission({{ $permissionInfo['id'] }})" type="checkbox"
                                    value="{{ $permissionInfo['id'] }}"
                                    {{ $permissionInfo['hasPermission'] ? 'checked' : '' }} />
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
