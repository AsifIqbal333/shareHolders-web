<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <!-- Start Logo container-->
        <a class="logo" href="{{ route('homepage') }}">
            <span class="inline-block dark:hidden">
                <img src="{{ asset('assets/images/logo-dark.png') }}" class="l-dark" height="24"
                    alt="{{ config('app.name') }}">
                <img src="{{ asset('assets/images/logo-light.png') }}" class="l-light" height="24"
                    alt="{{ config('app.name') }}">
            </span>
            <img src="{{ asset('assets/images/logo-light.png') }}" height="24" class="hidden dark:inline-block"
                alt="{{ config('app.name') }}">
        </a>
        <!-- End Logo container-->

        <!-- Start Mobile Toggle -->
        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>
        <!-- End Mobile Toggle -->

        <!--Login button Start-->
        <ul class="buy-button list-none mb-0">
            <li class="inline mb-0">
                <a href="{{ route('login') }}"
                    class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"><i
                        data-feather="user" class="h-4 w-4 stroke-[3]"></i></a>
            </li>
            <li class="sm:inline ps-1 mb-0 hidden">
                <a href="{{ route('register') }}"
                    class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full">{{ __('Signup') }}</a>
            </li>
        </ul>
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu justify-end nav-light">
                {{-- <li><a href="{{ route('homepage') }}" class="sub-menu-item">{{ __('Home') }}</a></li> --}}

                <li><a href="{{ route('property_page') }}" class="sub-menu-item">{{ __('Properties') }}</a></li>

                <li><a href="{{ route('about') }}" class="sub-menu-item">{{ __('About') }}</a></li>

                <li><a href="{{ route('sell') }}" class="sub-menu-item">{{ __('Sell') }}</a></li>

                <li><a href="{{ route('contact.index') }}" class="sub-menu-item">{{ __('Contact') }}</a></li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">{{ __('Learn') }}</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        {{-- <li><a href="javascript:void(0)" class="sub-menu-item">{{ __('Blog') }}</a></li> --}}
                        <li><a href="javascript:void(0)" class="sub-menu-item">{{ __('FAQs') }}</a></li>
                        <li><a href="javascript:void(0)" class="sub-menu-item">{{ __('Glossary') }}</a></li>
                    </ul>
                </li>

                {{-- <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Listing</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Grid View </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="grid.html" class="sub-menu-item">Grid Listing</a></li>
                                <li><a href="grid-sidebar.html" class="sub-menu-item">Grid Sidebar </a></li>
                                <li><a href="grid-map.html" class="sub-menu-item">Grid With Map</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> List View </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="list.html" class="sub-menu-item">List Listing</a></li>
                                <li><a href="list-sidebar.html" class="sub-menu-item">List Sidebar </a></li>
                                <li><a href="list-map.html" class="sub-menu-item">List With Map</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)"> Property Detail </a><span
                                class="submenu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="property-detail.html" class="sub-menu-item">Property Detail</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</nav><!--end header-->
<!-- End Navbar -->
