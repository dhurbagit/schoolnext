@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="message-section">
            <div class="top__msg-container">
                <div class="container">
                    <div class="row align-items-center customRow">
                        <div class="col-md-6">
                            <div class="message__desc text-center">
                                <div class="msg_from">
                                    <h2>{{ $chairman_msg->message_title ?? '' }}</h2>
                                </div>
                                <div class="line d-flex justify-content-center">
                                    <img src="{{ asset('frontend/assets/Images/line2.png') }}" width="350" height="100%"
                                        alt="">
                                </div>
                                <div class="msg_name">
                                    <h5>{{ $chairman_msg->name ?? '' }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-center">
                            @isset($chairman_msg)
                                <div class="message__image">
                                    <img src="{{ asset('uploads/' . $chairman_msg->image) }}" width="100%" height="100%"
                                        alt="">
                                </div>
                            @else
                                <div class="message__image">
                                    <img src="{{asset('frontend/man-156584__340.webp')}}" width="100%" height="100%" alt="">
                                </div>
                            @endisset

                        </div>
                    </div>
                </div>
            </div>
            <div class="message_wrapper">
                <div class="container">
                    <div class="msg">
                        {!! $chairman_msg->description ?? '' !!}
                    </div>
                </div>
            </div>
            <div class="management-team mb-5">
                <div class="container">
                    <div class="top--title text-center mb-4">
                        <a href="management.html">
                            <h3>Management Teams</h3>
                        </a>
                    </div>
                    <div class="swiper managementTeam">
                        <div class="swiper-wrapper">

                            @foreach ($management_staff as $staff)
                                <div class="swiper-slide">

                                    <div class="slide_img">
                                        <img src="{{ asset('uploads/' . $staff->image) }}" alt="">
                                    </div>
                                    <div class="slider_name">
                                        <h4>{{ $staff->title }}</h4>
                                        <h6>{{ $staff->designation }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
@push('scripts')
    <script>
        var swiper = new Swiper(".managementTeam", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                },
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 30,
                },
            },
        });
    </script>
@endpush
