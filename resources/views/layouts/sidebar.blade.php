<section id="sidebar">
    <div class="navigation bg-white">
        <div class="row brand-name-section">
            <div class="col-md-12">
                <ul class="p-0 brand-name">
                    <li class="">
                        <a href="{{ route('dashboard') }}" class="bg-white ">
                            <span class="icon"><i class="fa-brands fa-xl fa-apple"></i></span>
                            <span class="title">
                                <h5 class=" py-4">{{ config('app.name', 'Laravel') }}</h5>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="side-menu h-100 ">
            <ul class="p-0" id="menu">
                
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                        <span class="icon"><i class="fa-solid fa-gear"></i></span>
                        <span class="ms-1 d-sm-inline title ">Settings</span>
                        <i class="icon fa-solid fa-angle-right text-right"></i>
                    </a>
                    <ul class="collapse nav flex-column ms-3 ps-3 {{ Route::is('users.index') || Route::is('users.create') || Route::is('roles.index')|| Route::is('roles.create') ? 'show' : '' }}" id="submenu1" data-bs-parent="#menu">
                        @if (Auth::guard('web')->user()->can('user.view') ||
                            Auth::guard('web')->user()->can('user.create'))
                            <li>
                                <a href="#submenu_1_label_1" data-bs-toggle="collapse" class="nav-link px-0"> <span
                                        class="d-sm-inline"><i class="fa-solid fa-users"></i> Users <i
                                            class="fa-solid fa-angle-right"></i></span> </a>
                                <ul class="collapse nav flex-column ms-3 ps-3 {{ Route::is('users.index') || Route::is('users.create') ? 'show' : '' }}" id="submenu_1_label_1"
                                    data-bs-parent="#submenu1">
                                    @if (Auth::guard('web')->user()->can('user.view'))
                                        <li  class="{{ Route::is('users.index') ? 'active' : '' }}">
                                            <a href="{{ url('users') }}" class="nav-link px-0"> <span class="d-sm-inline"><i
                                                        class="fa-solid fa-table"></i> Manage Users</span></a>
                                        </li>
                                    @endif
                                    @if (Auth::guard('web')->user()->can('user.create'))
                                        <li  class="{{ Route::is('users.create') ? 'active' : '' }}">
                                            <a href="{{ url('users/create') }}" class="nav-link px-0"> <span class="d-sm-inline"><i
                                                        class="fa-solid fa-pencil"></i> Create User</span></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endif
                        @if (Auth::guard('web')->user()->can('role.view') ||
                            Auth::guard('web')->user()->can('role.create'))
                        <li >
                            <a href="#submenu_2_label_1" data-bs-toggle="collapse" class="nav-link px-0"> <span
                                    class="d-sm-inline"><i class="fa-solid fa-key"></i> Roles <i
                                        class="fa-solid fa-angle-right"></i></span> </a>
                            <ul class="collapse nav flex-column ms-3 ps-3 {{ Route::is('roles.index') || Route::is('roles.create') ? 'show' : '' }}" id="submenu_2_label_1"
                                data-bs-parent="#submenu1">
                                @if (Auth::guard('web')->user()->can('role.create'))
                                <li class="{{ Route::is('roles.index') ? 'active' : '' }}">
                                    <a href="{{ url('roles') }}" class="nav-link px-0"> <span class="d-sm-inline"><i
                                                class="fa-solid fa-table"></i> Manage Roles</span></a>
                                </li>
                                @endif
                                @if (Auth::guard('web')->user()->can('role.create'))
                                <li class="{{ Route::is('roles.create') ? 'active' : '' }}">
                                    <a href="{{ url('roles/create') }}" class="nav-link px-0"> <span class="d-sm-inline"><i
                                                class="fa-solid fa-pencil"></i> Create Role</span></a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif
                    </ul>
                </li>
             
            </ul>
        </div>
    </div>
</section>
