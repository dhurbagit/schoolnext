@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Manage Slider</h3>
                        <a href="{{route('create-slider')}}" class="create_link btn btn-info"><i class="fas fa-plus"></i>&nbsp;Create Slider</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Title</th>
                                <th>Images</th>
                                <th style="width: 40px">Status</th>
                                <th style="width: 125px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider_data as $key => $slider)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td><img class="table_images" src="{{ asset('slider/' . $slider->image) }}"
                                            alt=""></td>
                                    <td>
                                        @if ($slider->hide == 0)
                                            <span class="badge bg-danger">Deactive</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif

                                    </td>
                                    <td>

                                        <a class="btn btn-danger" href="{{route('slider.edit',$slider->id)}}"><i class="fas fa-edit"></i></a> |
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $slider->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $slider->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Are You Sure you
                                                            want to delete</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action="{{ route('delete.slider', $slider->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-primary"
                                                                data-bs-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-danger">Yes</button>
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
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                   {{$slider_data->links()}}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop
