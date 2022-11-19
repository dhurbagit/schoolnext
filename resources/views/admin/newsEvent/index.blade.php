@extends('admin.layout.master')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">News and event Table</h4>
                    <a href="{{ route('newsEvent.create') }}" class="btn btn-primary">Create view</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>Date</th>
                                <th>image</th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsevent_list as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->date }}</td>
                                    <td><img src="{{ asset('NewsEvent/' . $value->images) }}" class="avatar text-white"
                                            alt=""></td>
                                    <td>
                                        <a href="{{ route('newsevent.edit', $value->id) }}" class="btn btn-danger"><i
                                                class="fas fa-edit"></i></a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_neDelete{{ $value->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_neDelete{{ $value->id }}" tabindex="-1"
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
                                                        <form action="{{ route('news.event.delete', $value->id) }}"
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
