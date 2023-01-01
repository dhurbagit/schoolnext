@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="contact-section">
            <div class="bg__overlay">
                <div class="container">
                    <div class="contact__form">
                        <div class="top__header text-center">
                            <div class="large__header">
                                <p>Get In Touch</p>
                            </div>
                            <div class="small__header">
                                {{ strip_tags($setting->message ?? '') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 wow fadeInDown" data-wow-delay="0.5s"
                                style="visibility: visible; -webkit-animation-delay: 0.5s; -moz-animation-delay: 0.5s; animation-delay: 0.5s;">
                                <div class="contact__college">
                                    <div class="top__header mb-3">
                                        <div class="large__header hoverEffect">
                                            <p>Contact Informartion</p>
                                        </div>
                                    </div>

                                    <div class="college-details">
                                        <div class="item d-flex align-items-center">
                                            <div class="icon-holder">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="text">
                                                <strong>Location</strong>
                                                <p>{{ $setting->address ?? '' }}</p>
                                            </div>
                                        </div>
                                        <div class="item d-flex align-items-center">
                                            <div class="icon-holder">
                                                <i class="fa-solid fa-envelope-open"></i>
                                            </div>
                                            <div class="text">
                                                <strong>Email Us</strong>
                                                <p><a href="mailto: info@saim.edu.np">{{ $setting->email ?? '' }}</a></p>
                                            </div>
                                        </div>
                                        <div class="item d-flex align-items-center">
                                            <div class="icon-holder">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div class="text">
                                                <strong>Phone us</strong>
                                                <p>{{ $setting->Phone_one ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="contact__form-holder wow fadeInDown" data-wow-delay="0.3s"
                                    style="visibility: visible; -webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">
                                    <form action="{{ route('contactus.save') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Full Name"
                                                        name="student_name" aria-label="Recipient's username"
                                                        aria-describedby="basic-addon2">
                                                    <span class="text-danger">
                                                        @error('student_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Email Address"
                                                        name="s_email" aria-label="Email" aria-describedby="basic-addon2">
                                                    <span class="text-danger">
                                                        @error('s_email')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Phone Number"
                                                        name="s_phone" aria-label="Recipient's username"
                                                        aria-describedby="basic-addon2">
                                                    <span class="text-danger">
                                                        @error('s_phone')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Address"
                                                        name="s_address" aria-label="Email" aria-describedby="basic-addon2">
                                                    <span class="text-danger">
                                                        @error('s_address')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="p_description" rows="4"
                                                        placeholder="Write Message"></textarea>
                                                    <span class="text-danger">
                                                        @error('p_description')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-5">
                                            <div class="g-recaptcha"
                                                data-sitekey="6LeeboUiAAAAABJrh7FygrsAMP7pTOOTF6ANEe5k">
                                            </div>
                                            @if (Session::has('g-recaptcha-response'))
                                                <span class="text-danger">{{ Session::get('g-recaptcha-response') }}</span>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary py-2 px-4">SEND MESSAGE <i
                                                    class="fa-solid fa-arrow-right-long"></i></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .contact-page iframe {
                        width: 100%;
                    }
                </style>
                <div class="contact-page wow fadeInUp">
                    {!! $setting->google_map ?? '' !!}
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>

@stop
