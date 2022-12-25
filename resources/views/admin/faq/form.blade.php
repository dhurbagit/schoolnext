@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Why school</h5>
                    {{-- <a href=" " class="btn btn-primary">List view</a> --}}
                </div>
            </div>
            <div class="card-body">
                @if (isset($lists))
                    <form action="{{ route('whyschool.update', $lists->id) }}" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{ route('whyschool.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input type="text" class="form-control" name="title"
                                value="{{ isset($lists) ? $lists->title : old('title') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>FAQ's Heading</b></label>
                            <input type="text" class="form-control" name="long_title"
                                value="{{ isset($lists) ? $lists->long_title : old('long_title') }}">
                            <span class="text-danger">
                                @error('long_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea class="editor100" name="description" id="" cols="30" rows="10">
                                {{ isset($lists) ? $lists->description : old('description') }}
                            </textarea>
                            <span class="text-danger">
                                @error('description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>


                @if (isset($lists))
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
        var count = 1;
        var load_box = function load_box(event) {
            $('#tbody_place').append(
                '<tr>' +
                '<td>' +
                count +
                '</td>' +
                '<td>' +
                '<label>Question</label>' +
                '<input type="text" class="form-control" name="faq_head[]" value="">' +
                '</td>' +
                '<td>' +
                '<label>Answer</label>' +
                '<textarea  class="editor" name="faq_detail[]" cols="30" rows="10"></textarea>' +
                '</td>' +
                '<td>' +
                '<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">' +
                '<input type="checkbox" class="custom-control-input" id="customSwitch' + count +
                '" name="hide_show[]">' +
                '<label class="custom-control-label" for="customSwitch' + count + '">Hide/Show</label>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<button type="button" class="btn btn-success mt-5" id="remove_addBtn">' +
                '-' +
                '</button>' +
                '</td>' +
                '</tr>'
            );
            count++;
        }

        function ckeditor() {
            ClassicEditor
                .create(document.querySelector('.editor'), {
                    licenseKey: '',
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error('Oops, something went wrong!');
                    console.error(
                        'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                    );
                    console.warn('Build id: zcqz3ups1g1q-7004ol2st27j');
                    console.error(error);
                });
        }
    </script>

    <script>
        $(document).on("click", "#remove_addBtn", function() {
            $(this).parent().parent().remove();
        });
    </script>
@endpush
