@extends('admin.layout.master')
@section('pageTitle', 'School Life')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">School Life</h4>
                    <a href="{{ route('schoollife.create') }}" class="btn btn-success">Create New</a>
                </div>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Feature Images</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $lists)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$lists->title}}</td>
                                    <td>{{ Str::limit(strip_tags($lists->description, 100))}}</td>
                                    <td><img src="{{asset('uploads/'. $lists->featured_image)}}" alt="" width="50" height="50"></td>

                                    <td>
                                        <a href="{{route('schoollife.edit', $lists->id)}}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_{{ $lists->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_{{ $lists->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure
                                                            you want
                                                            to delete!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action="{{ route('schoollife.delete', $lists->id) }}"
                                                            method="POST">
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
