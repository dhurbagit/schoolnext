@extends('admin.layout.master')
@section('pageTitle', 'Theme Options')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Job Vacancy</h5>

                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="table_custom_wrapper">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>

                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($vacancy_list as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>

                                                <td><a class="badge badge-success" target="_blank"
                                                        href="{{ asset('uploads/' . $data->file) }}"><i class="fa fa-eye"
                                                            aria-hidden="true"></i>&nbsp;view</a></td>
                                                <td>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal_{{ $data->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal_{{ $data->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Are you
                                                                        sure you want
                                                                        to delete it.</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <form action="{{ route('vacancy.delete', $data->id) }}"
                                                                        method="POST">
                                                                        @method('delete')
                                                                        @csrf
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">yes</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        @if (isset($vacancy_update))
                            <form action="{{ route('vacancydetail.update' , $vacancy_update->id ) }}" method="POST">
                                @method('put')
                        @else
                            <form action="{{ route('vacancydetail.save') }}" method="POST">
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for=""><b>Title</b></label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ isset($vacancy_update) ? $vacancy_update->title : old('title') }}">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for=""><b>Background color</b></label>
                                    <input type="color" class="form-control" name="bg_color"
                                        value="{{ isset($vacancy_update) ? $vacancy_update->bg_color : old('bg_color') }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if(isset($vacancy_update))
                                <button class="btn btn-success">Update</button>
                                @else
                                <button class="btn btn-success">Save</button>
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
