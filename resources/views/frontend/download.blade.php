@extends('frontend.layout.master')
@section('content')
    <main>
        <section id="download-section">
            <div class="top__header-wrappper"
                style="background-image: url({{ asset('uploads/' . $menu_content->image) }}) !important;">
                <div class="overlay">
                </div>
                <section id="subheader-title">
                    <div class="container">
                        <h1>{{ $menu_content->page_title }}</h1>
                        {{-- @dd($mvo) --}}
                    </div>
                </section>
            </div>
            <div class="container">
                <div class="download-wrapper section-padding">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="download__category">
                                <div class="title_holder">
                                    <h4>Download Category</h4>
                                </div>
                                <ul>
                                    @foreach ($downloads as $data)
                                        <a href="{{ route('downloads.fetchChild', $data->id) }}">
                                            <li class="category__links active"><i class="fa-solid fa-arrow-right"></i>
                                                {{ ucfirst($data->title) }}</li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="download_container mb-3">
                                <div class="row">
                                    @foreach ($downloads_g as $data)

                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                            <div class="download_item">
                                                <a href="{{asset('uploads/'. $data->file)}}"
                                                    target="_blank">
                                                    <div class="download_img">
                                                        @if (pathinfo($data->file, PATHINFO_EXTENSION) == 'docx')
                                                            <img src="{{ asset('frontend/docs.jpg') }}">
                                                        @elseif(pathinfo($data->file, PATHINFO_EXTENSION) == 'pdf')
                                                            <img src="{{ asset('frontend/pdf.png') }}">
                                                        @elseif(pathinfo($data->file, PATHINFO_EXTENSION) == 'xlsx')
                                                            <img src="{{ asset('frontend/excel.png') }}">
                                                        @else
                                                            <img src="{{ asset('frontend/file.png') }}" width="100%" height="100%"
                                                                alt="No Image">
                                                        @endif
                                                    </div>
                                                    <label for="">Download</label>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- pagination start  -->
                            <div class="d-flex justify-content-center">
                                {{$downloads_g->links()}}
                            </div>
                            <!-- pagination end -->
                        </div>
                    </div>
                </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
