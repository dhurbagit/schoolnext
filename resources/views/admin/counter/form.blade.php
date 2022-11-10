@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title"> Basic Inputs</div>
            </div>
            <div class="card-body">
                @if (isset($edit_counter))
                    <form action="{{ route('counter.update', $edit_counter->id) }}" method="post">
                        @method('put')
                    @else
                        <form action="{{ route('counter.create') }}" method="post">
                @endif

                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"
                        value="{{ isset($edit_counter) ? $edit_counter->title : old('title') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <label>Counter Number</label>
                    <input type="number" class="form-control" name="counter_number"
                        value="{{ isset($edit_counter) ? $edit_counter->counter_number : old('counter_number') }}">
                    <span class="text-danger">
                        @error('title')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                @if(isset($edit_counter))
                <button type="submit" class="btn btn-success">Update</button>
                @else
                <button type="submit" class="btn btn-success">Save</button>
                @endif
                </form>
            </div>
        </div>
    </div>
@stop
