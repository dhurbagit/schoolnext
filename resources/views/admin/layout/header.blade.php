<div class="header-outer">
    <div class="header">


        <!-- Search-->
        <ul class="nav float-left">
            <li>
                <div class="nav_barand">
                    <a href="{{ url('/') }}" class="logo" target="_blank">
                        @isset($setting)
                            <img src="{{ asset('setting/' . $setting->logo) }}" width="40" height="40" alt="">
                        @endisset
                        <span class="text-uppercase">{{ $setting->school_name ?? '' }}</span>
                    </a>
                </div>
            </li>

        </ul>
        <!--/Search-->

        <ul class="nav user-menu float-right">
            @if (App\Models\User::find(Session::get('loginId'))->email == 'allstarsms45@gmail.com')
                <li class="cs_hover">
                    <a href="{{ route('theme.option') }}" class="nav-link">
                        <img src="{{ asset('backend/assets/img/sidebar/icon-15.png') }}" alt="">
                    </a>
                </li>
                <li class="cs_hover">
                    <a href="{{ route('setting') }}" class="nav-link"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-14.png') }}" alt=""> </a>
                </li>
            @endif
            <li class="cs_hover">
                <a href="{{ route('vacancy') }}" class="nav-link"><b>Vacancy</b> <span class="custom_badge">{{ Vacancy() }}</span> </a>
            </li>
            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="{{ asset('setting/' . $setting->logo) }}"
                            width="30" alt="Admin">
                        <span class="status online"></span></span>
                    <span>{{ ucfirst($session_id->name ?? '') }}</span>

                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('admin.register') }}">Add User</a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                </div>
            </li>
        </ul>

    </div>
</div>
