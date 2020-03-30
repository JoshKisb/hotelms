<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home') }}" class="site_title" sty>
                <span>{{ $app_name }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatarUrl() }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
                <span style="margin-top: 10px; color: #73879C">{{ auth()->user()->role->name }}</span>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3>
                <ul class="nav side-menu">
                    <li class="nav-item {{ ($menu == 'dashboard') ? 'active':'' }}">
                        <a href="{{ route('home') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a>
                    </li>
                    @can('view-occupants')
                    <li class="nav-item {{ ($menu == 'occupants') ? 'active':'' }}">
                        <a href="{{ route('occupants.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_occupants') }}
                        </a>
                    </li>
                    @endcan
                    @can('view-customers')
                    <li class="nav-item {{ ($menu == 'customers') ? 'active':'' }}">
                        <a href="{{ route('customers.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_customers') }}
                        </a>
                    </li>
                    @endcan
                    @can('view-reservations')
                    <li class="nav-item {{ ($menu == 'reservations') ? 'active':'' }}">
                        <a href="{{ route('reservations.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_reservations') }}
                        </a>
                    </li>
                    @endcan
                    @can('view-rooms')
                    <li class="nav-item {{ ($menu == 'rooms') ? 'active':'' }}">
                        <a href="{{ route('rooms.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.rooms') }}
                        </a>
                    </li>
                    @endcan
                    @can('view-roomtypes')
                    <li class="nav-item {{ ($menu == 'room_types') ? 'active':'' }}">
                        <a href="{{ route('room_types.index') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.room_types') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_1') }}</h3>
                <ul class="nav side-menu">
                    @endcan
                    @can('manage-settings')
                    <li class="nav-item {{ ($menu == 'settings') ? 'active':'' }}">
                        <a href="{{ route('settings.general') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_settings') }}
                        </a>
                    </li>
                    @endcan
                    @can('view-users')
                    <li class="nav-item {{ ($menu == 'users') ? 'active':'' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_1') }}
                        </a>
                    </li>
                    @endcan
                    @can('view-roles')
                    <li class="nav-item {{ ($menu == 'roles') ? 'active':'' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.roles') }}
                        </a>
                    </li>
                    @endcan
                </ul>
            </div>
            
           
        </div>
        <!-- /sidebar menu -->
         <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Collapse Sidebar">
                <i class="fa fa-angle-double-left" aria-hidden="true"></i>
              </a>
            </div>
            <!-- /menu footer buttons -->
    </div>
</div>
