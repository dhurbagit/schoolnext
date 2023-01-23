<style>
    @if (($themeOption->option ?? '') == 1).footer-section {
        background-color: {{ $themeOption->footer_color }}
    }

@else .footer-section {
        background-color: none;
    }

    @endif.footer-section .footer__links ul li a::after,
    .footer-section .footer__title::after {
        background-color: {{ $themeOption->primary_color ?? '' }};
    }

    .copyright .content a:hover,
    .footer-section .footer__links ul li a:hover,
    .footer-section .school-address li span:hover,
    .footer-section .school-address li span:hover,
    .footer-section .school-address li i,
    .copyright .content .social-icons a {
        color: {{ $themeOption->primary_color ?? '' }};
    }

    .copyright {
        background-color: {{ $themeOption->copyright_color ?? '' }};
    }
</style>
{{-- vacancy modal --}}
<div class="modal fade custom__modal" id="windowModal_vacancy" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">

        <div class="modal-content">

            <div class="modal-body p-1">
                <div class="vacancy_wrapper" style='background-color:{{vacancy_layout()->bg_color}}'>
                    <h4>{{vacancy_layout()->title}}</h4>
                    <form action="{{route('vacancy.save')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="file">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Upload</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<footer id="footer">
    <div class="footer-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="footer__title" style="color: {{ $themeOption->primary_color ?? '' }} ">
                        <span>Brochure</span>
                    </div>
                    <div class="brochure mb-3" style="z-index: 99; position: relative;">
                        <a href="{{ asset('setting/' . $setting->f_brochure_file) }}" target="_blank">
                            @if (!@empty($setting->footer_image))
                                <img src="{{ asset('setting/' . $setting->footer_image) }}" width="100%"
                                    height="100%" alt="QR Code">
                            @endif
                        </a>
                    </div>
                    <div class="site_counter">{{ str_pad($setting->view_counter + 1, 7, 0, STR_PAD_LEFT) }}</div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title" style="color: {{ $themeOption->primary_color ?? '' }} ">
                        <span>Quick Links</span>
                    </div>
                    <div class="footer__links">
                        <ul>

                            @foreach ($fmenus as $footer_menu)
                                @if ($footer_menu->publish_status == 1)
                                    <li>
                                        <a
                                            @if ($footer_menu->category_slug == 'page' || $footer_menu->category_slug == 'layout page') href="{{ $footer_menu->external_link ?? route('page', $footer_menu->title_slug) }}" @else
                                    href="{{ $footer_menu->external_link ?? route('category', $footer_menu->category_slug) }}" @endif>{{ ucfirst($footer_menu->name) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title" style="color: {{ $themeOption->primary_color ?? '' }} ">
                        <span>Feature Links</span>
                    </div>
                    <div class="footer__links">
                        <ul>
                            @foreach ($feature_link as $mainMenu)
                                @if ($mainMenu->publish_status == 1)
                                    <li class="drop-list">
                                        <a @if ($mainMenu->category_slug == 'page' || $mainMenu->category_slug == 'layout page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                 @else
                                  href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                            class="menu-item first-item droplink"> {{ $mainMenu->name }}</a>
                                    </li>
                                @endif
                            @endforeach
                            <li><a href="https://allstarsms.com" target="_blank">Bulk SMS</a></li>

                            @if (Session()->has('loginId'))
                                <li><a target="_blank" href="{{ url('/admin/dashboard') }}">Login</a></li>
                            @else
                                <li><a target="_blank" href="{{ url('/admin') }}">Login</a></li>
                            @endif
                            <li><a data-bs-toggle="modal" data-bs-target="#windowModal_vacancy" href="">Vacancy</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title" style="color: {{ $themeOption->primary_color ?? '' }} ">
                        <span>Contact US</span>
                    </div>
                    <div class="slogan mb-2">
                        <i>{!! $setting->message ?? '' !!}</i>
                    </div>
                    <div class="school-address">
                        <ul class="fa-ul ms-4">
                            <li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span><span>
                                    {{ $setting->address ?? '' }}
                                </span></a>
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                    {{ $setting->Phone_one ?? '' }}
                                </span></li>
                            <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                    {{ $setting->Phone_two ?? '' }}
                                </span></li>
                            <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                    {{ $setting->phone_four ?? '' }}
                                </span></li>
                            <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span><span>
                                    {{ $setting->email ?? '' }}
                                </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg__image">
            @if (!empty(shareme()->footer_bg_image))
                <img src="{{ asset('uploads/' . shareme()->footer_bg_image) }}" width="100%" height="100%"
                    alt="">
            @endif
        </div>
    </div>
    <div class="copyright text-center py-2">
        <div class="container">
            <div class="content">
                <div class="social-icons">
                    <div class="d-flex justify-content-center">
                        <a href="{{ $setting->facebook ?? '' }}" {{ $setting->facebook ?? 'hidden' }}>
                            <i class="fa-brands fa-square-facebook"></i>
                        </a>
                        <a href="{{ $setting->instagram ?? '' }}" {{ $setting->instagram ?? 'hidden' }}>
                            <i class="fa-brands fa-square-instagram"></i>
                        </a>
                        <a href="{{ $setting->linkin ?? '' }}" {{ $setting->linkin ?? 'hidden' }}>
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="{{ $setting->youtube ?? '' }}" {{ $setting->youtube ?? 'hidden' }}>
                            <i class="fa-brands fa-square-youtube"></i>
                        </a>
                        <a href="{{ $setting->Twitter ?? '' }}" {{ $setting->Twitter ?? 'hidden' }}>
                            <i class="fa-brands fa-square-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $setting->pinterest ?? '' }}" {{ $setting->pinterest ?? 'hidden' }}>
                            <i class="fa-brands fa-square-pinterest" aria-hidden="true"></i>
                        </a>
                        <a href="{{ $setting->tumblr ?? '' }}" {{ $setting->tumblr ?? 'hidden' }}>
                            <i class="fa-brands fa-square-tumblr" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <h6 class="m-0"><span>2022</span> © All rights reserved | Designed by <a
                        href="{{ $setting->powered_by_link ?? '' }}" target="_blank">
                        {{ $setting->powered_by ?? '' }}</a></h6>
            </div>
        </div>
    </div>
</footer>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>
