@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Principal Message</h4>
                </div>
            </div>
            <div class="card-body">
                @if(isset($principal_m))
                <form action="{{ route('principal.update') }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                @else
                <form action="{{ route('principal.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="message_title"
                            value="{{ isset($principal_m) ? $principal_m->message_title : old('message_title') }}">
                        <span class="text-danger">
                            @error('message_title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input class="form-control" type="text" name="name"
                            value="{{ isset($principal_m) ? $principal_m->name : old('name') }}">
                        <span class="text-danger">
                            @error('title')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="editor" id="" cols="30" rows="10">
                            {{ isset($principal_m) ? $principal_m->description : old('title') }}
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
                                <img @isset($principal_m)
                                      src="{{ asset('uploads/' . $principal_m->image) }}"
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
                    <div class="form-group">
                        @if(isset($principal_m))
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
