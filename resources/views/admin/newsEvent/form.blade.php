@extends('admin.layout.master')
@section('pageTitle', 'News and Events')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">News and Event</h5>
                    <a href="{{ route('newsEvent.manage') }}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">

                @if (isset($edit_mvo))
                    <form action="{{ route('newsevent.update', $edit_mvo->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('newsevent.create') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for=""><b>Title</b></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ isset($edit_mvo) ? $edit_mvo->title : old('title') }}">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Date</b></label>
                                    <input type="date" class="form-control" name="date"
                                        value="{{ isset($edit_mvo) ? $edit_mvo->date : date('Y-m-d') }}">
                                    <span class="text-danger">
                                        @error('date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><b>Image</b></label>
                                    <input type="file" name="image" accept="image/*" class="form-control"
                                        onchange="loadFile(event)">
                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label for=""><b>Image Placeholder</b></label>
                        <div class="display_images">
                            <img @isset($edit_mvo)
                                src="{{ asset('NewsEvent/' . $edit_mvo->images) }}"
                            @endisset
                                alt="" id="placeholder_image">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea class="form-control editor" name="editor2" id="editor2" placeholder="Write some words" rows="4">
                                @isset($edit_mvo)
                                    {{ $edit_mvo->description }}
                                    @endisset
                            </textarea>
                            <span class="text-danger">
                                @error('editor2')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>




                @if (isset($edit_mvo))
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
