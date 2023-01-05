@extends('admin.layout.master')
@section('pageTitle', 'Beyond Academic')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Beyond Academic</h5>
                    <a href="{{ route('create.academic') }}" class="btn btn-primary">Create New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive_off">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Feature images</th>
                                <th>Status</th>
                                <th>Gallery</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beyound_g as $key => $detail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $detail->title }}</td>
                                    <td>
                                        <img height="50" width="50"
                                            src="{{ asset('uploads/' . $detail->feature_image) }}" alt="">
                                    </td>
                                    <td>
                                        @if ($detail->hide == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $detail->text_title->count('images') }} /Photo's</td>
                                    <td>
                                        <a href="{{route('academic.update', $detail->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal_{{ $detail->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $detail->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                        to delete it.</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
                                                    <form action="{{route('academic.delete', $detail->id)}}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">yes</button>
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
    </div>

@stop
