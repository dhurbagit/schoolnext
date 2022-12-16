@extends('frontend.layout.master')
@section('content')

<main>
    <section id="aboutUS_section">
        <div class="top__header-wrappper" style="background-image: url({{asset('uploads/'.$menu_content->image )}}) !important;">
            <div class="overlay">
            </div>
            <section id="subheader-title">
                <div class="container">
                    <h1>{{$menu_content->page_title}}</h1>
                    {{-- @dd($mvo) --}}
                </div>
            </section>
        </div>

        <div class="informartion section-padding"
            style="background-image: url(assets/Images/bg.png); background-repeat: no-repeat; background-size: cover; background-position: center; background-attachment: fixed;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="aboutus__image wow fadeInUp" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="about__image-two">
                                <img src="{{asset('aboutus/'. $abouts->image)}}" alt="" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="aboutus__description wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; -webkit-animation-delay: 0.6s; -moz-animation-delay: 0.6s; animation-delay: 0.6s;">
                            <div class="top__small">
                                <span> {{$abouts->small_title }} </span>
                            </div>
                            <div class="top__big-text">
                                <h3>
                                    {{$abouts->main_title}}
                                </h3>
                            </div>
                            <div class="moto mb-3">
                                 {{$abouts->slogan}}
                            </div>


                            <div class="main__decription mb-5">
                               {!! $abouts->description!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vision__section section-padding">
                    <div class="container">

                        @foreach ($mvo_contents as $value)
                        <div class="mb-5 wow fadeInLeft" data-wow-delay="0.3s"
                            style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                            <div class="aboutus__title-holder">
                                <h3>{{$value->title}}</h3>
                            </div>
                            <div class="aboutus__text-holder">
                                {!! $value->description !!}
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
