@extends('frontend.layout.master')
@section('pageTitle', 'Blogs')
@section('content')
<main>
    <section id="blog__details-section">
        <div class="main__blog-image">
            <img src="{{asset('uploads/'. $single_detail->image)}}" width="100%" height="100%" alt="">
        </div>
        <div class="container">
            <div class="main__blog-details">
                <div class="main__blog-title text-center">
                    <h1>{{$single_detail->title}}</h1>
                    <div class="blog__date text-center">
                        <span>{{Carbon\Carbon::parse($single_detail->date)->format('d/M/y')}}</span>
                    </div>
                </div>
                <div class="main__blog-text">
                    <p>{{strip_tags($single_detail->inner_description)}}</p>
                </div>
            </div>
        </div>

        <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
    </section>
</main>

@stop
