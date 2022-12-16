@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Management and staff</h4>
                    <a href="{{ route('management.staff') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_management))
                    <form action="{{ route('management.staff.update', $edit_management->id) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                    <form action="{{ route('management.staff.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="title"
                        value="{{ isset($edit_management) ? $edit_management->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Heading</label>
                    <input class="form-control" type="text" name="heading_one"
                        value="{{ isset($edit_management) ? $edit_management->heading_one : old('heading_one') }}">
                    <span class="text-danger">
                        @error('heading_one')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Sub heading</label>
                    <input class="form-control" type="text" name="heading_two"
                        value="{{ isset($edit_management) ? $edit_management->heading_two : old('heading_two') }}">
                    <span class="text-danger">
                        @error('heading_two')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <input class="form-control" type="text" name="designation"
                        value="{{ isset($edit_management) ? $edit_management->designation : old('designation') }}">
                    <span class="text-danger">
                        @error('designation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="description" class="editor" id="" cols="30" rows="10">
                            {{ isset($edit_management) ? $edit_management->description : old('description') }}
                        </textarea>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <div class="flex_wrapper">
                        <div class="image-frame">
                            <img @isset($edit_management)
                                  src="{{ asset('uploads/' . $edit_management->image) }}"
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
                @if (isset($edit_management))
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
