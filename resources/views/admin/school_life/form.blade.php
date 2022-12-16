@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">School Life</h4>
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
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title"
                        value="{{ isset($records) ? $records->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="editor" id="" cols="30" rows="10">
                        {{ isset($records) ? $records->description : old('description') }}
                    </textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Description 1</label>
                    <textarea name="description_one" class="editor100" id="" cols="30" rows="10">
                        {{ isset($records) ? $records->description_one : old('description_one') }}
                    </textarea>
                    <span class="text-danger">
                        @error('description_one')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Image</label>
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
                <div class="form-group">
                    <table class="table" width="300">
                        <thead>
                            <tr>
                                <td colspan="3"><b>Click to add Images</b></td>
                                <td><button onclick="load_boxAdd(event)" type="button" class="btn btn-primary"
                                        class="addImg_tag" id="addImg_tag">Add Image</button></td>
                            </tr>
                        </thead>
                        <tbody id="dynamic_js_content">

                        </tbody>
                    </table>
                </div>
                @if (isset($records))
                    <div class="form-group">
                        <ul id="img_list">
                            @foreach ($records->c_images as $picture)
                                <li>
                                    <a href="{{route('delete.contentImage', $picture->id)}}"><i class="fa fa-trash"></i></a>
                                    <img src="{{ asset('uploads/' . $picture->image) }}" alt="" width="100"
                                        height="100">
                                </li>
                            @endforeach
                        </ul>
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
            var list = $('#img_list li').length;
            if (list + vals <= 4) {
                appendRecord();
            }
            else{
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
                count +
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
