@extends('admin.layout.master')
@section('pageTitle', 'FAQs')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Faq</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal_">
                        Create FAQ
                    </button>

                    <!-- Modal -->

                    <div class="modal fade" id="exampleModal_" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog cs_modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create FAQs</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-footer" style="display: block">
                                    <form action="{{ route('faq.save') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for=""><b>Question</b></label>
                                            <input type="text" class="form-control mb-2" name="faq_head">
                                            <span class="text-danger">
                                                @error('faq_head')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for=""><b>Answer</b></label>
                                            <textarea name="faq_detail" class="editor100" id="" cols="30" rows="10"></textarea>
                                            <span class="text-danger">
                                                @error('faq_detail')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="d-flex flex-collection">

                                            <div class="form-group mt-3">
                                                <div
                                                    class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch3"
                                                        name="hide_show" value="0">
                                                    <label class="custom-control-label"
                                                        for="customSwitch3">Hide/Show</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success mt-3">Save</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive_off">
                    <table class="table m-b-0" id="example">
                        <thead class="thead-light">
                            <tr>
                                <th>SN</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($faq_list as $key => $data)
                                <tr>
                                    <td> {{ $loop->iteration }}</td>
                                    <td>{{ $data->faq_head }}</td>
                                    <td>{!! Str::limit($data->faq_detail, 50, '...') !!}</td>
                                    <td>
                                        @if ($data->hide === 1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Deactive</span>
                                        @endif
                                    </td>
                                    <td> <a href="#" data-toggle="modal"
                                            data-target="#exampleModal_{{ $data->id }}" class="btn btn-danger">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- Modal -->

                                        <div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog cs_modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit FAQs</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-footer" style="display: block">
                                                        <form action="{{route('faq.update', $data->id)}}" method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for=""><b>Question</b></label>
                                                                <input type="text" class="form-control mb-2"
                                                                    name="faq_head"
                                                                    value="{{ isset($data) ? $data->faq_head : old('faq_head') }}">
                                                                <span class="text-danger">
                                                                    @error('faq_head')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for=""><b>Answer</b></label>
                                                                <textarea name="faq_detail" class="editor200 form-control" id="editor{{ $key }}" cols="30" rows="10">
                                                                    {{ isset($data) ? $data->faq_detail : old('faq_detail') }}
                                                                </textarea>
                                                                <span class="text-danger">
                                                                    @error('faq_detail')
                                                                        {{ $message }}
                                                                    @enderror
                                                                </span>

                                                            </div>
                                                            <div class="d-flex flex-collection">

                                                                <div class="form-group">
                                                                    <div
                                                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                                        <input type="checkbox"
                                                                            @isset($data)
                                                                            @if ($data->hide == 1)
                                                                            checked
                                                                            @endif
                                                                        @endisset
                                                                            class="custom-control-input"
                                                                            id="customSwitch{{ $data->id }}"
                                                                            name="hide_show">
                                                                        <label class="custom-control-label"
                                                                            for="customSwitch{{ $data->id }}">Hide/Show.</label>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-success mt-3"
                                                                    id="">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end model --}}
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_delete{{ $key }}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_delete{{ $key }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('faq.delete', $data->id) }}"
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

@push('scripts')
<script>
     for(let index = 0; index <= {{ $faq_list->count()}}; index++){
        ClassicEditor
            .create(document.getElementById('editor'+index), {
                licenseKey: '',
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error('Oops, something went wrong!');
            });
     }
</script>

@endpush
