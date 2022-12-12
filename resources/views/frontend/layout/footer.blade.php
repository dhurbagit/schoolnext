<footer id="footer">
    <div class="footer-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="footer__title">
                        <span>Brochure</span>
                    </div>
                    <div class="brochure mb-3">
                        <a href="https://lunahrsolutions.com/assets/frontend/images/Profile.pdf" target="_blank">
                            <img src="{{ asset('setting/' . $setting->footer_image) }}" width="100%" height="100%"
                                alt="QR Code">
                        </a>
                    </div>
                    <div align='left' class="ms-4"><a href='https://www.free-website-hit-counter.com'><img
                                src='https://www.free-website-hit-counter.com/c.php?d=7&id=139383&s=5' border='0'
                                alt='Website Hit Counter'></a><br /></div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title">
                        <span>Quick Links</span>
                    </div>
                    <div class="footer__links">
                        <ul>
                            @foreach ($fmenus as $footer_menu)
                                <li>
                                    <a
                                        @if ($footer_menu->category_slug == 'page') href="{{ $footer_menu->external_link ?? route('page', $footer_menu->title_slug) }}" @else
                                    href="{{ $footer_menu->external_link ?? route('category', $footer_menu->category_slug) }}" @endif>{{ ucfirst($footer_menu->name) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title">
                        <span>Feature Links</span>
                    </div>
                    <div class="footer__links">
                        <ul>
                            <li><a href="blog.html">Blogs</a></li>
                            <li><a href="alumni.html">Alumni</a></li>
                            <li><a href="download.html">Downloads</a></li>
                            <li><a href="https://allstarsms.com" target="_blank">Bulk SMS</a></li>
                            <li><a href="https://gmail.com" target="_blank">Web Mail</a></li>
                            <li><a href="routine.html">Routine</a></li>
                            <li><a href="login.html">Login</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="footer__title">
                        <span>Contact US</span>
                    </div>
                    <div class="slogan mb-2">
                        <i>"Lorem ipsum dolor sit, amet consectetur adipisicing elit."</i>
                    </div>
                    <div class="school-address">
                        <ul class="fa-ul ms-4">
                            <li><span class="fa-li"><i class="fa-solid fa-location-dot"></i></span><span>
                                    {{ $setting->address }}
                                </span></a>
                            </li>
                            <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                    {{ $setting->Phone_one }}
                                </span></li>
                            <li><span class="fa-li"><i class="fa-solid fa-phone"></i></span><span>
                                    {{ $setting->Phone_two }}
                                </span></li>
                            <li><span class="fa-li"><i class="fa-solid fa-envelope"></i></span><span>
                                    {{ $setting->email }}
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
                        <a href="{{$setting->facebook}}">
                            <i class="fa-brands fa-square-facebook"></i>
                        </a>
                        <a href="{{$setting->instagram}}">
                            <i class="fa-brands fa-square-instagram"></i>
                        </a>
                        <a href="{{$setting->linkin}}">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                        <a href="{{$setting->youtube}}">
                            <i class="fa-brands fa-square-youtube"></i>
                        </a>
                    </div>
                </div>
                <h6 class="m-0"><span>2022</span> © All rights reserved | Designed by <a
                        href="https://allstar.com.np/" target="_blank">All
                        Star
                        Technology</a></h6>
            </div>
        </div>
    </div>
</footer>
