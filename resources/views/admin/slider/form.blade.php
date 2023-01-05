@extends('admin.layout.master')
@section('pageTitle', 'Slider')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Slider</h5>
                    <a href="{{ route('manage-slider') }}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($slider_edit))
                    <form action="{{ route('editSlider.index', $slider_edit->id) }}" method="POST"
                        enctype="multipart/form-data">
                    @else
                        <form action="{{ route('createSlider.index') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input type="text" class="form-control" name="title"
                                value="{{ isset($slider_edit) ? $slider_edit->title : old('title') }}" placeholder="Slider Title">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label><b>Slider Caption</b></label>
                            <input type="text" class="form-control" name="slider_caption"
                                value="{{ isset($slider_edit) ? $slider_edit->slider_caption : old('slider_caption') }}" placeholder="Slider Caption">
                            <span class="text-danger">
                                @error('slider_caption')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label><b>Upload</b></label>
                            <input type="file" name="slider_image" accept="image/*" class="form-control"
                                onchange="loadFile(event)">
                            <span class="text-danger">
                                @error('slider_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label><b>External Link</b></label>
                            <input type="text" class="form-control" name="url_link" placeholder="External Url Link"
                                value="{{ isset($slider_edit) ? $slider_edit->url : old('url_link') }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label for=""><b>Image Placeholder</b></label>
                        <div class="display_images">
                            <img id="output"
                                @isset($slider_edit)
                                src="{{ asset('slider/' . $slider_edit->image) }}"
                                @endisset
                                width="200" />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" name="hide_show"
                                    value="0"
                                    @isset($slider_edit) @if ($slider_edit->hide == 1) checked @endif @endisset>
                                <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($slider_edit))
                    <button type="submit" class="btn btn-info">Update</button>
                @else
                    <button type="submit" class="btn btn-info" id="btn_disabe_on_save">Save</button>
                @endif
                </form>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $('#customSwitch3').on('change', function() {
            this.value = this.checked ? 1 : 0;
            console.log(this.value);
        }).change();
    </script>

    <script type="application/javascript">
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endpush
