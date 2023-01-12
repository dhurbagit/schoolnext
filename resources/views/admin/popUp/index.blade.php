@extends('admin.layout.master')
@section('pageTitle', 'Pop Up Model')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Pop up Modal</h5>
                    <a href="{{ route('popup.create') }}" class="btn btn-primary">Create New</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width = "200">Title</th>
                                <th>Images</th>
                                <th>File</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lists as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->modal_title }}</td>
                                    <td><img src="{{ asset('uploads/' . $data->image) }}" width="50px" height="50px"
                                            alt=""></td>
                                    <th>
                                        @if (empty($data->file))
                                            <a href="javascript:void(0)">&nbsp;No File</a>
                                        @else
                                            <a href="{{ asset('uploads/' . $data->file) }}" target="_blank"><i
                                                    class="fa fa-eye" aria-hidden="true"></i>&nbsp;View</a>
                                        @endif
                                    </th>
                                    <td>
                                        @if ($data->hide == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('popUpmodal.edit', $data->id) }}" class="btn btn-danger"><i
                                                class="fas fa-edit"></i></a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_neDelete{{ $data->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_neDelete{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                            to delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action="{{ route('PopUpModal.delete', $data->id) }}"
                                                            method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-primary">Yes</button>
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
