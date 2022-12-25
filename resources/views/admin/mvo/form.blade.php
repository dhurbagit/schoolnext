@extends('admin.layout.master')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Vision Mission objective</h5>
                    <a href="{{ route('Manage.mvo') }}" class="btn btn-primary">View list</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($mvo_edit))
                    <form action="{{ route('mvo.update', $mvo_edit->id) }}" method="POST">
                        @method('put')
                    @else
                        <form action="{{ route('mvo.create') }}" method="POST">
                @endif
                @csrf
                <div class="form-group">
                    <label><b>Title</b></label>
                    <input type="text" class="form-control" name="mvo_title"
                        value="{{ isset($mvo_edit) ? $mvo_edit->title : old('mvo_title') }}">
                    <span class="text-danger">
                        @error('mvo_title')
                            {{ $message }}
                        @enderror()
                    </span>
                </div>
                <div class="form-group">
                    <label for=""><b>Description</b></label>
                    <textarea class="editor" name="editor2">{{ isset($mvo_edit) ? $mvo_edit->description : old('editor2') }}</textarea>
                    <span class="text-danger">
                        @error('editor2')
                            {{ $message }}
                        @enderror()
                    </span>
                </div>
                @if(isset($mvo_edit))
                <button type="submit" class="btn btn-primary">Update</button>
                @else
                <button type="submit" class="btn btn-primary">Save</button>
                @endif
                </form>
            </div>
        </div>
    </div>
@stop
