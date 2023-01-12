@extends('frontend.layout.master')
@section('pageTitle', 'Home')
@section('content')
    <style>
        #main__index-section .news-and-events__section .right-notice .card ul li::after,
        #main__index-section .news-and-events__section .right-notice .card #style-7::-webkit-scrollbar-thumb,
        #main__index-section .news-and-events__section .event__wrapper .event-item::after,
        #main__index-section .informartion .aboutus__description .top__small::after,
        #main__index-section .informartion .aboutus__description .top__small::before {
            background-color: {{ $themeOption->primary_color ?? '' }}
        }
    </style>
    @foreach ($popUp as $key => $data)
        <!--Admission Open Modal -->
        <div class="modal fade custom__modal" id="windowModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">

                <div class="modal-content">
                    @if (!empty($data->modal_title))
                        <div class="modal-header justify-content-center">
                            <h5 class="modal-title">{{ $data->modal_title }}</h5>
                        </div>
                    @endif
                    <div class="modal-body p-1">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        @if (!empty($data->image))
                            <a href="{{isset($data->link)? $data->link : 'javascript:void(0)'}}">
                                <img src="{{ asset('uploads/' . $data->image) }}" width="100%" height="100%" alt="No Image">
                            </a>
                        @endisset
                </div>
                @if (!empty($data->file))
                    <div class="modal-footer cs_modal_cs">
                        <a target="_blank" href="{{ asset('uploads/' . $data->file) }}">Download</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--Admission Open Modal end -->
@endforeach


<div class="modal fade custom__modal" id="form" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                <div class="text-center mb-4">
                    <h2 class="mb-0">Inquiry Form</h2>
                    <div class="d-flex justify-content-center">
                        <img src="/frontend/assets/Images/line2.png" width="240" height="100%" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="textForm" class="form-label mb-0">Full Name</label>
                            <input type="text" class="form-control" id="textForm" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="textForm2" class="form-label mb-0">Email</label>
                            <input type="email" class="form-control" id="textForm2" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="textForm3" class="form-label mb-0">Phone Number</label>
                            <input type="text" class="form-control" id="textForm3" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label for="textForm4" class="form-label mb-0">Address</label>
                            <input type="text" class="form-control" id="textForm4" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label mb-0">Write a message</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">Send Message</button>
                </div>
            </div>
        </div>
    </div>
</div>
<main>
    <section id="main__index-section">


        {{-- slider section  --}}
        <div class="slider-wrapper">
            @if (isset($banner_video->type) ? 10 : 0)

                <div class="video__holder">
                    <video autoplay="" muted="" loop="" width="100%">
                        <source src="{{ asset('uploads/video/' . $banner_video->video) }}" type="video/mp4">
                    </video>
                </div>
            @else
                <div class="main__slider">
                    <div class="swiper swiper-container" data-slider-wrap="data-slider-wrap">
                        <div class="wrap" data-slider-wrap="data-slider-wrap">
                            <div class="slider" data-slider="data-slider">
                                @foreach ($slider as $slideshow)
                                    <div class="slide">
                                        <div class="slide__inner"
                                            style="background-image: url('{{ asset('slider/' . $slideshow->image) }}') !important; background-position: center; background-size: cover; background-repeat: no-repeat;">
                                            <div class="slide__text-wrap">
                                                <div class="slide__text"
                                                    data-typed="{{ $slideshow->slider_caption }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        {{-- end slider section  --}}
        <div class="partner-wrapper">
            <div class="container">
                <div class="white-box d-flex justify-content-center align-items-center">
                    @foreach ($client as $image)
                        <div class="image-holder wow fadeInLeft" data-wow-delay="0.1s"
                            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                            <a href="{{ $image->link }}">
                                <img src="{{ asset('client/' . $image->image) }}" width="100%" height="100%"
                                    alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="user__section">
            <div class="container">
                <div class="college__message d-flex justify-content-center">
                    <div class="moto__top wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                        @if (!empty($setting_happy->after_banner_title))
                            <p>{{ $setting_happy->after_banner_title }}</p>
                        @endif
                    </div>
                </div>
                <div class="members__section wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                    <div class="flex__wrapper d-flex justify-content-center">
                        @foreach ($happy_counter as $counter)
                            <div class="number__wrapper numbers">
                                <div class="top__header-holder {{ $loop->iteration == 3 ? '' : 'border__right' }} "
                                    style="border-color: {{ $themeOption->primary_color ?? '' }}">
                                    <h4 style="color: {{ $themeOption->primary_color ?? '' }}">{{ $counter->title }}
                                    </h4>
                                </div>
                                <div class="bottom__number-holder">
                                    <h1 style="color: {{ $themeOption->primary_color ?? '' }}">
                                        <span>{{ $counter->counter_number }}</span>+
                                    </h1>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="informartion section-padding"
            style="background-image: url(/frontend/assets/Images/bg.png); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="aboutus__image wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="about__image-two">
                                @if (!empty($about_us->image))
                                    <img src="{{ asset('aboutus/' . $about_us->image) }}" alt=""
                                        width="100%" height="100%">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="aboutus__description wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; -webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                            <div class="top__small">
                                <span
                                    style="color:{{ $themeOption->primary_color ?? '' }}">{{ $about_us->small_title ?? '' }}
                                </span>
                            </div>
                            <div class="top__big-text">
                                <h3>
                                    <span class="typing"></span>
                                </h3>
                            </div>
                            <div class="moto mb-3">
                                {{ $about_us->slogan ?? '' }}
                            </div>
                            <div class="main__decription mb-5">
                                @if (!empty($about_us->description))
                                    {!! Str::limit($about_us->description, 600, '') !!}
                                @endif
                            </div>
                            <a href="{{ url('category/about') }}" class="btn btn-hoverable">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="news-and-events__section section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="top__header d-flex justify-content-between flex-wrap mb-4">
                            @if (!empty($setting_happy->news_and_event_title))
                                <h3>{{ $setting_happy->news_and_event_title }}</h3>
                            @endif
                            <a href="{{ url('category/news-events') }}"
                                style="border-color:{{ $themeOption->primary_color ?? '' }}">All Events <i
                                    class="fa-solid fa-arrow-right"></i></a>
                        </div>
                        <div class="event__wrapper">
                            <div class="row">
                                @foreach ($newsevent as $event)
                                    <div class="col-md-4 mb-3">
                                        <a href="{{ route('newsevent.link', $event->id) }}">
                                            <div class="event-item  wow fadeInLeft" data-wow-delay="0.1s"
                                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                                <div class="event-image mb-2">
                                                    <img src="{{ asset('NewsEvent/' . $event->images) }}"
                                                        width="100%" height="100%" alt="">
                                                </div>
                                                <div class="date mb-2">
                                                    <span>{{ $event->date }}</span>
                                                </div>
                                                <div class="event-details">
                                                    <h6>{{ $event->title }}</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="right-notice  wow fadeInUp" data-wow-delay="0.1s"
                            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                            <div class="card">
                                <div class="card-body">
                                    @if (!empty($setting_happy->notice_board_title))
                                        <h5>{{ $setting_happy->notice_board_title }}</h5>
                                    @endif
                                    <hr>
                                    <ul id="style-7">
                                        @foreach ($newsevent as $data)
                                            <li>
                                                <a href="{{ route('newsevent.link', $data->id) }}">
                                                    <!-- <i class="fa-solid fa-circle-dot"></i> -->
                                                    <p>{{ strip_tags(Str::limit($data->description, 160, '...')) }}</p>
                                                    <span><i
                                                            class="fa-solid fa-calendar-days"></i>&nbsp;{{ $data->date }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial">
            <div class="elementor-shape-top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill"
                        d="M0,0c0,0,0,6,0,6.7c0,18,240.2,93.6,615.2,92.6C989.8,98.5,1000,25,1000,6.7c0-0.7,0-6.7,0-6.7H0z">
                    </path>
                </svg>
            </div>
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="image__wrapper">
                            <div class="image__one wow fadeInUp" data-wow-delay="0.1s"
                                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                @if (!empty($setting_happy->testimonial_first_image))
                                    <img src="{{ asset('setting/' . $setting_happy->testimonial_first_image) }}"
                                        alt="No Image" width="100%" height="100%">
                                @endif

                            </div>
                            <div class="image__two wow fadeInUp" data-wow-delay="0.3s"
                                style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                @if (!empty($setting_happy->testimonial_second_image))
                                    <img src="{{ asset('setting/' . $setting_happy->testimonial_second_image) }}"
                                        alt="No Image" width="100%" height="100%">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="title__holder ps-5 wow fadeInLeft" data-wow-delay="0.1s"
                            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                            @if (!empty($setting_happy->Testimonial_title))
                                <h1>{{ Str::words($setting_happy->Testimonial_title, 3, '') }} <span
                                        class="typing2"></span></h1>
                            @endif
                            @if (!empty($setting_happy->Testimonial_title))
                                <h1 id="slice_text">
                                    <?php
                                    $str = $setting_happy->Testimonial_title;
                                    $cutof = Str::words($setting_happy->Testimonial_title, 3, '');
                                    // Or we can write ltrim($str, $str[0]);
                                    $str = ltrim($str, $cutof);
                                    echo $str;
                                    ?>
                                </h1>
                            @endif
                        </div>
                        <div class="testi__slider px-5 wow fadeInDown" data-wow-delay="0.1s"
                            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                            <div class="col-xl-9 col-lg-12">
                                <div class="swiper testi">
                                    <div class="swiper-wrapper">
                                        @foreach ($testimonial as $test)
                                            <div class="swiper-slide">
                                                <div class="mb-4">
                                                    {!! Str::limit($test->description, 220, '...') !!}
                                                </div>
                                                <div class="user__wrapper">
                                                    <div class="d-flex align-items-center">
                                                        <div class="img">
                                                            <img src="{{ asset('testimonial/' . $test->images) }}"
                                                                alt="" width="100%" height="100%">
                                                        </div>
                                                        <div class="name">
                                                            <p>{{ $test->title }}</p>
                                                            <span>{{ $test->designation }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"><i class="fa-solid fa-arrow-right"></i></div>
                                    <div class="swiper-button-prev"><i class="fa-solid fa-arrow-left"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="elementor-shape-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                    <path class="elementor-shape-fill"
                        d="M615.2,96.7C240.2,97.8,0,18.9,0,0v100h1000V0C1000,19.2,989.8,96,615.2,96.7z"></path>
                </svg>
            </div>
        </div>
        <div class="gallery-section section-padding mb-3">
            <div class="container-fluid">
                <div class="top__header text-center mb-5 wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                    <h3><a href="photo-album.html"
                            style="color:{{ $themeOption->primary_color ?? '' }}">{{ $setting_happy->gallery_title }}</a>
                    </h3>
                    <!-- <a href="News-event.html">All Blogs <i class="fa-solid fa-arrow-right"></i></a> -->
                    <div class="bg__line">
                        <img src="/frontend/assets/Images/line.png" alt="">
                    </div>
                </div>
                <div class="gg-box wow fadeInUp" data-wow-delay="0.2s"
                    style="visibility: visible; -webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s;">
                    @if (!empty($galleries))
                        @foreach ($galleries as $gallery)
                            <div class="gg-element">
                                <a class="example-image-link" href="{{ asset('uploads/' . $gallery->image) }}"
                                    data-lightbox="example-set">
                                    <img src="{{ asset('uploads/' . $gallery->image) }}">
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
    </section>
</main>


@stop
@push('scripts')
<script type="text/javascript">
    $(window).on('load', function() {
        for(let increment = 1; increment <= "{{$popUp->count()}}"; increment++){
            $('#windowModal'+ increment).modal('show');
        }
    });

</script>
@endpush
