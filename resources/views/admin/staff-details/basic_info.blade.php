<div class="card ">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    @if ($user->getFirstMediaUrl('user_image'))
                        <img src="{{ $user->getFirstMediaUrl('user_image') }}" alt="image" />
                    @else
                        <img src="{{ asset('assets/media/svg/avatars/blank.svg') }}" alt="image" />
                    @endif
                    <div
                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <a href="#"
                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->full_name }}</a>

                            <span
                                class="badge {{ $userData['userProfile']->status == 'active'
                                    ? 'badge-primary'
                                    : ($userData['userProfile']->status == 'suspended'
                                        ? 'badge-success'
                                        : ($userData['userProfile']->status == 'deactivated'
                                            ? 'badge-warning'
                                            : ($userData['userProfile']->status == 'blocked'
                                                ? 'badge-danger'
                                                : ''))) }} mx-2">{{ ucfirst($userData['userProfile']->status) }}</span>
                        </div>
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            <a href="#"
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                            fill="currentColor" />
                                        <path
                                            d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                            fill="currentColor" />
                                        <rect x="7" y="6" width="4" height="4" rx="2"
                                            fill="currentColor" />
                                    </svg>
                                </span>{{$user->roles->first()->name}}
                            </a>
                            <a href="#"
                                class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                <span class="svg-icon svg-icon-4 me-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                            fill="currentColor" />
                                        <path
                                            d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>{{ $user->email }}
                            </a>
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <span class="me-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                        <path
                                            d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                </span>{{ $user->created_at->format('Y-M-d') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <li class="nav-item mt-2 ">
                <a class="nav-link text-active-primary {{(Request::query('tab') === 'profile' || !Request::query('tab')) ? "active" : ""}} ms-0 me-10 py-5"
                    href="{{ route('admin.staff.details', ['user' => $user->id, 'tab' => 'profile']) }}">Profile</a>
            </li>

            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary {{(Request::query('tab') === 'update_password') ? "active" : ""}} ms-0 me-10 py-5 "
                    href="{{ route('admin.staff.details', ['user' => $user->id, 'tab' => 'update_password']) }}">Update Password</a>
            </li>
        </ul>
    </div>
</div>
