@extends('admin.layout.master')
@section('pageTitle', 'Happy Counter')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Counter</h5>
                    <a href="{{route('create.counter')}}" class="btn btn-primary">Create New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light" >
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Counter Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::ucfirst($value->title) }}</td>
                                    <td>{{ $value->counter_number }}</td>
                                    <td>
                                        <a href="{{route('counter.edit', $value->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i></a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_delete{{ $value->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_delete{{ $value->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
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
                                                        <form action="{{route('counter.delete', $value->id)}}" method="POST">
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
