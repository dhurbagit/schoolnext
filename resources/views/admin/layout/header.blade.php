<div class="header-outer">
    <div class="header">
        <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fas fa-bars" aria-hidden="true"></i></a>

        <a id="toggle_btn" class="float-left" href="javascript:void(0);">
            <img src="{{ asset('backend/assets/img/sidebar/icon-21.png') }}" alt="">
        </a>
        <!-- Search-->
        <ul class="nav float-left">
            <li>
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">
                        <input class="form-control" type="text" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </li>
            <li>
                <a href="index.html" class="mobile-logo d-md-block d-lg-none d-block"><img src="assets/img/logo1.png"
                        alt="" width="30" height="30"></a>
            </li>
        </ul>
        <!--/Search-->

        <ul class="nav user-menu float-right">
             
            <li class="nav-item dropdown has-arrow">
                <a href="#" class=" nav-link user-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle"
                            src="{{ asset('backend/assets/img/user-06.jpg') }}" width="30" alt="Admin">
                        <span class="status online"></span></span>
                    <span>{{ ucfirst($session_id->name ?? '') }}</span>

                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('setting') }}">Settings</a>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a>
                </div>
            </li>
        </ul>
        <div class="dropdown mobile-user-menu float-right">
            <!-- mobile menu -->
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fas fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="profile.html">My Profile</a>
                <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>
                <a class="dropdown-item" href="">Logout</a>
            </div>
        </div>
    </div>
</div>
