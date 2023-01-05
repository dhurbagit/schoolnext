@extends('frontend.layout.master')
@section('pageTitle', 'Blogs')
@section('content')

    <main>
        <section id="blog-section">
            <div class="container">
                <div class="top__blog-section">
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="left__heading pt-5">
                                <h1>{{$blogs_page->page_title}}</h1>
                                <h1><span class="left-header"></span></h1>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right__heading pt-5 px-5">
                                <p>
                                    {{strip_tags($blogs_page->page_description)}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog__items-container section-padding">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            @foreach ($blogs_collection as $key => $details)
                                @if ($key === 0)
                                    <div class="main__blog">
                                        <a href="{{route('blog.single', $details->id)}}">
                                            <div class="main__blog-img mb-3">
                                                <img src="{{ asset('uploads/' . $details->image) }}" width="100%"
                                                    height="100%" alt="">
                                                <div class="overlay"></div>
                                                <div class="date">
                                                    <h5>{{Carbon\Carbon::parse($details->date)->format('d')}}</h5>
                                                    <h6>{{Carbon\Carbon::parse($details->date)->format('M')}}</h6>
                                                </div>
                                            </div>
                                            <div class="main__blog-details">
                                                <h6 class="mb-2">{{ $details->title }}</h6>
                                                <small>{{ $details->designation }}</small>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 mb-3">
                            <div class="side__blog-items">
                                <div class="blog__item">
                                    <div class="row">

                                        @foreach ($blogs_collection as $key => $details)
                                            @if ($key != 0)
                                            <div class="col-md-6 mb-3">
                                                <a href="{{route('blog.single', $details->id)}}">
                                                    <div class="blog_image mb-3">
                                                        <img src="{{ asset('uploads/' . $details->image) }}" width="100%"
                                                            height="100%" alt="">
                                                        <div class="overflow"></div>
                                                        <div class="date">
                                                            <h5>{{Carbon\Carbon::parse($details->date)->format('d')}}</h5>
                                                            <h6>{{Carbon\Carbon::parse($details->date)->format('M')}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="blog_details">
                                                        <h6>{{ $details->title }}</h6>
                                                        <small>{{ $details->designation }}</small>
                                                    </div>
                                                </a>
                                            </div>
                                            @endif
                                        @endforeach

                                        <div class="col-lg-12">
                                            {{$blogs_collection->links()}}
                                        </div>

                                    </div>
                                </div>
                            </div>
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
        var typed = new Typed(".left-header", {
            strings: ["Knowledge", "Updates", "Ideas"],
            typeSpeed: 100,
            startDelay: 0,
            backSpeed: 60,
            backDelay: 2000,
            loop: true,
            cursorChar: "|",
            contentType: "html",
        });
    </script>
@endpush
