@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Youtube Form</h5>
                    <a href="{{ route('youtube.video') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_youtube))
                    <form action="{{route('youtube.update', $edit_youtube->id)}}" method="POST" enctype="multipart/form-data">
                        @method('put')
                @else
                    <form action="{{ route('youtube.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input class="form-control" type="text" name="title"
                                value="{{ isset($edit_youtube) ? $edit_youtube->title : old('title') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Video link</b></label>
                            <input class="form-control" type="text" name="video"
                                value="{{ isset($edit_youtube) ? $edit_youtube->video : old('video') }}">
                            <span class="text-danger">
                                @error('video')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" id="customSwitch3" name="hide_show"
                                    @isset($edit_youtube) @if ($edit_youtube->hide == 1) checked @endif @endisset>
                                <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                            </div>
                        </div>
                    </div>
                </div>

                @if (isset($edit_youtube))
                    <button type="submit" class="btn btn-success">Update</button>
                @else
                    <button type="submit" class="btn btn-success">Save</button>
                @endif


                </form>
            </div>
        </div>

    </div>
@stop
