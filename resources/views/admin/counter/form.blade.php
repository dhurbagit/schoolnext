@extends('admin.layout.master')
@section('pageTitle', 'Happy Counter')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Counter</h5>
                    <h4 class="card-title"></h4>
                    <a href="{{route('manage.counter')}}" class="btn btn-primary">List view</a>
                </div>
            </div>
            <div class="card-body">
                @if (isset($edit_counter))
                    <form action="{{ route('counter.update', $edit_counter->id) }}" method="post">
                        @method('put')
                    @else
                        <form action="{{ route('counter.create') }}" method="post">
                @endif

                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input type="text" class="form-control" name="title"
                                value="{{ isset($edit_counter) ? $edit_counter->title : old('title') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><b>Counter Number</b></label>
                            <input type="number" class="form-control" name="counter_number"
                                value="{{ isset($edit_counter) ? $edit_counter->counter_number : old('counter_number') }}">
                            <span class="text-danger">
                                @error('title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
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
