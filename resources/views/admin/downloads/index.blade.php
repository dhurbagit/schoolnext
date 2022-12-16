@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h4 class="card-title">Almuni </h4>
                    <a href="{{ route('Almuni.view') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card_parent">
                            @if (isset($edit_record))
                                <form action="{{ route('download.update', $edit_record->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                @else
                                    <form action="{{ route('download.save') }}" method="POST"
                                        enctype="multipart/form-data">
                            @endif
                            @csrf

                            <div class="form-group">
                                <b>Category Name</b><br><br>
                                <label for="">Title</label>
                                <input class="form-control" type="text" name="title"
                                    value="{{ isset($edit_record) ? $edit_record->title : old('title') }}">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            @if (isset($edit_record))
                                <button class="btn btn-sm btn-success">Update</button>
                            @else
                                <button class="btn btn-sm btn-success">Save</button>
                            @endif

                            </form>
                        </div>
                        <div class="card_parent">

                            @if (isset($edit_downloadGallery))
                                <form action="{{ route('g_downloads.update', $edit_downloadGallery->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @method('put')
                                @else
                                    <form action="{{ route('g_downloads.save') }}" method="POST"
                                        enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="form-group">
                                <b>Create Files</b><br><br>
                                <select class="js-example-basic-single select2 form-control" name="download_id">
                                    <option>--select--</option>
                                    @foreach ($lists as $options)
                                        <option value="{{ $options->id }}"
                                            {{ $options->id == @$edit_downloadGallery->download_id ? 'selected' : '' }}>
                                            {{ $options->title }}</option>
                                    @endforeach

                                </select>
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">

                                <label for="">Title</label>
                                <input class="form-control" type="text" name="title"
                                    value="{{ isset($edit_downloadGallery) ? $edit_downloadGallery->title : old('title') }}">
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Cover Image</label>
                                <div class="flex_wrapper">
                                    <div class="image-frame">
                                        <img @if (@isset($edit_downloadGallery)) src="{{ asset('uploads/' . $edit_downloadGallery->image) }}"
                                            @endisset
                                        alt="">
                                    </div>
                                    <input class="form-control images_o" type="file" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">File</label>
                                <div class="flex_wrapper">
                                    <div class="image-frame">
                                        <img src="{{ asset('backend/document.png') }}" alt="" id="output">
                                    </div>
                                    <input class="form-control" type="file" name="file">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" name="date" value="{{ isset($edit_downloadGallery) ? $edit_downloadGallery->date : old('date') }}" class="form-control">
                            </div>

                            @if (isset($edit_downloadGallery))
                                <button class="btn btn-sm btn-success">Update</button>
                            @else
                                <button class="btn btn-sm btn-success">Save</button> @endif
                                            </form>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <label for=""><b>Category</b></label>
                                    <table id="example">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Counts</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($lists as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->title }}</td>
                                                    <td>{{ $data->d_gallery->count('image') }}</td>
                                                    <td>
                                                        <a href="{{ route('download.edit', $data->id) }}"
                                                            class="btn btn-success">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModal_{{ $data->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal_{{ $data->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Are
                                                                            you
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
                                                                            action="{{ route('download.delete', $data->id) }}"
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
                                    <hr>
                                    <label for=""><b>File Items</b></label>
                                    <table id="example1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>File</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_gallery as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td><img src="{{ asset('uploads/' . $data->image) }}" width="50"
                                                            height="50" alt=""></td>
                                                    <td>{{ $data->title }}</td>
                                                    <td></td>
                                                    <td>{{ $data->date }}</td>
                                                    <td>
                                                        <a href="{{ route('g_downloads.edit', $data->id) }}"
                                                            class="btn btn-success">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModal_children{{ $data->id }}">
                                                            <i class="fas fa-trash"></i>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade"
                                                            id="exampleModal_children{{ $data->id }}" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Are
                                                                            you
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
                                                                            action="{{ route('g_downloads.delete', $data->id) }}"
                                                                            method="POST">
                                                                            @method('delete')
                                                                            @csrf
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
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
            @endpush
