@extends('admin.layout.master')
@section('pageTitle', 'Youtube videos')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Youtube Video</h4>
                    <a href="{{ route('youtube.create') }}" class="btn btn-success">Create New</a>
                </div>
            </div>
            <div class="card-body">


                <div class="table-responsive">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light" >
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>Video Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($youtube_list as $lists)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lists->title }}</td>
                                    <td><a href="{{ $lists->video }}">Link</a></td>
                                    <td>
                                        @if ($lists->hide == 1)
                                            <span class="badge badge-success">Acive</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('youtube.edit', $lists->id)}}" class="btn btn-success">
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
                                                        <form action="{{ route('youtube.delete', $lists->id) }}"
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
