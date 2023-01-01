@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="about__sub-section">
            <div class="top__header-wrappper"
                style="background-image: url({{ asset('uploads/' . $menu_content->image) }}) !important;">
                <div class="overlay">
                </div>
                <section id="subheader-title">
                    <div class="container">
                        <h1>{{ ucfirst($menu_content->page_title) }}</h1>
                        {{-- @dd($mvo) --}}
                    </div>
                </section>
            </div>
            <div class="container">
                <div class="row mt-5 mb-5">
                    <div class="col-lg-9 col-md-12">
                        <div class="why__us-details mb-5">
                            <h5>{{ $whyschool->title ?? '' }}</h5>
                            {{ strip_tags($whyschool->description ?? '') }}
                        </div>
                        <div class="faq__title">
                            <h4>{{ $whyschool->long_title ?? '' }}</h4>
                        </div>
                        <div class="accordion mb-5" id="accordionExample">
                            <div class="accordion__wrapper">
                                @foreach ($faqs as $key => $records)
                                    <div class="accordion-item mb-0">
                                        <h2 class="accordion-header" id="heading{{$key}}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}"
                                                aria-expanded="false" aria-controls="collapse{{$key}}">
                                                {{$records->faq_head}}
                                            </button>
                                        </h2>
                                        <div id="collapse{{$key}}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{$key}}" data-bs-parent="#accordionExample">
                                            <div class="accordion-body py-1 px-4">
                                                <p>
                                                    {{strip_tags($records->faq_detail)}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="side__menu-wrapper">
                            <div class="slide__menu-bar mb-3">
                                <ul>
                                    <li>
                                        <a href="{{ route('inquiryForm.open') }}" class="d-flex justify-content-between">
                                            <span>Apply Online Now</span>
                                            <span><i class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </li>
                                    {{-- <hr> --}}
                                    {{-- <li>
                                        <a href="facility.html" class="d-flex justify-content-between">
                                            <span>Facility</span>
                                            <span><i class="fa-solid fa-chevron-right"></i></span>
                                        </a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="slide__menu-bar">
                                <p class="m-0">For Inquiries</p>
                                <hr>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-mobile"></i>
                                            {{$setting->Phone_one}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-phone"></i> {{$setting->Phone_two}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa-solid fa-envelope"></i> {{$setting->email}}
                                        </a>
                                    </li>
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
