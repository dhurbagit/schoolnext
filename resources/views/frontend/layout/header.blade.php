<header>
    <div id="main-header">
        <div class="top_header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="left__side-header d-flex">
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
                                                class="fa-brands fa-viber"></i> {{ $setting->Phone_two }}</a></li>
                                @endif
                                @if (!empty($setting->Phone_three))
                                    <li><a class="dropdown-item text-dark" href="tel: 01234567"><i
                                                class="fa-brands fa-whatsapp"></i> {{ $setting->Phone_three }}</a></li>
                                @endif
                            </ul>
                            <a href="mailto: info@saim.edu.np">
                                <div class="phone__class d-flex align-items-center">
                                    <div class="icon__holder">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="inquiry">
                                        <p class="mb-0">{{ $setting->email }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <div class="right__side-header">
                                <ul class="d-flex">
                                    <!-- <li><a href="https://nepaledufair.com/storage/tours/saim-college/index.htm"
                                            target="_blank"> Virtual Tour</a></li> -->
                                    <li><a href="alumni.html">Almuni</a></li>
                                    <li><a href="News-event.html"> News <span class="unique__font">&</span>
                                            Events</a></li>
                                    <li><a href="download.html"> Downloads</a></li>
                                    <li class="border-0"><a href="Online-form.html">Online Form</a></li>
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
                            <img src="/frontend/assets/Images/logo2.png" alt="" width="100%" height="100%">
                        </div>
                    </a>
                </div>
                <div class="menu-btn mt-3">
                    <div class="menu-btn__lines"></div>
                </div>
                <ul class="menu-items">
                    @foreach ($b_menus as $mainMenu)
                        <li>
                            <a @if ($mainMenu->category_slug == 'page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                @else
                                 href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                class="menu-item first-item expand-btn"> {{ $mainMenu->name }}</a>
                            <div class="container mega-menu sample">
                                <div class="content py-0"
                                    style="background-image: url(/frontend/assets/Images/image\ 36.png); background-repeat: no-repeat; background-size: contain; background-position: right;">
                                    <div class="overlay__nav py-3"
                                        style="background-image: url(/frontend/assets/Images/gradiant.png); background-position: right; background-repeat: no-repeat; background-size: contain;">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-12">
                                                <h5 class="menu-title"> {{ $mainMenu->name }}</h5>
                                                <section>
                                                    <ul class="fa-ul">
                                                        @if (count($mainMenu->children))
                                                            @foreach ($mainMenu->children as $child)
                                                                <li><span class="fa-li"><i
                                                                            class="fa-solid fa-arrow-right-long"></i></span>
                                                                    <a
                                                                        @if ($child->category_slug == 'page') href="{{ $child->external_link ?? route('page', $child->title_slug) }}"
                                                                         @else
                                                                          href="{{ $child->external_link ?? route('category', $child->category_slug) }}" @endif><i
                                                                            class="sub__links"></i>
                                                                        {{ $child->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        @endif


                                                    </ul>
                                                </section>
                                            </div>
                                            <div class="col-lg-4 col-md-12">
                                                <section>
                                                    <h5 class="menu-title">Introduction</h5>
                                                    <div class="nav__text">
                                                        <p class="mb-0">
                                                            {!! $mainMenu->content !!}
                                                        </p>
                                                    </div>
                                                    <a href="about-us.html" class="btn nav__outline">Learn More</a>
                                                </section>
                                            </div>
                                            <div class="col-lg-4 col-md-0"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach

                 
                    @foreach ($menus as $mainMenu)
                        <li class="drop-list">
                            <a @if ($mainMenu->category_slug == 'page') href="{{ $mainMenu->external_link ?? route('page', $mainMenu->title_slug) }}"
                                 @else
                                  href="{{ $mainMenu->external_link ?? route('category', $mainMenu->category_slug) }}" @endif
                                class="menu-item first-item droplink"> {{ $mainMenu->name }}</a>

                            @if (count($mainMenu->children))
                                <div class="drop__menu">
                                    <ul>
                                        @foreach ($mainMenu->children as $child)
                                            <li><a
                                                    @if ($child->category_slug == 'page') href="{{ $child->external_link ?? route('page', $child->title_slug) }}"
                                                 @else
                                                  href="{{ $child->external_link ?? route('category', $child->category_slug) }}" @endif><i
                                                        class="fa-solid fa-arrow-right-long"></i>
                                                    {{ $child->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif

                        </li>
                    @endforeach
                    <li>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">Make
                            an
                            Inquiry</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
</header>
