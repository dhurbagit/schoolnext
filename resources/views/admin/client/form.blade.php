@extends('admin.layout.master')
@section('pageTitle', 'Clients')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Our Client</h5>
                    <a href="{{ route('manage.client') }}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_item))
                    <form action="{{ route('client.update', $edit_item) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('client.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf

                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label><b>Title</b></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ isset($edit_item) ? $edit_item->title : old('title') }}">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label><b>Link</b></label>
                                    <input type="text" class="form-control" name="link"
                                        value="{{ isset($edit_item) ? $edit_item->link : old('link') }}">
                                    <span class="text-danger">
                                        @error('link')
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
                        <div class="display_images">
                            <img @isset($edit_item)
                            src="{{ asset('client/' . $edit_item->image) }}"
                            @endisset
                                alt="" id="placeholder_image">
                        </div>
                    </div>
                </div>

                @if (isset($edit_item))
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
