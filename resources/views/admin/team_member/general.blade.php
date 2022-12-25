@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Teacher and staff</h5>
                    <a href="{{ route('general.staff') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_general))
                    <form action="{{ route('general.staff.update', $edit_general->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('general.staff.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf

                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input class="form-control" type="text" name="title"
                                value="{{ isset($edit_general) ? $edit_general->title : old('title') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Heading</b></label>
                            <input class="form-control" type="text" name="heading_one"
                                value="{{ isset($edit_general) ? $edit_general->heading_one : old('heading_one') }}">
                            <span class="text-danger">
                                @error('heading_one')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Sub heading</b></label>
                            <input class="form-control" type="text" name="heading_two"
                                value="{{ isset($edit_general) ? $edit_general->heading_two : old('heading_two') }}">
                            <span class="text-danger">
                                @error('heading_two')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Designation</b></label>
                            <input class="form-control" type="text" name="designation"
                                value="{{ isset($edit_general) ? $edit_general->designation : old('designation') }}">
                            <span class="text-danger">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Image</b></label>
                            <div class="flex_wrapper">
                                <div class="image-frame">
                                    <img @isset($edit_general)
                                          src="{{ asset('uploads/' . $edit_general->image) }}"
                                        @endisset
                                        alt="" id="placeholder_image">
                                </div>
                                <input class="form-control" type="file" name="image" onchange="loadFile(event)">

                            </div>
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>

                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="form-group">
                    <label><b>Message</b></label>
                    <textarea name="description" class="editor" id="" cols="30" rows="10">
                            {{ isset($edit_general) ? $edit_general->description : old('description') }}
                        </textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>






                @if (isset($edit_general))
                    <button type="submit" class="btn btn-success">update</button>
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
@endpush
