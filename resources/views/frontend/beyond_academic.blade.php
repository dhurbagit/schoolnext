@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="beyond_academic-section">

            <div class="academic-wrapper section-margin">
                {{-- academic-wrapper_two --}}
                @foreach ($beyond_content as $key => $beyound)
                <div class="{{$key % 2 === 0 ? 'academic-wrapper_one' : 'academic-wrapper_two'}}  py-5">

                    <div class="container">
                        <div class="row align-items-center {{$key % 2 === 0 ? '' : 'd-flex'}}">
                            <div class="col-lg-6 col-md-12 col-sm-12 {{$key % 2 === 0 ? '' : 'order_2'}}">
                                <div class="academic_img">
                                    <img src="{{ asset('uploads/' . $beyound->feature_image) }}" width="100%"
                                        height="100%" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 {{$key % 2 === 0 ? '' : 'order_1'}}">
                                <div class="academic_details">
                                    <div class="academic_title">
                                        <h5>{{ ucfirst($beyound->title) }}</h5>
                                    </div>
                                    <div class="academic_text">
                                        {!! $beyound->description !!}
                                    </div>
                                    <div class="swiper academic_slider">
                                        <div class="swiper-wrapper">
                                            @foreach ($beyound->text_title as $detail)
                                                <div class="swiper-slide">
                                                    <div class="slider_img">
                                                        <a class="example-image-link"
                                                            href="{{ asset('uploads/' . $detail->images) }}"
                                                            data-lightbox="example-set">
                                                            <img src="{{ asset('uploads/' . $detail->images) }}">
                                                        </a>
                                                    </div>
                                                    <div class="slider_text">
                                                        <h6>{{ $detail->title }}</h6>
                                                        {{-- <span>Lorem ipsum.</span> --}}
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- pagination start  -->
            <div class="d-flex justify-content-center">
                {{$beyond_content->render()}}
            </div>
            <!-- pagination end -->
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
@push('scripts')
    <script>
        var swiper = new Swiper(".academic_slider", {
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    </script>
@endpush
