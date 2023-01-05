@extends('frontend.layout.master')
@section('pageTitle', 'School')
@section('content')
<main>
    <section id="academic_section">
        <div class="top__header-wrappper" style="background-image:url('{{asset('uploads/'. $menu_content->image)}}')">
            <div class="overlay">
            </div>
            <section id="subheader-title">
                <div class="container">
                    <h1>{{ucfirst($menu_content->page_title ?? '')}}</h1>
                </div>
            </section>
        </div>
        <div class="container">
            <div class="section-margin">
                <div class="white-box">
                    {!!  $menu_content->content ?? '' !!}
                </div>
            </div>
        </div>
        <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
    </section>
</main>
@stop
