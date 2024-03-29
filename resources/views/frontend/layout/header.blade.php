<style>
    #form-section .form-card form .btn-reset,
    .btn-hoverable::after,
    #main-header .mega-menu .content h5::after {
        background-color: {{ $themeOption->secondary_color ?? '' }};
    }

    .cs_modal_cs a,
    #main__index-section .news-and-events__section .top__header h3,
    #main__index-section .testimonial .title__holder h1 span,
    .btn-hoverable span,
    #main-header .navbar .menu-items .drop-list .drop__menu ul li a:hover,
    #main-header .navbar .menu-item:hover,
    #main-header .mega-menu .content section ul li:hover a,
    #main-header .mega-menu .content section ul li span {
        color: {{ $themeOption->secondary_color ?? '' }};
    }

    .btn-hoverable {
        color: {{ $themeOption->secondary_color ?? '' }};
        box-shadow: {{ $themeOption->secondary_color ?? '' }} 0px 0px 0px 2px
    }

    #main-header .mega-menu .content .nav__outline {
        color: {{ $themeOption->secondary_color ?? '' }};
        border-color: {{ $themeOption->secondary_color ?? '' }};
    }

    .pagination .page-item .page-link:hover,
    .pagination .page-item.active .page-link,
    .btn-top,
    .btn-primary:hover {
        background-color: {{ $themeOption->primary_color ?? '' }} !important;
        border-color: {{ $themeOption->primary_color ?? '' }} !important;
    }

    .content1 a,
    .payment_header,
    #form-section .form-card form .btn-form,
    #form-section .form-card form .form-header,
    #download-section .download-wrapper .download__category ul a .category__links.active,
    #download-section .download-wrapper .download__category .title_holder,
    #alumni-section .alumni-wrapper .alumni__category ul a .category__links.active,
    #alumni-section .alumni-wrapper .alumni__category .title_holder,
    #new__event-section .news__items-container .event__wrapper .event-item::after,
    #aboutUS_section .informartion .aboutus__description .top__small::after,
    #aboutUS_section .informartion .aboutus__description .top__small::before,
    #Team-section .team_card::after,
    #Team-section .team_card .team_detail::after,
    #message-section .top__msg-container,
    .top__header-wrappper #subheader-title h1::before,
    .top__header-wrappper #subheader-title h1,
    #main__index-section .testimonial .testi__slider .swiper-button-next:hover,
    #main__index-section .testimonial .testi__slider .swiper-button-prev:hover {
        background-color: {{ $themeOption->primary_color ?? '' }} !important;
    }

    #blog-section .top__blog-section .left__heading h1 span,
    #form-section .form-card .school__details h2,
    #aboutUS_section .informartion .vision__section .aboutus__title-holder h3,
    #aboutUS_section .informartion .aboutus__description .top__small span,
    #Team-section .team--title h3,
    #message-section .management-team .swiper-slide .slider_name h4,
    #about__sub-section .faq__title h4,
    #school__life-section .school__life-container .school__desc h1 {
        color: {{ $themeOption->primary_color ?? '' }};
    }

    #Team-section .team_card:hover {
        border-color: {{ $themeOption->primary_color ?? '' }};
    }
</style>

<header>
    <div id="main-header">
        <div class="top_header" style="background-color: {{ $themeOption->primary_color ?? '' }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="left__side-header d-flex media_style">
                            <a href="#" class="me-4 " type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="phone__class d-flex align-items-center">
                                    <div class="icon__holder">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="inquiry">
                                        <p class="mb-0">For Inquiry</p>
                                    </div>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @if (!empty($setting->Phone_one))
                                    <li><a class="dropdown-item pt-0 text-dark" href="tel: 01234567"><i
                                                class="fa-solid fa-phone text-success"></i>
                                            {{ $setting->Phone_one }}</a>
                                    </li>
                                @endif
                                @if (!empty($setting->Phone_two))
                                    <li><a class="dropdown-item text-dark" href="tel: 01234567"><i
                                                class="fa-brands fa-whatsapp"></i> {{ $setting->Phone_two }}</a></li>
                                @endif
                                @if (!empty($setting->Phone_three))
                                    <li><a class="dropdown-item text-dark" href="viber://chat?number="><i
                                                class="fa-brands fa-viber"></i> {{ $setting->Phone_three }}</a></li>
                                @endif
                            </ul>
                            <a href="mailto: {{ $setting->email ?? '' }}">
                                <div class="phone__class d-flex align-items-center">
                                    <div class="icon__holder">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="inquiry">
                                        <p class="mb-0">{{ $setting->email ?? '' }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end media_style">
                            <div class="right__side-header">
                                <ul class="d-flex">
                                    @foreach ($top_ribbon as $mainMenu)
                                        @if ($mainMenu->publish_status == 1)
                                            <li class="drop-list">
                                                <a @if ($mainMenu->category_slug == 'page' || $mainMenu->category_slug == 'layout-page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                             @else
                                              href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                                    class="menu-item first-item droplink"> {{ Str::ucfirst($mainMenu->name) }}</a>
                                            </li>
                                        @endif
                                    @endforeach

                                    <li class="border-0"><a href="{{ route('inquiryForm.open') }}">Online Form</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar">
            <div class="container">
                <div class="logo-wrapper">
                    <a href="{{ url('/') }}">
                        <div class="logo">
                            <img @isset($setting)
                                src="{{ asset('setting/' . $setting->logo) }}"
                            @endisset
                                alt="" width="100%" height="100%">
                        </div>
                    </a>
                </div>
                <div class="menu-btn mt-3">
                    <div class="menu-btn__lines"></div>
                </div>
                <ul class="menu-items">
                    @foreach ($b_menus as $mainMenu)
                        @if ($mainMenu->publish_status == 1)
                            <li>
                                <a @if ($mainMenu->category_slug == 'page' || $mainMenu->category_slug == 'layout-page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                @else
                                 href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                    class="menu-item first-item expand-btn"> {{ $mainMenu->name }}</a>
                                <div class="container mega-menu sample">
                                    <div class="content py-0"
                                        style="background-image: url('{{ asset('uploads/' . $mainMenu->banner_image) }}'); background-repeat: no-repeat; background-size: contain; background-position: right;">
                                        <div class="overlay__nav py-3"
                                            style="background-image: url(/frontend/assets/Images/gradiant.png); background-position: right; background-repeat: no-repeat; background-size: contain;">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">
                                                    <h5 class="menu-title"
                                                        style="color:{{ $themeOption->secondary_color ?? '' }} !important">
                                                        {{ Str::ucfirst($mainMenu->name) }}</h5>
                                                    <section>
                                                        <ul class="fa-ul">
                                                            @if (count($mainMenu->children))
                                                                @foreach ($mainMenu->children as $child)
                                                                    <li><span class="fa-li"><i
                                                                                class="fa-solid fa-arrow-right-long"></i></span>
                                                                        <a
                                                                            @if ($child->category_slug == 'page' || $child->category_slug == 'layout-page') href="{{ $child->external_link ?? route('page', $child->title_slug) }}"
                                                                         @else
                                                                          href="{{ $child->external_link ?? route('category', $child->category_slug) }}" @endif><i
                                                                                class="sub__links"></i>
                                                                            {{ Str::ucfirst($child->name) }}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endif


                                                        </ul>
                                                    </section>
                                                </div>
                                                <div class="col-lg-4 col-md-12">
                                                    <section>
                                                        <h5 class="menu-title"
                                                            style="color:{{ $themeOption->secondary_color ?? '' }} !important;">
                                                            {{ $mainMenu->page_title }}</h5>
                                                        <div class="nav__text">
                                                            <p class="mb-0">
                                                                {!! $mainMenu->content !!}
                                                            </p>
                                                        </div>
                                                        @isset($mainMenu)
                                                            @if ($mainMenu->category_slug == 'layout-page' || $mainMenu->category_slug == 'page')
                                                                <a href="{{ route('page', $mainMenu->title_slug) }}"
                                                                    class="btn nav__outline">Learn More</a>
                                                            @else
                                                                <a href="{{ route('category', $mainMenu->category_slug) }}"
                                                                    class="btn nav__outline">Learn More</a>
                                                            @endif
                                                        @endisset

                                                    </section>
                                                </div>
                                                <div class="col-lg-4 col-md-0"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach


                    @foreach ($menus as $mainMenu)
                        @if ($mainMenu->publish_status == 1)
                            <li class="drop-list">
                                <a @if ($mainMenu->category_slug == 'page' || $mainMenu->category_slug == 'layout-page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                 @else
                                  href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                    class="menu-item first-item droplink"> {{ Str::ucfirst($mainMenu->name) }}</a>

                                @if (count($mainMenu->children))
                                    <div class="drop__menu">
                                        <ul>
                                            @foreach ($mainMenu->children as $child)
                                                <li><a
                                                        @if ($child->category_slug == 'page' || $child->category_slug == 'layout-page') href="{{ $child->external_link ?? route('page', $child->title_slug) }}"
                                                 @else
                                                  href="{{ $child->external_link ?? route('category', $child->category_slug) }}" @endif><i
                                                            class="fa-solid fa-arrow-right-long"></i>
                                                        {{Str::ucfirst( $child->name) }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endif

                            </li>
                        @endif
                    @endforeach
                    <li>
                        <a href=""
                            style="background-color: {{ $themeOption->secondary_color ?? '' }}; border-color:{{ $themeOption->secondary_color ?? '' }}"
                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">Make
                            an
                            Inquiry</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</header>
<!-- Modal -->
<div class="modal fade custom__modal customizer_class" id="form" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="text-center mb-4">
                    <h2 class="mb-0">Inquiry Form</h2>
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('frontend/assets/Images/line2.png') }}" width="240" height="100%"
                            alt="">
                    </div>
                </div>
                <form action="{{ route('inquiry_next.save') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm" class="form-label mb-0">Full Name</label>
                                <input type="text" name="student_name" value="{{ old('student_name') }}"
                                    class="form-control" id="textForm" placeholder="">
                                <span class="text-danger">
                                    @error('student_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm2" class="form-label mb-0">Email</label>
                                <input type="email" name="s_email" value="{{ old('s_email') }}"
                                    class="form-control" id="textForm2" placeholder="">
                                <span class="text-danger">
                                    @error('s_email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm3" class="form-label mb-0">Phone Number</label>
                                <input name="s_phone" type="text" value="{{ old('s_phone') }}"
                                    class="form-control" id="textForm3" placeholder="">
                                <span class="text-danger">
                                    @error('s_phone')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="textForm4" class="form-label mb-0">Address</label>
                                <input name="s_address" type="text" class="form-control" id="textForm4"
                                    value="{{ old('s_address') }}" placeholder="">
                                <span class="text-danger">
                                    @error('s_address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label for="exampleFormControlTextarea1" class="form-label mb-0">Write a
                                    message</label>
                                <textarea name="p_description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                                    {{ old('p_description') }}
                                </textarea>
                                <span class="text-danger">
                                    @error('p_description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-6">

                            <div class="d-flex">
                                <div class="g-recaptcha" data-sitekey={{ $setting->site_key ?? '' }}>
                                </div>
                                <br>
                                @if (Session::has('g-recaptcha-response'))
                                    <span class="text-danger">{{ Session::get('g-recaptcha-response') }}</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
