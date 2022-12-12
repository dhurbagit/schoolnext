@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Beyond Academic</h4>
                    <a href="{{ route('manage.academic') }}" class="btn btn-primary">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($beyond_edit))
                    <form action="{{ route('academic.update', $beyond_edit->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('academic.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title"
                        value="{{ isset($beyond_edit) ? $beyond_edit->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="display_images">
                            <img id="output"
                                @isset($beyond_edit)
                                    src="{{ asset('uploads/' . $beyond_edit->feature_image) }}"
                                @endisset
                                width="200" />
                        </div>
                        <div class="form-group">
                            <label>Feature Image</label>
                            <input type="file" class="form-control" onchange="loadFile(event)" name="feature_image">
                            <span class="text-danger">
                                @error('feature_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="editor1" id="" cols="30" rows="10" class="form-control">{{ isset($beyond_edit) ? $beyond_edit->description : old('editor1') }}</textarea>
                    <span class="text-danger">
                        @error('editor1')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox"
                            @isset($beyond_edit)
                            @if ($beyond_edit->hide == 1)
                            checked
                            @endif
                        @endisset
                            class="custom-control-input" id="customSwitch3" name="hide_show" value="0">
                        <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                    </div>
                </div>

                <div class="form-group">

                    <div class="row">
                        <div class="col-lg-5">
                            <input type="text" name="small_title[]" class="form-control mb-2">
                            <span class="text-danger">
                                @error('small_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-lg-5 d-flex">
                            <div class="beyound_image">
                                <img id="beyound_img" src="" width="100" />
                            </div>
                            <input type="file" name="small_image[]" class="form-control mb-2"
                                onchange="loadFile100(event)">
                            <span class="text-danger">
                                @error('small_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-success add-image" onclick="load_box(event)"
                                id="addBtn ">+</button>
                        </div>
                    </div>

                </div>
                <div id="tbody_place">
                    @isset($beyond_edit)
                        <div class="update_gallery_image">

                            @foreach ($beyond_edit->text_title as $key  => $item)

                                <div class="upload__img-box_of_gallery flex_dir">
                                    <a href="{{route('beyondGallery.delete', $item->id)}}">
                                        <i class="fa fa-trash "></i>
                                    </a>

                                    <img src="{{ asset('uploads/' . $item->images) }}" alt="">
                                    <label for="">{{ $item->title }}</label>
                                </div>

                            @endforeach
                        </div>
                    @endisset
                </div>
                @if (isset($beyond_edit))
                    <button type="submit" class="btn btn-success">Update</button>
                @else
                    <button type="submit" class="btn btn-success">Save</button>
                @endif
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
    <script>
        var loadFile100 = function(event) {
            var image = document.getElementById('beyound_img');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        $(document).on('change', '.images_o', function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    //get closest div and then find img add img there
                    $(input).parent().siblings().find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        var count = 1;
        var load_box = function(event) {
            $('#tbody_place').append(
                '<div class="row">' +
                '<div class="col-lg-5">' +
                '<label>' +
                'Title ' +
                count +
                '</label>' +
                '<input class="input_type_text form-control mb-2" name="small_title[]" type="text">' +
                '</div>' +
                '<div class="col-lg-5">' +
                '<label class="mt-2">' +
                'Image ' +
                count +
                '</label>' +
                '<div class = "row">' +
                '<div class = "col-lg-4">' +
                '<div class="iframe_thumbnail">' +
                ' <img class = "beyound_img1" id="beyound_img' + count + '" src="" width="100" />' +
                '</div>' +
                '</div>' +
                '<div class = "col-lg-8">' +
                ' <input class="form-control images_o" type="file" name="small_image[]">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-lg-2">' +
                '<button type="button" class="btn btn-success mt-5" id="remove_addBtn">' +
                '-' +
                '</button>' +
                '</div>' +
                '</div>'
            );
            count++;
        }
    </script>
    <script>
        $(document).on("click", "#remove_addBtn", function() {
            $(this).parent().parent().remove();
        });
    </script>
@endpush
