@extends('admin.layout.master')
@section('pageTitle', 'Testimonials')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Testimonial</h5>
                    <a href="{{ route('manage-testimonial') }}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                {{-- start  --}}
                @if (isset($testimonial_edit))
                    <form action="{{ route('testimonial.update', $testimonial_edit->id) }}" method="post"
                        enctype="multipart/form-data">
                        @method('put')
                    @else
                        <form action="{{ route('testimonial.create') }}" method="post" enctype="multipart/form-data">
                @endif
                @csrf

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" class="form-control" name="testimonial_title" placeholder="Name"
                                value="{{ isset($testimonial_edit) ? $testimonial_edit->title : old('testimonial_title') }}">
                        </div>
                        <span class="text-danger">
                            @error('testimonial_title')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <label><b>Designation</b></label>
                            <input type="text" class="form-control" name="testimonial_designation" placeholder="Designation"
                                value="{{ isset($testimonial_edit) ? $testimonial_edit->designation : old('testimonial_designation') }}">
                        </div>
                        <span class="text-danger">
                            @error('testimonial_designation')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label><b>Image</b></label>
                            <input type="file" accept="image/*" class="form-control" name="testimonial_image"
                                onchange="loadFile(event)">
                            <span class="text-danger">
                                @error('testimonial_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox"
                                    @isset($testimonial_edit)
                                                @if ($testimonial_edit->hide == 1)
                                                checked
                                                @endif
                                            @endisset
                                    class="custom-control-input" id="customSwitch3" name="hide_show">
                                <label class="custom-control-label" for="customSwitch3"><b>Hide/Show</b></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="display_images">
                            <img @isset($testimonial_edit)

                                    src="{{ asset('testimonial/' . $testimonial_edit->images) }}"

                                    @endisset
                                alt="" id="placeholder_image">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for=""><b>Message</b></label>
                            <textarea class="editor" name="editor1">{{ isset($testimonial_edit) ? $testimonial_edit->description : old('editor1') }}</textarea>
                        </div>
                        <span class="text-danger">
                            @error('editor1')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="col-lg-12">
                        <br>
                        @if (isset($testimonial_edit))
                            <button type="submit" class="btn btn-success">Update</button>
                        @else
                            <button type="submit" class="btn btn-success">Save</button>
                        @endif


                    </div>
                </div>

                </form>
                {{-- end  --}}
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
