@extends('admin.layout.master')

@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> Basic Inputs</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if (isset($album_edit))
                            <form action="{{ route('update.album', $album_edit->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            @else
                                <form action="{{ route('album.create') }}" method="POST" enctype="multipart/form-data">
                        @endif

                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">

                                    <div class="mb-3">

                                        <input type="text" name="album_title" class="form-control"
                                            value="{{ isset($album_edit) ? $album_edit->title : old('album_title') }}"
                                            id="exampleFormControlInput1" placeholder="Album title">
                                    </div>
                                    <span class="text-danger">
                                        @error('album_title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="thumbnail-image_container">
                                    <img @isset($album_edit)
                                        src="{{ asset('uploads/' . $album_edit->image) }}"
                                    @endisset
                                        alt="" id="placeholder_image">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                        <input type="checkbox"
                                            @isset($album_edit)
                                                @if ($album_edit->publish_status == 1)
                                                checked
                                                @endif
                                            @endisset
                                            class="custom-control-input" id="customSwitch3" name="hide_show" value="0">
                                        <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                        <input type="file" name="album_images" class="form-control" id="inputGroupFile01"
                                            onchange="loadFile(event)">
                                    </div>
                                    <span class="text-danger">
                                        @error('album_images')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label"><b>Gallery</b></label><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Upload images</p>
                                                    <input type="file" name="gallery_images[]" id="gallery_images"
                                                        multiple="" data-max_length="20" class="upload__inputfile">
                                                </label>
                                            </div>
                                            <div class="upload__img-wrap"></div>
                                        </div>
                                    </div>
                                    @isset($album_edit)
                                        <div class="update_gallery_image">
                                            @foreach ($album_edit->images as $item)
                                                <div class="upload__img-box_of_gallery">
                                                    {{ $item->id }}

                                                    <a href="{{route('gallery.delete', $item->id )}}"><i
                                                            class="fa fa-trash "></i></a>

                                                    <img src="{{ asset('uploads/' . $item->image) }}" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endisset
                                    <span class="text-danger">
                                        @error('gallery_images')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if (isset($album_edit))

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
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endpush
