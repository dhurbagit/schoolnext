@extends('frontend.layout.master')
@section('pageTitle', 'Gallery')
@section('content')
    <main>
        <section id="photo__gallery-section">
            <div class="top__header-wrappper"
                style="background-image: url({{ asset('uploads/' . $menu->image) }}) !important;">
                <div class="overlay">
                </div>
                <section id="subheader-title">
                    <div class="container">
                        <h1>{{ $menu->page_title }}</h1>
                        {{-- @dd($mvo) --}}
                    </div>
                </section>
            </div>
            <div class="container">
                <div class="photo__gallery py-5">
                    <div class="row">
                        @foreach ($album_gallery->images as $view_file)

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <div class="gallery__image wow fadeInLeft" data-wow-delay="0.1s"
                                    style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                    <a class="example-image-link"
                                        href="{{asset('uploads/'. $view_file->image)}}"
                                        data-lightbox="example-set">
                                        <img src="{{asset('uploads/'. $view_file->image)}}"
                                            width="100%" height="100%">
                                    </a>
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
