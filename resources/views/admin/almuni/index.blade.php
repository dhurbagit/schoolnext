@extends('admin.layout.master')
@section('pageTitle', 'Pass Out student')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Almuni</h4>
                    {{-- <a href="{{ route('almuni.create') }}" class="btn btn-success">Create New</a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card_parent">
                            @if (isset($edit_record))
                                <form action="{{ route('almuni.update', $edit_record->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                @else
                                    <form action="{{ route('almuni.save') }}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf

                            <div class="form-group">
                                <label for="">Year</label>
                                <input class="form-control" type="number" name="title"
                                    value="{{ isset($edit_record) ? $edit_record->title : old('title') }}">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Batch Year</label>
                                <input class="form-control" type="text" name="date"
                                    value="{{ isset($edit_record) ? $edit_record->date : old('date') }}">
                                <span class="text-danger">
                                    @error('date')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="submit_button_cover text-center">
                                @if (isset($edit_record))
                                <button class="btn btn-sm btn-success" style="width:90px;">Update</button>
                            @else
                                <button class="btn btn-sm btn-success" style="width:90px;">Save</button>
                            @endif
                            </div>


                            </form>
                        </div>
                        <div class="card_child">
                            @if (isset($edit_gallery))
                                <form action="{{ route('almuni.gallery.update', $edit_gallery->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                @else
                                    <form action="{{ route('almuni.gallery.save') }}" method="POST"
                                        enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="form-group">
                                <select class="js-example-basic-single select2 form-control" name="almuni_id"
                                    id="almuni_id">
                                    <option selected>--select--</option>
                                    @foreach ($t_list as $type)
                                        <option
                                            value="{{ $type->id }}"{{ @$edit_gallery->almuni_id === $type->id ? 'selected' : '' }}>
                                            {{ $type->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="flex_wrapper">
                                    <div class="image-frame">
                                        <img @if (@isset($edit_gallery)) src="{{ asset('uploads/' . $edit_gallery->image) }}"
                                            @endisset
                                        alt="">
                                    </div>
                                    <input class="form-control images_o" type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ isset($edit_gallery) ? $edit_gallery->name : old('name') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Batch</label>
                                <input type="text" class="form-control" name="batch" value="{{ isset($edit_gallery) ? $edit_gallery->batch : old('batch') }}" id="response_batch" readonly="readonly">

                            </div>
                            <div class="form-group">
                                <label for="">Percentage</label>
                                <input type="text" name="percentage" value="{{ isset($edit_gallery) ? $edit_gallery->percentage : old('percentage') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Class</label>
                                <input type="text" name="class" value="{{ isset($edit_gallery) ? $edit_gallery->class : old('class') }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" name="hide_show"
                                     @isset($edit_gallery)
                                     @if ($edit_gallery->hide == 1)
                                     checked @endif
                                        @endisset>
                                    <label class="custom-control-label" for="customSwitch3">Hide/Show</label>
                                </div>
                            </div>
                            <div class="submit_button_cover text-center">
                                @if (isset($edit_gallery))
                                <button class="btn btn-sm btn-success" style="width:90px;">Update</button>
                            @else
                                <button class="btn btn-sm btn-success" style="width:90px;">Save</button>
                            @endif
                            </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:36px">#</th>
                                        <th>Year</th>
                                        <th>Batch</th>
                                        <th>Count</th>
                                        <th width="99px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{$data->A_images->count('image')}} --}}
                                    @foreach ($t_list as $key => $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>{{ $data->date }}</td>
                                            <td>{{ $data->A_images->count('image') }} /Student's</td>
                                            <td>
                                                <a href="{{ route('almuni.edit', $data->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal_{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $data->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you
                                                                    sure
                                                                    you want
                                                                    to delete!</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form action="{{ route('almuni.delete', $data->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Yes</button>
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
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width:36px">#</th>
                                        <th width="52px">Image</th>
                                        <th>Name</th>
                                        <th>Batch</th>
                                        <th>Percentage</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th width="99px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{$data->A_images->count('image')}} --}}
                                    @foreach ($almuni_child as $key => $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('uploads/' . $data->image) }}" width="30px"
                                                    height="30px" alt="">
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->batch }}</td>
                                            <td>{{ $data->percentage }}</td>
                                            <td>{{ $data->class }}</td>
                                            <td>

                                                @if ($data->hide == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Deactive</span>
                                                @endif

                                            </td>

                                            <td>
                                                <a href="{{ route('almuniGallery.edit', $data->id) }}"
                                                    class="btn btn-success">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal_almuni{{ $data->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_almuni{{ $data->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you
                                                                    sure
                                                                    you want
                                                                    to delete!</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('almuniGallery.remove', $data->id) }}"
                                                                    method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Yes</button>
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
                            <div class="dashboard_pagination_table">
                                {{$almuni_child->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        $(document).on('change', '.images_o', function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {

                    //get closest div and then find img add img there
                    $(input).siblings().find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        //selecting automatic data for child form.
        $(document).on('change', '#almuni_id', function() {
            var value = $(this).val();
            $.ajax({
                type: 'POST',
                url: "{{route('select_data')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    value: value,
                },
                success: function(res){
                    $('#response_batch').val(res);
                }
            })
        })
    </script>
@endpush
