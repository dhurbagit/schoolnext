@extends('admin.layout.master')
@section('pageTitle', 'Blogs')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Blog</h5>
                    <a href="{{ route('blog.create') }}" class="btn btn-success">Create New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="page_form">
                    @if(isset($update))
                    <form action="{{route('blog.title.update', $update->id)}}" method="post">
                    @else
                    <form action="{{route('blog.title.save')}}" method="post">
                    @endif
                        @csrf
                        <div class="form-group">
                            <label><b>Page Title</b></label>
                            <input class="form-control" type="text" name="page_title"
                                value="{{ isset($update) ? $update->page_title : old('page_title') }}">
                            <span class="text-danger">
                                @error('page_title')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label><b>Description</b></label>
                            <textarea name="page_description" class="editor" id="" cols="30" rows="10">
                                    {{ isset($update) ? $update->page_description : old('page_description') }}
                                </textarea>
                            <span class="text-danger">
                                @error('page_description')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        @if(isset($update))
                        <button type="submit" class="btn btn-success mb-5">Update</button>
                        @else
                        <button type="submit" class="btn btn-success mb-5">save</button>
                        @endif

                    </form>
                </div>
                <div class="table-responsive1">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th width="200px">Title</th>
                                <th width="187px">Description</th>
                                <th>Feature Images</th>
                                <th>Date</th>
                                <th width="200px">Designation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $lists)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $lists->title }}</td>
                                    <td>{{ Str::limit(strip_tags($lists->inner_description, 100)) }}</td>
                                    <td><img src="{{ asset('uploads/' . $lists->image) }}" alt="" width="50"
                                            height="50"></td>
                                    <td>{{ $lists->date }}</td>
                                    <td>{{ $lists->designation }}</td>
                                    <td>
                                        <a href="{{ route('blog.edit', $lists->id) }}" class="btn btn-success">
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
                                                        <form action="{{ route('blog.delete', $lists->id) }}"
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
