<div id="kt_aside" class="aside card" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
    <div class="aside-menu flex-column-fluid px-4">
        <div class="hover-scroll-overlay-y my-5 pe-4 me-n4" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_footer', lg: '#kt_header, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="{default: '5px', lg: '75px'}">
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_aside_menu" data-kt-menu="true">
                <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-element-11 fs-2x">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                            </i>
                        </span>
                        <span class="menu-title">Dashboards</span>
                        <span class="menu-arrow"></span>
                    </span>

                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{Request::route()->getName() == 'seller.dashboard' ? 'active' : ''}}" href="{{route('seller.dashboard')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Seller Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Buyer Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="{{route('community.dashboard')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Community Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Ads Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Store Dashboard</span>
                            </a>
                        </div>

                        <div class="menu-item">
                            <a class="menu-link" href="#">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Community Admin Dashboard</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">General</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{Request::route()->getName() == 'shipping.address.index' ? 'active' : ''}}" href="{{ Route('shipping.address.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-truck fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                             <i class="path3"></i>
                             <i class="path4"></i>
                             <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title">Shipping Addresses</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{Request::route()->getName() == 'orders' ? 'active' : ''}}" href="{{ Route('orders') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-truck fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                             <i class="path3"></i>
                             <i class="path4"></i>
                             <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title">Your Orders</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{Request::route()->getName() == 'activities' ? 'active' : ''}}" href="{{route('activities')}}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-note-2 fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                             <i class="path3"></i>
                             <i class="path4"></i>
                            </i>
                        </span>
                        <span class="menu-title">Recent Activities</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-wallet fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                             <i class="path3"></i>
                             <i class="path4"></i>
                            </i>
                        </span>
                        <span class="menu-title">Wallet</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-people fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                             <i class="path3"></i>
                             <i class="path4"></i>
                             <i class="path5"></i>
                            </i>
                        </span>
                        <span class="menu-title">Manage Follow</span>
                    </a>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Conversation</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{Request::route()->getName() == 'chat' ? 'active' : ''}}" href="{{ Route('chat') }}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-3">
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
																<path opacity="0.3"
                                                                      d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
                                                                      fill="currentColor"/>
																<rect x="6" y="12" width="7" height="2" rx="1"
                                                                      fill="currentColor"/>
																<rect x="6" y="7" width="12" height="2" rx="1"
                                                                      fill="currentColor"/>
															</svg>
														</span>
                        </span>
                        <span class="menu-title">Chat</span>
                    </a>
                </div>

                <div class="menu-item pt-5">
                    <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Help</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{Request::route()->getName() == 'ticket.index' ? 'active' : ''}}" href="{{ Route('ticket.index') }}">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-question-2 fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                             <i class="path3"></i>
                            </i>
                        </span>
                        <span class="menu-title">Support</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="#">
                        <span class="menu-icon">
                            <i class="ki-duotone ki-arrows-circle fs-2x">
                             <i class="path1"></i>
                             <i class="path2"></i>
                            </i>
                        </span>
                        <span class="menu-title">Refund Requests</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
