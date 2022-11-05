@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Create Slider</h3>
                        <a href="{{ route('manage-slider') }}" class="create_link btn btn-info"><i
                                class="fas fa-plus"></i>&nbsp;View list</a>
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
                        <img id="output"@isset($slider_edit)

                        src="{{ asset('slider/' . $slider_edit->image) }}"

                        @endisset
                            width="200" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Images</label>
                        <div class="input-group mb-3">



                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="slider_image" onchange="loadFile(event)"
                                    class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"
                                    value="{{ isset($slider_edit) ? $slider_edit->image : old('slider_image') }}">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        <span class="text-danger">
                            @error('slider_image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input class="form-control" type="text"
                                    value="{{ isset($slider_edit) ? $slider_edit->title : old('title') }}" name="title">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slider Caption</label>
                                <input class="form-control" type="text"
                                    value="{{ isset($slider_edit) ? $slider_edit->slider_caption : old('slider_caption') }}"
                                    name="slider_caption">
                                <span class="text-danger">
                                    @error('slider_caption')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Url</label>
                                <input class="form-control" type="text"
                                    value="{{ isset($slider_edit) ? $slider_edit->url : old('url_link') }}" name="url_link">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" name="hide_show"
                                        value="0"
                                        @isset($slider_edit) @if ($slider_edit->hide == 1) checked @endif @endisset>
                                    <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @if (isset($slider_edit))
                                <button type="submit" class="btn btn-info">Update</button>
                            @else
                                <button type="submit" class="btn btn-info">Save</button>
                            @endif


                        </div>
                    </div>
                    </form>
                </div>
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
