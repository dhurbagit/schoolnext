@extends('frontend.layout.master')
@section('pageTitle', 'News and Event')
@section('content')
    <main>


        <section id="new__event-section">
            <div class="top__header-wrappper"
                style="background-image: url({{ asset('uploads/' . $menu_content->image) }}) !important;">
                <div class="overlay">
                </div>
                <section id="subheader-title">
                    <div class="container">
                        <h1>{{ $menu_content->name }}</h1>
                        {{-- @dd($mvo) --}}
                    </div>
                </section>
            </div>
            <div class="news__detail-container py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 mb-3">

                            <div class="new__event-details">
                                <div class="news__event-image">
                                    <img src="{{ asset('NewsEvent/' . $single_news->images) }}" width="100%"
                                        height="100%" alt="">
                                </div>
                                <div class="news__event-details py-3">
                                    <div class="date">
                                        <span>{{ $single_news->date }}</span>
                                        <h4>{{ $single_news->title }}</h4>
                                        <div class="news__text">
                                            {!! $single_news->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 mb-3">
                            <div class="event__list">
                                <div class="event_title">
                                    <h4>Latest Events</h4>
                                </div>
                                <ul>
                                    @foreach ($latest_events as $key => $value)
                                        <li class="p-2">
                                            <a href="{{route('newsevent.link', $value->id)}}">
                                                <div class="row align-items-center">
                                                    <div class="col-4">
                                                        <div class="listed__image">
                                                            <img src="{{asset('NewsEvent/'. $value->images)}}" width="100%" height="100%"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="list__name">
                                                            <h6 class="mb-0">
                                                                {{ strip_tags(Str::limit($value->description, 150, '...'))}}
                                                            </h6>
                                                            <span>{{ $value->date}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
