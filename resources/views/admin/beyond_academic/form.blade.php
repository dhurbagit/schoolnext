@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Beyond Academic</h5>
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
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><b>Title</b></label>
                                    <input class="form-control" type="text" name="title"
                                        value="{{ isset($beyond_edit) ? $beyond_edit->title : old('title') }}">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><b>Feature Image</b></label>
                                    <input type="file" class="form-control" onchange="loadFile(event)"
                                        name="feature_image">
                                    <span class="text-danger">
                                        @error('feature_image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label><b>Description</b></label>
                                    <textarea name="editor1" id="" cols="30" rows="10" class="editor form-control">{{ isset($beyond_edit) ? $beyond_edit->description : old('editor1') }}</textarea>
                                    <span class="text-danger">
                                        @error('editor1')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">

                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            <div
                                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input type="checkbox"
                                                    @isset($beyond_edit)
                                                    @if ($beyond_edit->hide == 1)
                                                    checked
                                                    @endif
                                                @endisset
                                                    class="custom-control-input" id="customSwitch3" name="hide_show"
                                                    value="0">
                                                <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 text-right">
                                        <button type="button" class="btn btn-success add-image" onclick="load_box(event)"
                                            id="addBtn ">Add Gallery Images</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="display_images">
                            <img id="output"
                                @isset($beyond_edit)
                                    src="{{ asset('uploads/' . $beyond_edit->feature_image) }}"
                                @endisset
                                width="200" />
                        </div>
                    </div>

                </div>
                <div class="flex_style_box">
                    @isset($beyond_edit)
                        <div class="update_gallery_image">

                            @foreach ($beyond_edit->text_title as $key => $item)
                                <div class="upload__img-box_of_gallery">
                                    <a href="{{ route('beyondGallery.delete', $item->id) }}">
                                        <i class="fa fa-times"></i>
                                    </a>

                                    <img src="{{ asset('uploads/' . $item->images) }}" alt="">

                                </div>
                            @endforeach
                        </div>
                    @endisset
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div id="tbody_place">

                        </div>
                    </div>
                </div>
                @if (isset($beyond_edit))
                    <button type="submit" class="btn btn-success mt-5">Update</button>
                @else
                    <button type="submit" class="btn btn-success mt-5">Save</button>
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
                '<label class="">' +
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
                '<button type="button" class="btn btn-success spacing-s" id="remove_addBtn">' +
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
