<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <div class="header-left">
                <a href="{{ url('/') }}" class="logo">
                    @isset($setting)
                        <img src="{{ asset('setting/' . $setting->logo) }}" width="40" height="40" alt="">
                    @endisset
                    <span class="text-uppercase">Preschool</span>
                </a>
            </div>
            <ul class="sidebar-ul">
                <li class="menu-title">Menu</li>
                <li class="active">
                    <a href="{{ route('dashboard.view') }}"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-1.png') }}"
                            alt="icon"><span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span> Slider</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage-slider') }}"><span>Manage Slider</span></a></li>
                        <li><a href="{{ route('create-slider') }}"><span>Create Slider</span></a></li>
                        <li><a href="{{ route('create-banner_video') }}"><span>Create Video</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('menu.view') }}"><img src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}"
                            alt="icon"> <span>Menu</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span> Gallery</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage-gallery') }}"><span>Manage Album</span></a></li>
                        <li><a href="{{ route('create-gallery') }}"><span>Create Album</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span> Testimonial</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage-testimonial') }}"><span>Manage Testimonial</span></a></li>
                        <li><a href="{{ route('create-testimonial') }}"><span>Create Testimonial</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span> About</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('about.view') }}"><span>create About</span></a></li>
                        <li><a href="{{ route('Manage.mvo') }}"><span>Manage MVO</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span> New and Event</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('newsEvent.manage') }}"><span>Manage News & Event</span></a></li>
                        <li><a href="{{ route('newsEvent.create') }}"><span>create News & Event</span></a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span>Notice board</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage.notice') }}"><span>Manage Notice</span></a></li>
                        <li><a href="{{ route('create.notice') }}"><span>create Notice</span></a></li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span>Our Client</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage.client') }}"><span>Manage Client</span></a></li>
                        <li><a href="{{ route('create.client') }}"><span>create Client</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span>Happy Counter</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage.counter') }}"><span>Manage Counter</span></a></li>
                        <li><a href="{{ route('create.counter') }}"><span>Create Counter</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}" alt="icon">
                        <span>Beyond Academic</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage.academic') }}"><span>Manage Academic</span></a></li>
                        <li><a href="{{ route('create.academic') }}"><span>Create Academic</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}"
                            alt="icon">
                        <span>FAQ</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('manage.faq') }}"><span>Manage FAQ</span></a></li>
                        <li><a href="{{ route('create.faq') }}"><span> Create why school</span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}"
                            alt="icon">
                        <span>Message From</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('chairman.message') }}"><span>Chairman Message </span></a></li>
                        <li><a href="{{ route('principal.message') }}"><span>Principal Message </span></a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><img src="{{ asset('backend/assets/img/sidebar/icon-2.png') }}"
                            alt="icon">
                        <span>Team Member</span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                        <li><a href="{{ route('general.staff') }}"><span>Teacher and staff</span></a></li>
                        <li><a href="{{ route('management.staff') }}"><span>Management Team</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('youtube.video') }}"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}" alt="icon"> <span>Youtube
                            Videos</span></a>
                </li>
                <li>
                    <a href="{{ route('school.life') }}"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}" alt="icon"> <span>School
                            life</span></a>
                </li>
                <li>
                    <a href="{{ route('blog.view') }}"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}" alt="icon">
                        <span>Blogs</span></a>
                </li>
                <li>
                    <a href="{{ route('Almuni.view') }}"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}" alt="icon"> <span>Passout
                            student</span></a>
                </li>
                <li>
                    <a href="{{ route('download.view') }}"><img
                            src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}" alt="icon">
                        <span>Downloads</span></a>
                </li>
                <li>
                    <a href="{{ route('setting') }}"><img src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}"
                            alt="icon"> <span>Setting</span></a>
                </li>
                {{-- <li>
                    <a href="{{route('create.faq')}}">
                        <img src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}"
                            alt="icon">
                             <span>FAQ</span>
                    </a>
                </li> --}}
                {{-- <li>
                    <a href="calendar.html"><img src="{{ asset('backend/assets/img/sidebar/icon-6.png') }}"
                            alt="icon"> <span>Calendar</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
