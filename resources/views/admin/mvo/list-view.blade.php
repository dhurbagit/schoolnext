@extends('admin.layout.master')
@section('pageTitle', 'Mission,vision,objectives')
@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Vision Mission objective</h5>
                    <a href="{{route('mvo.view')}}" class="btn btn-primary">Ceate Mvo</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive1">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th width= "700">Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mov_list as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucfirst($value->title) }}</td>
                                    <td>{!! $value->description !!}</td>
                                    <td>
                                        <a href="{{route('mvo.edit', $value->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i></a>
                                        <!-- Modal -->

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_delete{{$value->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_delete{{$value->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('mvo.delete', $value->id) }}" method="POST">
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
