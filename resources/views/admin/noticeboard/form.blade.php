@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> Basic Inputs</div>
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
                    <label>Date</label>
                    <input type="date" class="form-control" name="date"
                        value="{{ isset($edit_noticeboard) ? $edit_noticeboard->date : old('date') }}">
                    <span class="text-danger">
                        @error('date')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="editor2">{{ isset($edit_noticeboard) ? $edit_noticeboard->description : old('editor2') }}</textarea>
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
