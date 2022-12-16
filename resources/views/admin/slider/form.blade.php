@extends('admin.layout.master')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Slider</h4>
                    <a href="{{route('manage-slider')}}" class="btn btn-primary">List view</a>
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
                <div class="display_images">
                    <img id="output"
                        @isset($slider_edit)
                        src="{{ asset('slider/' . $slider_edit->image) }}"
                        @endisset
                        width="200" />
                </div>
                <div class="form-group">
                    <label>Upload</label>
                    <input type="file" name="slider_image" accept="image/*" class="form-control"
                        onchange="loadFile(event)">
                    <span class="text-danger">
                        @error('slider_image')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"
                        value="{{ isset($slider_edit) ? $slider_edit->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Slider Caption</label>
                    <input type="text" class="form-control" name="slider_caption"
                        value="{{ isset($slider_edit) ? $slider_edit->slider_caption : old('slider_caption') }}">
                    <span class="text-danger">
                        @error('slider_caption')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Url</label>
                    <input type="text" class="form-control" name="url_link"
                        value="{{ isset($slider_edit) ? $slider_edit->url : old('url_link') }}">
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3" name="hide_show"
                            value="0"
                            @isset($slider_edit) @if ($slider_edit->hide == 1) checked @endif @endisset>
                        <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                    </div>
                </div>
                @if (isset($slider_edit))
                    <button type="submit" class="btn btn-info">Update</button>
                @else
                    <button type="submit" class="btn btn-info">Save</button>
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
