@extends('admin.layout.master')
@section('pageTitle', 'Blogs')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Blog</h5>
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
                <div class="row">
                    <div class="col-lg-4">
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
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Designation</b></label>
                            <input class="form-control" type="text" name="designation"
                                value="{{ isset($records) ? $records->designation : old('designation') }}">
                            <span class="text-danger">
                                @error('designation')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Date</b></label>
                            <input class="form-control" type="date" name="date"
                                value="{{ isset($records) ? $records->date : date('Y-m-d') }}">
                            <span class="text-danger">
                                @error('date')
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
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea name="inner_description" id="" cols="30" rows="10">
                                    {{ isset($records) ? $records->inner_description : old('inner_description') }}
                                </textarea>
                            <span class="text-danger">
                                @error('inner_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
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
