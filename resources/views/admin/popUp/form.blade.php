@extends('admin.layout.master')
@section('pageTitle', 'Pop Up Model')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Pop up Modal</h5>
                    <a href="{{ route('popUpModal.view') }}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($editList))
                    <form action="{{ route('popupModal.update', $editList->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('popupModal.save') }}" method="POST" enctype="multipart/form-data">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <label for=""><b>Title</b></label>
                        <input type="text" class="form-control" name="modal_title"
                            value="{{ isset($editList) ? $editList->modal_title : old('modal_title') }}">

                    </div>
                    <div class="col-lg-3">
                        <label for=""><b>Link</b></label>
                        <input type="text" class="form-control" name="link"
                            value="{{ isset($editList) ? $editList->link : old('link') }}">
                    </div>
                    <div class="col-lg-3">
                        <label for=""><b>Image</b>(size: 490 X 490)</label>
                        <div class="flex_wrapper">
                            <div class="image-frame">
                                <img @isset($editList)
                                    src="{{ asset('uploads/' . $editList->image) }}"
                                @endisset
                                    alt="" id="placeholder_image">
                            </div>
                            <input onchange="loadFile(event)" class="form-control" type="file" name="image">
                        </div>
                        <span class="text-danger">
                            @error('image')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-3">
                        <label for=""><b>file</b></label>
                        <div class="flex_wrapper">
                            <div class="image-frame">
                                <img src="{{ asset('backend/assets/img/document-file-icon.png') }}" alt="">
                            </div>
                            <input class="form-control" type="file" name="file">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox"
                                @isset($editList)
                                                @if ($editList->hide == 1)
                                                checked
                                                @endif
                                            @endisset
                                class="custom-control-input" id="customSwitch3" name="hide">
                            <label class="custom-control-label" for="customSwitch3"><b>Hide/Show</b></label>
                        </div>
                        <br>
                    </div>
                    <div class="col-lg-12">
                        @if (isset($editList))
                            <button type="submit" class="btn btn-success">Update</button>
                        @else
                            <button type="submit" class="btn btn-success">Save</button>
                        @endif
                    </div>
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
