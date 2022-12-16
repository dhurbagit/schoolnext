@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Blog</h4>
                    <a href="{{ route('blog.view') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($records))
                    <form action="{{ route('blog.update', $records->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('blog.save') }}" method="POST" enctype="multipart/form-data">
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
                    <label>Designation</label>
                    <input class="form-control" type="text" name="designation"
                        value="{{ isset($records) ? $records->designation : old('designation') }}">
                    <span class="text-danger">
                        @error('designation')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input class="form-control" type="date" name="date"
                        value="{{ isset($records) ? $records->date : old('date') }}">
                    <span class="text-danger">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="inner_description" class="editor" id="" cols="30" rows="10">
                            {{ isset($records) ? $records->inner_description : old('inner_description') }}
                        </textarea>
                    <span class="text-danger">
                        @error('inner_description')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <div class="flex_wrapper">
                        <div class="image-frame">
                            <img @isset($records)
                                  src="{{ asset('uploads/' . $records->image) }}"
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
@endpush
