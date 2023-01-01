<style>
    .footer-section .footer__links ul li a::after,
    .footer-section .footer__title::after {

    background-color: {{ $themeOption->primary_color ?? '' }};

}
.footer-section .school-address li span:hover,
.footer-section .school-address li span:hover,
.footer-section .school-address li i,
.copyright .content .social-icons a{
    color: {{ $themeOption->primary_color ?? '' }};
}
</style>
<footer id="footer">
    <div class="footer-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="footer__title" style="color: {{ $themeOption->primary_color ?? '' }} ">
                        <span>Brochure</span>
                    </div>
                    <div class="brochure mb-3">
                        <a href="https://lunahrsolutions.com/assets/frontend/images/Profile.pdf" target="_blank">
                            @if (!@empty($setting->footer_image))
                                <img src="{{ asset('setting/' . $setting->footer_image) }}" width="100%" height="100%"
                                    alt="QR Code">
                            @endif
                        </a>
                    </div>
                    <div align='left' class="ms-4"><a href='https://www.free-website-hit-counter.com'><img
                                src='https://www.free-website-hit-counter.com/c.php?d=7&id=139383&s=5' border='0'
                                alt='Website Hit Counter'></a><br /></div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title" style="color: {{ $themeOption->primary_color ?? '' }} ">
                        <span>Quick Links</span>
                    </div>
                    <div class="footer__links">
                        <ul>

                            @foreach ($fmenus as $footer_menu)
                                <li>
                                    <a
                                        @if ($footer_menu->category_slug == 'page' || $footer_menu->category_slug == 'layout page') href="{{ $footer_menu->external_link ?? route('page', $footer_menu->title_slug) }}" @else
                                    href="{{ $footer_menu->external_link ?? route('category', $footer_menu->category_slug) }}" @endif>{{ ucfirst($footer_menu->name) }}</a>
                                </li>
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
                                <li class="drop-list">
                                    <a @if ($mainMenu->category_slug == 'page' ||$mainMenu->category_slug == 'layout page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                 @else
                                  href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                        class="menu-item first-item droplink"> {{ $mainMenu->name }}</a>
                                </li>
                            @endforeach
                            <li><a href="https://allstarsms.com" target="_blank">Bulk SMS</a></li>
                            <li><a href="https://gmail.com" target="_blank">Web Mail</a></li>
                            <li><a href="login.html">Login</a></li>
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
                            <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span><span>
                                    {{ $setting->email ?? '' }}
                                </span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg__image">
            <img src="/frontend/assets/Images/footerbg.png" width="100%" height="100%" alt="">
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
