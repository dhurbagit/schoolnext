@extends('frontend.layout.master')
@section('pageTitle', 'News and Event')
@section('content')
    <main>

        <section id="new__event-section">
            <div class="top__header-wrappper"
                style="background-image: url({{ asset('uploads/' . $menu_content1->image) }}) !important;">
                <div class="overlay">
                </div>
                <section id="subheader-title">
                    <div class="container">
                        <h1>{{ $menu_content1->page_title }}</h1>
                        {{-- @dd($mvo) --}}
                    </div>
                </section>
            </div>
            <div class="news__items-container py-5">
                <div class="container">
                    <div class="event__wrapper">
                        <div class="row mb-4">

                            @foreach ($news_template as $value )

                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                    <a href="{{route('newsevent.link', $value->id)}}">
                                        <div class="event-item wow fadeInLeft" data-wow-delay="0.1s"
                                            style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                            <div class="event-image mb-2">
                                                <img src="{{asset('NewsEvent/'. $value->images)}}" width="100%" height="100%"
                                                    alt="">
                                            </div>
                                            <div class="date mb-2">
                                                <span>{{$value->date}}</span>
                                            </div>
                                            <div class="event-details">
                                                <h6>{{ strip_tags(Str::limit($value->description, 150)) }}</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                        <!-- pagination start  -->
                        <div class="d-flex justify-content-center">
                            {{$news_template->links()}}

                        </div>
                        <!-- pagination end -->
                    </div>
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>

@stop
