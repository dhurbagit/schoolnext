@extends('admin.layout.master')

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Table</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive_under">
                    <table class="table m-b-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th style="width:250px">Description</th>
                                <th>Images</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonial as $key => $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Str::ucfirst($value->title) }}</td>
                                    <td width="200px">{{ $value->designation }}</td>
                                    <td>{!! Str::substr($value->description, 0, 140) !!}</td>
                                    <td>
                                        <img class="avatar text-white" src="{{ asset('testimonial/' . $value->images) }}"
                                            alt="">
                                    </td>
                                    <td>
                                        @if ($value->hide == 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('testimonial.edit', $value->id)}}" class="btn btn-danger">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_{{$value->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_{{$value->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete it.</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action="{{route('testimonial.delete', $value->id)}}" method="POST">
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
