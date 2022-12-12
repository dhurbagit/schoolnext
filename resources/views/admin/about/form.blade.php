@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> Basic Inputs</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        @if (isset($aboutContent))
                            <form action="{{ route('about.update', $aboutContent->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                            @else
                                <form action="{{ route('about.create') }}" method="POST" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Small title</label>
                                    <input type="text" class="form-control" name="small_title"
                                        value="{{ isset($aboutContent)?$aboutContent->small_title:old('small_title') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Main title</label>
                                    <input type="text" class="form-control" name="main_title"
                                        value="{{ isset($aboutContent)?$aboutContent->main_title:old('main_title') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Slogan</label>
                                    <input type="text" class="form-control" name="slogan"
                                        value="{{ isset($aboutContent)?$aboutContent->slogan:old('slogan') }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="about_image_wrapper">
                                    <img
                                        @isset($aboutContent)
                                        src="{{asset('aboutus/'. $aboutContent->image )}}"
                                        @endisset
                                    alt="" id="placeholder_image">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>File input</label>
                                    <input type="file" name="about_image" accept="image/*" class="form-control" onchange="loadFile(event)">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="editor" name="editor1">{{ isset($aboutContent)?$aboutContent->description:old('editor1') }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                @if(isset($aboutContent))
                                <button type="submit" class="btn btn-info">Update</button>
                                @else
                                <button type="submit" class="btn btn-info">Save</button>
                                @endif


                            </div>
                        </div>
                        </form>
                    </div>
                </div>
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
