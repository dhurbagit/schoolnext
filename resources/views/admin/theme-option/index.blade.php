@extends('admin.layout.master')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Theme Option</h5>

                </div>
            </div>
            <div class="card-body">
                @if (isset($update_thms))
                    <form action="{{ route('themeOption.update', $update_thms->id) }}" method="POST">
                        @method('put')
                    @else
                        <form action="{{ route('themeOption.save') }}" method="POST">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Primary Color</b></label>
                            <input type="color" name="primary_color" id="primary_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->primary_color : old('primary_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Secondary Color</b></label>
                            <input type="color" name="secondary_color" id="secondary_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->secondary_color : old('secondary_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label><b>Fonts Color</b></label>
                            <input type="color" name="footer_color" id="footer_color" class="form-control"
                                value="{{ isset($update_thms) ? $update_thms->footer_color : old('footer_color') }}">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if (isset($update_thms))
                            <button type="submit" class="btn btn-primary">Update</button>
                        @else
                            <button type="submit" class="btn btn-primary">Save</button>
                        @endif

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop
