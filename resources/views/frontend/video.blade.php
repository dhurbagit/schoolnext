@extends('frontend.layout.master')
@section('pageTitle', 'Video')
@section('content')
    <main>
        <section id="video__album-section">
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


            <div class="container">
                <div class="video__container">
                    <div class="row py-5">
                        @foreach ($video as $videos)
                            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 mb-3">
                                <div class="video-item">
                                    <iframe width="100%" height="250" src="{{$videos->video}}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>



                                    <div class="video__title text-center">
                                        <h6>{{ $videos->title }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>

@stop
