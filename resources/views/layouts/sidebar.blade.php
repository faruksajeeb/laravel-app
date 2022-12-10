<section id="sidebar">
    <div class="navigation bg-white">
        <div class="row brand-name-section">
            <div class="col-md-12">
                <ul class="p-0 brand-name">
                    <li class="">
                        <a href="{{ route('dashboard') }}" class="bg-white ">
                            <span class="icon"><i class="fa-brands fa-xl fa-apple"></i></span>
                            <span class="title">
                                <h5 class=" py-4">{{ $company_settings->company_name }}</h5>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="side-menu h-100 ">
            <ul class="p-0 mb-3" id="menu">
                @if (Auth::guard('web')->user()->can('option_group.view') ||
                    Auth::guard('web')->user()->can('option.view'))
                    <li>
                        <a href="#master_submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                            <span class="icon"><i class="fa-solid fa-list"></i></span>
                            <span class="ms-1 d-sm-inline title ">Master</span>
                            <i class="icon fa-solid fa-angle-right text-right"></i>
                        </a>
                        <ul class="collapse nav flex-column ms-3 ps-3 {{ Route::is('users.index') || Route::is('users.create') || Route::is('roles.index') || Route::is('roles.create') ? 'show' : '' }}"
                            id="master_submenu1" data-bs-parent="#menu">
                            <li class="{{ Route::is('users.create') ? 'active' : '' }}">
                                <a href="{{ url('option-groups') }}" class="nav-link px-2"> <span class="d-sm-inline"><i
                                            class="fa-solid fa-table"></i> Option Groups</span></a>
                            </li>
                            <li class="{{ Route::is('users.create') ? 'active' : '' }}">
                                <a href="{{ url('users/create') }}" class="nav-link px-2"> <span class="d-sm-inline"><i
                                            class="fa-solid fa-table"></i> Options</span></a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::guard('web')->user()->can('user.view') ||
                    Auth::guard('web')->user()->can('user.create') ||
                    Auth::guard('web')->user()->can('role.view') ||
                    Auth::guard('web')->user()->can('role.create'))
                    <li>
                        <a href="#user_submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                            <span class="icon"><i class="fa-solid fa-users"></i></span>
                            <span class="ms-1 d-sm-inline title ">Users</span>
                            <i class="icon fa-solid fa-angle-right text-right"></i>
                        </a>
                        <ul class="collapse nav flex-column ms-3 ps-3 {{ Route::is('users.index') || Route::is('users.create') || Route::is('roles.index') || Route::is('roles.create') ? 'show' : '' }}"
                            id="user_submenu1" data-bs-parent="#menu">
                            @if (Auth::guard('web')->user()->can('user.view') ||
                                Auth::guard('web')->user()->can('user.create'))
                                @can('user.create')
                                    <li class="{{ Route::is('users.create') ? 'active' : '' }}">
                                        <a href="{{ url('users/create') }}" class="nav-link px-2"> <span
                                                class="d-sm-inline"><i class="fa-solid fa-pencil"></i> Create
                                                User</span></a>
                                    </li>
                                @endcan
                                @can('user.view')
                                    <li class="{{ Route::is('users.index') ? 'active' : '' }}">
                                        <a href="{{ url('users') }}" class="nav-link px-2"> <span class="d-sm-inline"><i
                                                    class="fa-solid fa-table"></i> Manage
                                                Users</span></a>
                                    </li>
                                @endcan
                                @can('role.create')
                                    <li class="{{ Route::is('roles.create') ? 'active' : '' }}">
                                        <a href="{{ url('roles/create') }}" class="nav-link px-2"> <span
                                                class="d-sm-inline"><i class="fa-solid fa-pencil"></i> Create
                                                Role</span></a>
                                    </li>
                                @endcan
                                @can('role.view')
                                    <li class="{{ Route::is('roles.index') ? 'active' : '' }}">
                                        <a href="{{ url('roles') }}" class="nav-link px-2"> <span class="d-sm-inline"><i
                                                    class="fa-solid fa-table"></i> Manage
                                                Roles</span></a>
                                    </li>
                                @endcan
                            @endif
                        </ul>
                    </li>
                @endif
                <li>
                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link ps-1 align-middle">
                        <span class="icon"><i class="fa-solid fa-gear"></i></span>
                        <span class="ms-1 d-sm-inline title ">Settings</span>
                        <i class="icon fa-solid fa-angle-right text-right"></i>
                    </a>
                    <ul class="collapse nav flex-column ms-3 ps-3 {{ Route::is('company-setting') ||
                    Route::is('basic-setting') ||
                    Route::is('email-setting') ||
                    Route::is('theme-setting') ||
                    Route::is('invoice-setting') ||
                    Route::is('approval-setting') ||
                    Route::is('salary-setting') ||
                    Route::is('notification-setting') ||
                    Route::is('toxbox-setting') ||
                    Route::is('cron-setting')
                        ? 'show'
                        : '' }}"
                        id="submenu1" data-bs-parent="#menu">

                        @can('company.setting')
                            <li class="{{ Route::is('company-setting') ? 'active' : '' }}">
                                <a href="{{ route('company-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-building"></i> <span class="d-sm-inline ps-1 mb-1"> Company
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('basic.setting')
                            <li class="{{ Route::is('basic-setting') ? 'active' : '' }}">
                                <a href="{{ route('basic-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-clock"></i> <span class="d-sm-inline ps-1 mb-1"> Basic
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('theme.setting')
                            <li class="{{ Route::is('theme-setting') ? 'active' : '' }}">
                                <a href="{{ route('theme-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-image"></i> <span class="d-sm-inline ps-1 mb-1"> Theme
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('email.setting')
                            <li class="{{ Route::is('email-setting') ? 'active' : '' }}">
                                <a href="{{ route('email-setting') }}" class="nav-link px-2"><i class="fa-solid fa-at"></i>
                                    <span class="d-sm-inline ps-1 mb-1"> Email Settings</span></a>
                            </li>
                        @endcan
                        @can('performance.setting')
                            <li class="{{ Route::is('performance-setting') ? 'active' : '' }}">
                                <a href="{{ route('performance-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-chart-bar"></i> <span class="d-sm-inline ps-1 mb-1">
                                        Performance
                                        Configuration</span></a>
                            </li>
                        @endcan
                        @can('approval.setting')
                            <li class="{{ Route::is('approval-setting') ? 'active' : '' }}">
                                <a href="{{ route('approval-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-thumbs-up"></i> <span class="d-sm-inline ps-1 mb-1"> Approval
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('invoice.setting')
                            <li class="{{ Route::is('invoice-setting') ? 'active' : '' }}">
                                <a href="{{ route('invoice-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-pencil-square"></i> <span class="d-sm-inline ps-1 mb-1">
                                        Invoice
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('salary.setting')
                            <li class="{{ Route::is('salary-setting') ? 'active' : '' }}">
                                <a href="{{ route('salary-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-money-bill"></i> <span class="d-sm-inline ps-1 mb-1"> Salary
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('notification.setting')
                            <li class="{{ Route::is('notification-setting') ? 'active' : '' }}">
                                <a href="{{ route('notification-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-globe"></i> <span class="d-sm-inline ps-1 mb-1"> Notifications
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('toxbox.setting')
                            <li class="{{ Route::is('toxbox-setting') ? 'active' : '' }}">
                                <a href="{{ route('toxbox-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-comment"></i> <span class="d-sm-inline ps-1 mb-1">ToxBox
                                        Settings</span></a>
                            </li>
                        @endcan
                        @can('cron.setting')
                            <li class="{{ Route::is('cron-setting') ? 'active' : '' }}">
                                <a href="{{ route('cron-setting') }}" class="nav-link px-2"><i
                                        class="fa-solid fa-rocket"></i> <span class="d-sm-inline ps-1 mb-1">Cron
                                        Settings</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</section>
