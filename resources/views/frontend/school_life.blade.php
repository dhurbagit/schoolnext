@extends('frontend.layout.master')
@section('pageTitle', 'School Life')
@section('content')

    <main>
        <section id="school__life-section">
            <div class="top__header-wrappper" style="background-image:url('{{ asset('uploads/' . $menu_content->image) }}')">
                <div class="overlay">
                </div>
                <section id="subheader-title">
                    <div class="container">
                        <h1>{{ ucfirst($menu_content->page_title ?? '') }}</h1>
                    </div>
                </section>
            </div>
            <div class="container">
                @foreach ($Content as $records)
                    <div class="school__life-container ">
                        <div class="row align-items-center mb-5">
                            <div class="col-md-5">
                                <div class="flex__images row">
                                    @foreach ($records->c_images as $key => $data)
                                        <div class="col-6">
                                            @if ($key % 2 == 1)
                                            <div class="white-space"></div>
                                            @endif
                                            <div class="small__image">
                                                <img src="{{asset('uploads/'. $data->image)}}" width="100%" height="100%"
                                                    alt="">
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="school__desc">
                                    <h1>{{ $records->title ?? '' }}</h1>
                                    {{ strip_tags($records->description ?? '') }}
                                </div>
                            </div>
                        </div>
                        <div class="bottom__text">
                            {{ strip_tags($records->description_one ?? '') }}
                        </div>
                        <div class="bottom-img">
                            <img @isset($records)
                                src="{{ asset('uploads/' . $records->featured_image) }}"
                            @endisset
                                width="100%" height="100%" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
