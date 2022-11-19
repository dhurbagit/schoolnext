@extends('admin.layout.master')
@section('content')

    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Slider Table</h4>
                    <a href="{{ route('create-slider') }}" class="btn btn-primary">Create New</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Images/Video</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slider_data as $key => $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>
                                        {{-- @dd($slider->getClientOriginalExtension()) --}}
                                        <img class="table_images" src="{{ asset('slider/' . $slider->image) }}"
                                            alt="">
                                    </td>
                                    <td>
                                        @if ($slider->hide == 0)
                                            <span class="badge bg-danger">Deactive</span>
                                        @else
                                            <span class="badge bg-success">Active</span>
                                        @endif

                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{{ route('slider.edit', $slider->id) }}"><i
                                                class="fas fa-edit"></i></a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_{{ $slider->id }}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_{{ $slider->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are You Sure you
                                                            want to delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('delete.slider', $slider->id) }}"
                                                            method="POST">
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
            </div>
        </div>
    </div>
@stop
