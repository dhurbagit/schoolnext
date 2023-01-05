@extends('admin.layout.master')
@section('pageTitle', 'Chairman Message')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Chairman Message</h5>
                </div>
            </div>
            <div class="card-body">
                @if(isset($chairman))
                <form action="{{ route('chairman.update') }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                <form action="{{ route('chairman.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><b>Title</b></label>
                                <input class="form-control" type="text" name="message_title"
                                    value="{{ isset($chairman) ? $chairman->message_title : old('message_title') }}">
                                <span class="text-danger">
                                    @error('message_title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label><b>Name</b></label>
                                <input class="form-control" type="text" name="name"
                                    value="{{ isset($chairman) ? $chairman->name : old('name') }}">
                                <span class="text-danger">
                                    @error('title')
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
                                        <img @isset($chairman)
                                              src="{{ asset('uploads/' . $chairman->image) }}"
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
                                <textarea name="description" class="editor" id="" cols="30" rows="10">
                                    {{ isset($chairman) ? $chairman->description : old('title') }}
                                </textarea>
                                <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    </div>




                    <div class="form-group">
                        @if(isset($chairman))
                        <button type="submit" class="btn btn-success">Update</button>
                        @else
                        <button type="submit" class="btn btn-success">Save</button>
                        @endif

                    </div>

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
