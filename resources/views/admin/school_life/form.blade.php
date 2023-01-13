@extends('admin.layout.master')
@section('pageTitle', 'School Life')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">School Life</h5>
                    <a href="{{ route('school.life') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($records))
                    <form action="{{ route('schoollife.update', $records->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('schoollife.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input class="form-control" type="text" name="title"
                                value="{{ isset($records) ? $records->title : old('title') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Bottom Image</b></label>
                            <div class="flex_wrapper">
                                <div class="image-frame">
                                    <img @isset($records)
                                          src="{{ asset('uploads/' . $records->featured_image) }}"
                                        @endisset
                                        alt="" id="placeholder_image">
                                </div>
                                <input class="form-control" type="file" name="featured_image" onchange="loadFile(event)">
                            </div>
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea name="description" class="editor" id="" cols="30" rows="10">
                                {{ isset($records) ? $records->description : old('description') }}
                            </textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label><b>Description 1</b></label>
                            <textarea name="description_one" class="editor100" id="" cols="30" rows="10">
                                {{ isset($records) ? $records->description_one : old('description_one') }}
                            </textarea>
                            <span class="text-danger">
                                @error('description_one')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12"></div>
                </div>




                <div class="form-group">
                    <table class="table cs_table_width">
                        <thead>
                            <tr>
                                <td colspan="4">
                                    <div class="inside_td_cell">
                                        <b>Click to add Images</b>
                                        <button onclick="load_boxAdd(event)" type="button" class="btn btn-primary"
                                            class="addImg_tag" id="addImg_tag">Add Image</button>
                                    </div>
                                </td>

                            </tr>
                        </thead>
                        <tbody id="dynamic_js_content">

                        </tbody>
                    </table>
                </div>
                @if (isset($records))
                    <div class="form-group">
                        <div class="update_gallery_image">
                            @foreach ($records->c_images as $picture)
                                <div class="upload__img-box_of_gallery">
                                    <a href="{{ route('delete.contentImage', $picture->id) }}"><i
                                            class="fa fa-times"></i></a>
                                    <img src="{{ asset('uploads/' . $picture->image) }}" alt="" width="100"
                                        height="100">
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endif

                @if (isset($records))
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
            var image = document.getElementById('placeholder_image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        var count = 1;
        var load_boxAdd = function(event) {
            var vals = $('#dynamic_js_content tr').length + 1;
            var list = $('.update_gallery_image > div').length;
            if (list + vals <= 4) {
                appendRecord();
            } else {
                alert('Limit only 4 images');
            }
            count++;
        }
        // && list + vals <= 4
    </script>
    <script>
        function appendRecord() {
            $('#dynamic_js_content').append(
                '<tr>' +
                '<td>' +
                '<b>' + count + '</b>' +
                '</td>' +
                '<td>' +
                '<div class="content_images">' +
                '<img class = "beyound_img1" id="beyound_img' + count + '" src="" width="100" />' +
                '</div>' +
                '</td>' +
                '<td >' +
                ' <input class="form-control images_o" type="file" name="small_image[]">' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-success" id="remove_addBtn">' +
                '-' +
                '</button>' +
                '</td>' +
                '</tr>'
            );
        }
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
                    $(input).parent().siblings().children().find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(document).on("click", "#remove_addBtn", function() {
            $(this).parent().parent().remove();
        });
    </script>
@endpush
