{{-- not in use  --}}
@extends('admin.layout.master')
@section('pageTitle', 'Pass Out student')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Almuni </h4>
                    <a href="{{ route('Almuni.view') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_record))
                    <form action="{{ route('almuni.save') }}" method="POST" enctype="multipart/form-data">
                    @else
                        <form action="{{ route('almuni.save') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title"
                        value="{{ isset($edit_record) ? $edit_record->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="4">
                                    <b>Click Add to add student records</b>
                                </td>
                                <td colspan="2">
                                    <button type="button" class="btn btn-success" onclick="load_boxAdd(event)">Add
                                        Student</button>
                                </td>

                            </tr>
                        </thead>
                        <tbody id="dynaimci_js_id">

                        </tbody>
                    </table>
                </div>

                <button type="submit" class="btn btn-success">save</button>
                </form>
                @if (isset($edit_record))
                    <div class="form-group d-flex">
                        @foreach ($edit_record->A_images as $info)
                            <div class="card_wrap">
                                <div class="edit_child">
                                    <a href="#" class="btn btn-success edit_action"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                                <div class="flex_wrapper">
                                    <div class="image-frame">
                                        <img src="{{ asset('uploads/' . $info->image) }}" alt="">
                                    </div>
                                    <input disabled class="form-control images_o" type="file" name="image[]">
                                </div>
                                <input type="text" disabled name="name[]" value="{{ $info->name }}"
                                    class="mt-3 form-control">
                                <input type="text" disabled name="batch[]" value="{{ $info->batch }}"
                                    class="mt-3 form-control">
                                <input type="text" dir="" disabled name="percentage[]"
                                    value="{{ $info->percentage }}" class="mt-3 form-control">
                                <input type="text" disabled name="class[]" value="{{ $info->class }}"
                                    class="mt-3 form-control">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

@stop
@push('scripts')
    <script>
        $('.edit_action').click(function(event) {
            $(this).parent().siblings().removeAttr("disabled");
            event.preventDefault()
            $(document).find('input').removeAttr("disabled");
            // $(document).find('.flex_wrapper input[type="text"]').css('border', '1px solid orange');
        })
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
                    $(input).siblings().find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        var load_boxAdd = function(event) {
            appendRecord();
        }
    </script>

    <script>
        function appendRecord() {
            $('#dynaimci_js_id').append(
                ' <tr>' +
                '<td>' +
                '<label>Image</label>' +
                '<div class="flex_wrapper">' +
                '<div class="image-frame">' +
                ' <img src="" alt="">' +
                ' </div>' +
                '<input class="form-control images_o" type="file" name="image[]">' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<label>Name</label>' +
                '<input type="text" class="form-control" name="name[]">' +
                '</td>' +
                '<td>' +
                ' <label>Batch</label>' +
                ' <input type="text" class="form-control" name="batch[]">' +
                ' </td>' +
                '<td>' +
                '<label>Percentage</label>' +
                '<input type="text" class="form-control" name="percentage[]">' +
                '</td>' +
                ' <td>' +
                ' <label>Class</label>' +
                '<input type="text" class="form-control" name="class[]">' +
                ' </td>' +
                '<td>' +
                '<button type="button" class="btn btn-success" id="remove_addBtn">' +
                '-' +
                '</button>' +
                '</td>' +
                '</tr>'
            );
        }
    </script>
@endpush
