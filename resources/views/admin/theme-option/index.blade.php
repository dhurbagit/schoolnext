@extends('admin.layout.master')
@section('pageTitle', 'Theme Options')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Theme Option</h5>

                </div>
            </div>
            <div class="card-body">
                @if (isset($update_thms))
                    <form action="{{ route('themeOption.update', $update_thms->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('themeOption.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>Primary Color</b></label>
                            <input type="color" name="primary_color" id="primary_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->primary_color : old('primary_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>Secondary Color</b></label>
                            <input type="color" name="secondary_color" id="secondary_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->secondary_color : old('secondary_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>Footer Color</b></label>
                            <input type="color" name="footer_color" id="footer_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->footer_color : old('footer_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>Copyright color</b></label>
                            <input type="color" name="copyright_color" id="copyright_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->copyright_color : old('copyright_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label><b>Footer Image</b></label>
                            <div class="input_images_wrapper">
                                <div class="image_place">
                                    <img @isset($update_thms)
                                    src="{{ asset('uploads/' . $update_thms->footer_bg_image) }}"
                                    @endisset
                                        alt="" id="output">
                                </div>
                                <input name="footer_bg_image" type="file" onchange="loadFile(event)"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3"><br><br>
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="option"
                                @isset($update_thms) @if ($update_thms->option == 1) checked @endif @endisset>
                            <label class="custom-control-label" for="customSwitch3"><b>Disable Footer background color</b></label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label for=""><b>Add Html Code For facebook Chat</b></label>

                        <input type="text" class="form-control" name="code" value="{{ isset($update_thms) ? $update_thms->code : old('code') }}">

                    </div>
                    <div class="col-lg-12">
                        @if (isset($update_thms))
                            <button type="submit" class="btn btn-primary">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary">Save</button>
                        @endif

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>


@endpush
