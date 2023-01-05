@extends('frontend.layout.master')
@section('pageTitle', 'School')
@section('content')
<main>
    <section id="facility-section">
        <div class="facility__main-image">
            @isset($menu_content)
            <img src="{{asset('uploads/'. $menu_content->image)}}" width="100%" height="100%" alt="">
            @endisset

        </div>
        <div class="container">
            <div class="facility__details">
                <div class="main__title text-center wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                    <h1><span class="facility">{{ucfirst($menu_content->page_title ?? '')}}</span></h1>
                </div>
                <div class="facility-text wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                    {!!  $menu_content->content ?? '' !!}
                </div>
            </div>
        </div>

        <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
    </section>
</main>

@stop
