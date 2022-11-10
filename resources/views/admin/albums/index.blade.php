@extends('admin.layout.master')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Basic Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table m-b-0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Images</th>
                            <th>counter</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $key => $album)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($album->title) }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $album->image) }}" alt="" height="50px"
                                    width="50px">
                            </td>
                            <td>{{ $album->images->count('image') }} /Photo's</td>
                            <td>
                                @if ($album->publish_status == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('album.edit', $album->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i></a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_{{$key}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal_{{$key}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                              <form action="{{route('album.delete', $album->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-success">Yes</button>
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
