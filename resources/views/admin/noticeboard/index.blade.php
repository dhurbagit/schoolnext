@extends('admin.layout.master')
@section('pageTitle', 'Notice Board')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Notice board</h5>
                    <a href="{{route('create.notice')}}" class="btn btn-primary">Create New</a>
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive_one">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th style="width:50%">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_noticeboard as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>
                                        <a href="{{route('noticeboard.edit', $value->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_DELETE{{$value->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_DELETE{{$value->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                            to delete!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action="{{route('delete.noticeboard', $value->id)}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
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
