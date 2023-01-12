@extends('frontend.layout.master')
@section('pageTitle', 'Almuni')
@section('content')

    <main>
        <section id="alumni-section">
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
                <div class="alumni-wrapper section-padding">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="alumni__category">
                                <div class="title_holder">
                                    <h4>Alumni Category</h4>
                                </div>
                                <ul>
                                    @foreach ($almuniCollection as $key => $lists)
                                        <a href="{{ route('almuni.link', $lists->id) }}"
                                            id="{{ $key === 0 ? 'list_autoClick' : '' }}">
                                            <li class="category__links active"><i class="fa-solid fa-arrow-right"></i>
                                                {{ ucfirst($lists->title) }}
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="alumni_container">
                                <div class="row">

                                    @foreach ($almuni_g as $collection)
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                                            <div class="alumni_item">
                                                <div class="alumni_img">
                                                    <img src="{{ asset('uploads/' . $collection->image) }}" width="100%"
                                                        height="100%" alt="No Image">
                                                </div>
                                                <div class="alumni_details text-center mt-2">
                                                    <h6>{{ ucfirst($collection->name) }}</h6>
                                                    <table class="table table-borderless text-start">
                                                        <tr>
                                                            <th>Batch</th>
                                                            <th>:</th>
                                                            <td>{{ $collection->batch }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Percentage</th>
                                                            <th>:</th>
                                                            <td>{{ $collection->percentage }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Class</th>
                                                            <th>:</th>
                                                            <td>{{ $collection->class }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
        // document.getElementById("list_autoClick").click();
    </script>
@endpush
