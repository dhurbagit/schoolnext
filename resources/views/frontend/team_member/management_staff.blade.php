@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="Team-section">
            <div class="container">
                <div class="team--title">
                    <h3>{{ $menu_content1->name }}</h3>
                </div>
                <div class="team__list py-5">
                    <div class="row">
                        @foreach ($management_staff as $key => $staff)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#team{{$key}}">
                                    <div class="team_card">
                                        <div class="team__img">
                                            <img src="{{ asset('uploads/' . $staff->image) }}" width="100%" alt="">
                                        </div>
                                        <div class="team_detail">
                                            <div class="name">
                                                <h4>{{ Str::ucfirst($staff->title) }}</h4>
                                                <p>{{ Str::ucfirst($staff->designation) }}</p>
                                                <span>{{ Str::limit(strip_tags($staff->description), 50, '...') }}</span>
                                            </div>
                                            <div class="icon">
                                                <i class="fa-solid fa-arrow-right"></i>
                                            </div>
                                            <div class="extra__space"></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="team{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header py-2">
                                            <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="team__image">
                                                        <img src="{{ asset('uploads/' . $staff->image) }}" width="100%" height="100%"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="modal-team__detail">
                                                        <div class="name__wrapper">
                                                            <h3 class="mb-2">{{ $staff->title }}</h3>
                                                            <h5 class="mb-0">{{ $staff->designation }}</h5>
                                                            <p>{{ $staff->heading_one }}</p>
                                                        </div>
                                                        <div class="message">
                                                            {{strip_tags($staff->description)}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal end  -->
                        @endforeach

                    </div>
                </div>

            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
