@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Video</h4>
                    {{-- <a href="{{ route('manage-slider') }}" class="btn btn-primary">List view</a> --}}
                </div>
            </div>
            <div class="card-body">
                @if (isset($banner_video))
                    <form action="{{ route('video.update', $banner_video->id) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('video.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"
                        value="{{ isset($banner_video) ? $banner_video->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="thumbnail-image_container">
                    <img src="{{ asset('backend/video_avatar.png') }}" alt="" id="output">
                </div>
                <div class="form-group">
                    <label>Upload Video</label>
                    <input type="file" name="video"  class="form-control" onchange="loadFile(event)">
                    <span class="text-danger">
                        @error('video')
                            {{ $message }}
                        @enderror
                    </span>

                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox"
                            @isset($banner_video) @if ($banner_video->type == 0) checked @endif @endisset
                            class="custom-control-input" id="customSwitch3" name="hide_show">
                        <label class="custom-control-label" for="customSwitch3">Display video as banner</label>
                    </div>
                </div>
                @if (isset($banner_video))
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
            var image = document.getElementById('output');
            image.src = `${asset('backend/video_avatar.png')}`;

        };
    </script>
@endpush
