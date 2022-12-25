@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Notice board</h5>
                    <a href="{{route('manage.notice')}}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_noticeboard))
                    <form action="{{ route('noticeboard.update', $edit_noticeboard->id) }}" method="POST">
                        @method('put')
                    @else
                        <form action="{{ route('noticeboard.create') }}" method="POST">
                @endif

                @csrf
                <div class="form-group">
                    <label><b>Date</b></label>
                    <input type="date" class="form-control" name="date"
                        value="{{ isset($edit_noticeboard) ? $edit_noticeboard->date : old('date') }}">
                    <span class="text-danger">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label><b>Description</b></label>
                    <textarea class="editor" name="editor2">{{ isset($edit_noticeboard) ? $edit_noticeboard->description : old('editor2') }}</textarea>
                    <span class="text-danger">
                        @error('editor2')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if (isset($edit_noticeboard))
                    <button type="submit" class="btn btn-success">update</button>
                @else
                    <button type="submit" class="btn btn-success">Save</button>
                @endif

                </form>
            </div>
        </div>
    </div>

@stop
