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
                @foreach ($menus as $val)
                    <li>
                        <a href="">
                            <span class="icon">{!! $val->icon !!}</span>
                            <span class="title">{{ $val->menu_name; }}</span>
                        </a>
                    </li>
                @endforeach
                <li class="{{ Route::is('users.index') || Route::is('users.create') || Route::is('users.edit') ? 'active' : ''}}">
                    <a href="{{url('users')}}" >
                        <span class="icon"><i class="fa-solid fa-users "></i></span>
                        <span class="title">Users </span>
                    </a>
                </li>
                <li class="{{ Route::is('roles.index') || Route::is('roles.create') || Route::is('roles.edit') ? 'active' : ''}}">
                    <a href="{{url('roles')}}" >
                        <span class="icon"><i class="fa-solid fa-key "></i></span>
                        <span class="title">Role & Permissions </span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-table"></i></span>
                        <span class="title">Tables </span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-pencil"></i></span>
                        <span class="title">Forms </span>
                    </a>
                </li>
                <li>
                    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link ps-1 align-middle ">
                        <span class="icon"><i class="fa-solid fa-angle-right"></i></span>
                        <span class="ms-1 d-sm-inline title">Sub menu</span></a>
                    <ul class="collapse nav flex-column ms-3 ps-3" id="submenu2" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Item</span>
                                1</a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Item</span>
                                2</a>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link ps-1 align-middle ">
                        <span class="icon"><i class="fa-solid fa-angle-right"></i></span>
                        <span class="ms-1 d-sm-inline title">Sub menu3</span></a>
                    <ul class="collapse nav flex-column ms-3 ps-3" id="submenu3" data-bs-parent="#menu">
                        <li class="w-100">
                            <a href="#" class="nav-link px-0"> <span class=" d-sm-inline">Item</span>
                                1</a>
                        </li>
                        <li>
                            <a href="#submenu_label3" data-bs-toggle="collapse" class="nav-link px-0"> <span
                                    class="d-sm-inline"><i class="fa-solid fa-angle-right"></i> Item</span>
                                2</a>
                            <ul class="collapse nav flex-column ms-3 ps-3" id="submenu_label3"
                                data-bs-parent="#submenu3">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Sub
                                            menu
                                            1</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Sub
                                            menu
                                            2</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2_label3" data-bs-toggle="collapse" class="nav-link px-0">
                                <span class="d-sm-inline"><i class="fa-solid fa-angle-right"></i>
                                    Item</span>
                                3</a>
                            <ul class="collapse nav flex-column ms-3 ps-3" id="submenu2_label3"
                                data-bs-parent="#submenu3">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Sub
                                            menu
                                            1</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-sm-inline">Sub
                                            menu
                                            2</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-pencil"></i></span>
                        <span class="title">Forms </span>
                    </a>
                </li>
                <li>
                    <a href="">
                        <span class="icon"><i class="fa-solid fa-pencil"></i></span>
                        <span class="title">Forms </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</section>