@extends('admin.layout.master')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> Basic Inputs</div>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                            aria-controls="pills-home" aria-selected="true">Section Titles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Social Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Other setting</a>
                    </li>
                </ul>
                @if(isset($setting_record))
                <form action="{{ route('setting.update', $setting_record->id ) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @else
                <form action="{{ route('setting.save') }}" method="post" enctype="multipart/form-data">
                @endif

                    @csrf
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="form-group">
                                <label>After Banner Title</label>
                                <input type="text" class="form-control" name="after_banner_title"
                                    value="{{ isset($setting_record) ? $setting_record->after_banner_title : old('after_banner_title') }}">
                                <span class="text-danger">
                                    @error('after_banner_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>News & Event Title</label>
                                <input type="text" class="form-control" name="news_and_event_title"
                                    value="{{ isset($setting_record) ? $setting_record->news_and_event_title : old('news_and_event_title') }}">
                                <span class="text-danger">
                                    @error('news_and_event_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Notice Board Title</label>
                                <input type="text" class="form-control" name="notice_board_title"
                                    value="{{ isset($setting_record) ? $setting_record->notice_board_title : old('notice_board_title') }}">
                                <span class="text-danger">
                                    @error('notice_board_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Testimonial Title</label>
                                <input type="text" class="form-control" name="Testimonial_title"
                                    value="{{ isset($setting_record) ? $setting_record->Testimonial_title : old('Testimonial_title') }}">
                                <span class="text-danger">
                                    @error('Testimonial_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="about_image_wrapper">
                                <img @isset($setting_record)
                                    src="{{ asset('setting/' . $setting_record->testimonial_first_image) }}"
                                @endisset
                                    alt="" id="placeholder_image">
                            </div>
                            <div class="form-group">
                                <label>Testimonial Image 1</label>
                                <input type="file" name="testimonial_first_image" accept="image/*" class="form-control"
                                    onchange="loadFile(event)">
                                <span class="text-danger">
                                    @error('testimonial_first_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="about_image_wrapper">
                                <img @isset($setting_record)
                                    src="{{ asset('setting/' . $setting_record->testimonial_second_image) }}"
                                @endisset
                                    alt="" id="placeholder_image1">
                            </div>
                            <div class="form-group">
                                <label>Testimonial Image 2</label>
                                <input type="file" name="testimonial_second_image" accept="image/*" class="form-control"
                                    onchange="loadFile1(event)">
                                <span class="text-danger">
                                    @error('testimonial_second_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Gallery Title</label>
                                <input type="text" class="form-control" name="gallery_title"
                                    value="{{ isset($setting_record) ? $setting_record->gallery_title : old('gallery_title') }}">
                                <span class="text-danger">
                                    @error('gallery_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" class="form-control" name="facebook"
                                    value="{{ isset($setting_record) ? $setting_record->facebook : old('facebook') }}">
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ isset($setting_record) ? $setting_record->instagram : old('instagram') }}">
                            </div>
                            <div class="form-group">
                                <label>Linkin</label>
                                <input type="text" class="form-control" name="linkin"
                                    value="{{ isset($setting_record) ? $setting_record->linkin : old('linkin') }}">
                            </div>
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text" class="form-control" name="youtube"
                                    value="{{ isset($setting_record) ? $setting_record->youtube : old('youtube') }}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ isset($setting_record) ? $setting_record->address : old('address') }}">
                                <span class="text-danger">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Phone 1</label>
                                <input type="text" class="form-control" name="Phone_one"
                                    value="{{ isset($setting_record) ? $setting_record->Phone_one : old('Phone_one') }}">
                                <span class="text-danger">
                                    @error('Phone_one')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label>Phone 2</label>
                                <input type="text" class="form-control" name="Phone_two"
                                    value="{{ isset($setting_record) ? $setting_record->Phone_two : old('Phone_two') }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ isset($setting_record) ? $setting_record->email : old('email') }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="about_image_wrapper">
                                <img
                                @isset($setting_record)
                                src="{{ asset('setting/' . $setting_record->logo) }}"
                                @endisset
                                    alt="" id="placeholder_image2">
                            </div>
                            <div class="form-group">
                                <label>logo</label>
                                <input type="file" name="logo" accept="image/*" class="form-control"
                                    onchange="loadFile2(event)">
                                <span class="text-danger">
                                    @error('logo')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="about_image_wrapper">
                                <img
                                @isset($setting_record)
                                src="{{ asset('setting/' . $setting_record->footer_image) }}"
                                @endisset
                                alt="" id="placeholder_image3">
                            </div>
                            <div class="form-group">
                                <label>Footer Images</label>
                                <input type="file" name="footer_image" accept="image/*" class="form-control"
                                    onchange="loadFile3(event)">
                                <span class="text-danger">
                                    @error('footer_image')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>
                    @if(isset($setting_record))
                    <button class="btn btn-success" type="submit">Update</button>
                    @else
                    <button class="btn btn-success" type="submit">Save</button>
                    @endif

                </form>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile1 = function(event) {
            var image = document.getElementById('placeholder_image1');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile2 = function(event) {
            var image = document.getElementById('placeholder_image2');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile3 = function(event) {
            var image = document.getElementById('placeholder_image3');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
