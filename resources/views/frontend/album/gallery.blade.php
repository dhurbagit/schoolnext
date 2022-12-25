@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="photo__album-section">
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
                <div class="album__image-section">
                    <div class="row py-5">
                        @foreach ($gallery as $items)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                <a href="{{route('images',$items->slug)}}">
                                    <div class="album__item wow fadeInLeft" data-wow-delay="0.1s"
                                        style="visibility: visible; -webkit-animation-delay: 0.1s; -moz-animation-delay: 0.1s; animation-delay: 0.1s;">
                                        <div class="overlay">
                                        </div>
                                        <div class="album-img__holder">
                                            <img src="{{asset('uploads/'. $items->image)}}" width="100%" height="100%" alt="">
                                        </div>
                                        <div class="album__title text-center">
                                            <h5>{{$items->title}}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- pagination start  -->
                {{-- <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link funBtn" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                            <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link funBtn" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div> --}}
                <!-- pagination end -->
                <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
            </div>
        </section>
    </main>
@stop
