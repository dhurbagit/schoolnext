@extends('admin.layout.master')
@section('pageTitle', 'Setting')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="text-uppercase mb-0 mt-0 page-title">Site Setting option</h5>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills mb-3 site_basic_detail" id="pills-tab" role="tablist">
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
                @if (isset($setting_record))
                    <form action="{{ route('setting.update', $setting_record->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('setting.save') }}" method="post" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>After Banner Title</b></label>
                                            <input type="text" class="form-control" name="after_banner_title"
                                                value="{{ isset($setting_record) ? $setting_record->after_banner_title : old('after_banner_title') }}">
                                            <span class="text-danger">
                                                @error('after_banner_title')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>News & Event Title</b></label>
                                            <input type="text" class="form-control" name="news_and_event_title"
                                                value="{{ isset($setting_record) ? $setting_record->news_and_event_title : old('news_and_event_title') }}">
                                            <span class="text-danger">
                                                @error('news_and_event_title')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Notice Board Title</b></label>
                                            <input type="text" class="form-control" name="notice_board_title"
                                                value="{{ isset($setting_record) ? $setting_record->notice_board_title : old('notice_board_title') }}">
                                            <span class="text-danger">
                                                @error('notice_board_title')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>Testimonial Title</b></label>
                                            <input type="text" class="form-control" name="Testimonial_title"
                                                value="{{ isset($setting_record) ? $setting_record->Testimonial_title : old('Testimonial_title') }}">
                                            <span class="text-danger">
                                                @error('Testimonial_title')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Testimonial Image 1</b></label>
                                            <input type="file" name="testimonial_first_image" accept="image/*"
                                                class="form-control" onchange="loadFile(event)">
                                            <span class="text-danger">
                                                @error('testimonial_first_image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Testimonial Image 2</b></label>
                                            <input type="file" name="testimonial_second_image" accept="image/*"
                                                class="form-control" onchange="loadFile1(event)">
                                            <span class="text-danger">
                                                @error('testimonial_second_image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><b>Gallery Title</b></label>
                                            <input type="text" class="form-control" name="gallery_title"
                                                value="{{ isset($setting_record) ? $setting_record->gallery_title : old('gallery_title') }}">
                                            <span class="text-danger">
                                                @error('gallery_title')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4">
                                <div class="flex-box">
                                    <div class="content_box_wrapper">
                                        <label><b>Testimonial 1</b></label>
                                        <div class="display_images">
                                            <img @isset($setting_record)
                                    src="{{ asset('setting/' . $setting_record->testimonial_first_image) }}"
                                @endisset
                                                alt="" id="placeholder_image">
                                        </div>
                                    </div>
                                    <div class="content_box_wrapper">
                                        <label><b>Testimonial 2</b></label>
                                        <div class="display_images">
                                            <img @isset($setting_record)
                                    src="{{ asset('setting/' . $setting_record->testimonial_second_image) }}"
                                @endisset
                                                alt="" id="placeholder_image1">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Facebook</b></label>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ isset($setting_record) ? $setting_record->facebook : old('facebook') }}">
                                </div>
                                <div class="form-group">
                                    <label><b>Youtube</b></label>
                                    <input type="text" class="form-control" name="youtube"
                                        value="{{ isset($setting_record) ? $setting_record->youtube : old('youtube') }}">
                                </div>
                                <div class="form-group">
                                    <label><b>Tumblr</b></label>
                                    <input type="text" class="form-control" name="tumblr"
                                        value="{{ isset($setting_record) ? $setting_record->tumblr : old('tumblr') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Twiter</b></label>
                                    <input type="text" class="form-control" name="Twitter"
                                        value="{{ isset($setting_record) ? $setting_record->Twitter : old('Twitter') }}">
                                </div>
                                <div class="form-group">
                                    <label><b>Instagram</b></label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ isset($setting_record) ? $setting_record->instagram : old('instagram') }}">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Linkin</b></label>
                                    <input type="text" class="form-control" name="linkin"
                                        value="{{ isset($setting_record) ? $setting_record->linkin : old('linkin') }}">
                                </div>
                                <div class="form-group">
                                    <label><b>Pinterest</b></label>
                                    <input type="text" class="form-control" name="pinterest"
                                        value="{{ isset($setting_record) ? $setting_record->pinterest : old('pinterest') }}">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><b>School Name</b></label>
                                            <input type="text" class="form-control" name="school_name"
                                                value="{{ isset($setting_record) ? $setting_record->school_name : old('school_name') }}">
                                            <span class="text-danger">
                                                @error('school_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Powered by</b></label>
                                            <input type="text" class="form-control" name="powered_by"
                                                value="{{ isset($setting_record) ? $setting_record->powered_by : old('powered_by') }}">
                                            <span class="text-danger">
                                                @error('powered_by')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>Google map iframe </b></label>
                                            <input type="text" class="form-control" name="google_map"
                                                value="{{ isset($setting_record) ? $setting_record->google_map : old('google_map') }}">
                                            <span class="text-danger">
                                                @error('google_map')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Address</b></label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ isset($setting_record) ? $setting_record->address : old('address') }}">
                                            <span class="text-danger">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Email</b></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ isset($setting_record) ? $setting_record->email : old('email') }}">
                                            <span class="text-danger">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Phone number</b></label>
                                            <input type="text" class="form-control" name="Phone_one"
                                                value="{{ isset($setting_record) ? $setting_record->Phone_one : old('Phone_one') }}">
                                            <span class="text-danger">
                                                @error('Phone_one')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label><b>Powered by link</b></label>
                                            <input type="text" class="form-control" name="powered_by_link"
                                                value="{{ isset($setting_record) ? $setting_record->powered_by_link : old('powered_by_link') }}">
                                            <span class="text-danger">
                                                @error('powered_by_link')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label><b>Login Background Image</b></label>
                                            <input type="file" name="loginBg_images" accept="image/*"
                                                class="form-control" onchange="loadFile5(event)">
                                            <span class="text-danger">
                                                @error('loginBg_images')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label><b>logo</b></label>
                                            <input type="file" name="logo" accept="image/*" class="form-control"
                                                onchange="loadFile2(event)">
                                            <span class="text-danger">
                                                @error('logo')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="form-group">
                                            <label><b>Fav Icon Images</b></label>
                                            <input type="file" name="favIcon_image" accept="image/*"
                                                class="form-control" onchange="loadFile4(event)">
                                            <span class="text-danger">
                                                @error('footer_image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>Whatsapp Number</b><img src="{{asset('backend/whatsapp.png')}}" alt="" width="20px"></label>
                                            <input type="text" class="form-control" name="Phone_two"
                                                value="{{ isset($setting_record) ? $setting_record->Phone_two : old('Phone_two') }}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Viber Number</b><img src="{{asset('backend/viber.png')}}" alt="" width="20px"></label>
                                            <input type="text" class="form-control" name="Phone_three"
                                                value="{{ isset($setting_record) ? $setting_record->Phone_three : old('Phone_three') }}">
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label><b>Footer Brochure Images</b></label>
                                            <input type="file" name="footer_image" accept="image/*"
                                                class="form-control" onchange="loadFile3(event)">
                                            <span class="text-danger">
                                                @error('footer_image')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Footer Brochure File</b></label>
                                            <input type="file" name="f_brochure_file" accept="image/*"
                                                class="form-control" onchange="loadFile3(event)">
                                            <span class="text-danger">
                                                @error('f_brochure_file')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label><b>View site Count</b></label>
                                            <input type="text" id="view_counts" class="form-control" name="view_counter" readonly
                                                value="{{ isset($setting_record) ? $setting_record->view_counter : old('view_counter') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2"><br>
                                        <button type="button" id="reset_btn" class="btn btn-success">Reset Value</button>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label><b>Message</b></label>
                                            <textarea name="message" id="" class="editor form-control" cols="30" rows="10">
                                                {{ isset($setting_record) ? $setting_record->message : old('message') }}
                                            </textarea>

                                        </div>
                                        <div class="form-group">
                                            <label><b>Email Success Message</b></label>
                                            <textarea name="success_message" id="" class="editor100 form-control" cols="30" rows="10">
                                                {{ isset($setting_record) ? $setting_record->success_message : old('success_message') }}
                                            </textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="flex-box">
                                    <div class="content_box_wrapper">
                                        <label><b>Logo Image</b></label>
                                        <div class="display_images">
                                            <img @isset($setting_record)
                                src="{{ asset('setting/' . $setting_record->logo) }}"
                                @endisset
                                                alt="" id="placeholder_image2">
                                        </div>
                                    </div>
                                    <div class="content_box_wrapper">
                                        <label><b>Footer Image</b></label>
                                        <div class="display_images">
                                            <img @isset($setting_record)
                                src="{{ asset('setting/' . $setting_record->footer_image) }}"
                                @endisset
                                                alt="" id="placeholder_image3">
                                        </div>
                                    </div>
                                    <div class="content_box_wrapper">
                                        <label><b>FavIcon Image</b></label>
                                        <div class="display_images">
                                            <img @isset($setting_record)
                                src="{{ asset('setting/' . $setting_record->favIcon_image) }}"
                                @endisset
                                                alt="" id="placeholder_image4">
                                        </div>
                                    </div>

                                </div>
                                <div class="flex-box">
                                    <div class="content_box_wrapper">
                                        <label><b>Login Bakgound</b></label>
                                        <div class="display_images">
                                            <img @isset($setting_record)
                                src="{{ asset('setting/' . $setting_record->loginBg_images) }}"
                                @endisset
                                                alt="" id="placeholder_image5">
                                        </div>
                                    </div>
                                    <div class="content_box_wrapper">
                                        <label><b>Brochure type</b></label>
                                        <div class="display_images">
                                            @if (pathinfo($setting_record->f_brochure_file, PATHINFO_EXTENSION) == 'docx')
                                                <img src="{{ asset('frontend/docs.jpg') }}">
                                            @elseif(pathinfo($setting_record->f_brochure_file, PATHINFO_EXTENSION) == 'pdf')
                                                <img src="{{ asset('frontend/pdf.png') }}">
                                            @elseif(pathinfo($setting_record->f_brochure_file, PATHINFO_EXTENSION) == 'xlsx')
                                                <img src="{{ asset('frontend/excel.png') }}">
                                            @else
                                                <img src="{{ asset('frontend/file.png') }}" width="100%"
                                                    height="100%" alt="No Image">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @if (isset($setting_record))
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
    <script>
        var loadFile4 = function(event) {
            var image = document.getElementById('placeholder_image4');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile5 = function(event) {
            var image = document.getElementById('placeholder_image5');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var loadFile6 = function(event) {
            var image = document.getElementById('placeholder_image6');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

<script>
    $('#reset_btn').click(function(){
        $('#view_counts').val("0");
    })
</script>
@endpush
