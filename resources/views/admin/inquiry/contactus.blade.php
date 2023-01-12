@extends('admin.layout.master')
@section('pageTitle', 'Contact Us')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Contact Us</h5>

                </div>
            </div>
            <div class="card-body">
              <div class="table-responsive_cs">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>address</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th width="147px">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contactus as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->student_name }}</td>
                                <td>{{ $data->s_email }}</td>
                                <td>{{ $data->s_phone }}</td>
                                <td>{{ $data->s_address }}</td>
                                <td>{{ $data->p_description }}</td>

                                <td>
                                    {{Carbon\Carbon::parse($data->created_at)->format('d-M-y')}}

                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal_reply{{ $data->id }}">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_reply{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Contact Us Info</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <dl class="contact_dl">
                                                        <dt>Name:</dt>
                                                        <dd>{{ $data->student_name }}</dd>
                                                        <dt>Email:</dt>
                                                        <dd>{{ $data->s_email }}</dd>
                                                        <dt>Phone:</dt>
                                                        <dd>{{ $data->s_phone }}</dd>
                                                        <dt>Address</dt>
                                                        <dd>{{ $data->s_address }}</dd>
                                                    </dl>
                                                    <label for=""><b>Message</b></label><br>
                                                    {{ $data->p_description }}
                                                    <br><br>
                                                    <label for=""><b>Leave Message</b></label>
                                                    <form action="{{ route('contactUs.reply', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <textarea name="email_message" class="editor form-control" id="" cols="30" rows="10"></textarea>
                                                        <br>
                                                        <button class="btn btn-success" type="submit">Reply</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal_{{ $data->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Contact Us Info</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <dl class="contact_dl">
                                                        <dt>Name:</dt>
                                                        <dd>{{ $data->student_name }}</dd>
                                                        <dt>Email:</dt>
                                                        <dd>{{ $data->s_email }}</dd>
                                                        <dt>Phone:</dt>
                                                        <dd>{{ $data->s_phone }}</dd>
                                                        <dt>Address</dt>
                                                        <dd>{{ $data->s_address }}</dd>
                                                    </dl>
                                                    <label for=""><b>Message</b></label><br>
                                                    {{ $data->p_description }}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal_delete{{ $data->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_delete{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want
                                                        to delete!</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
                                                    <form action="{{ route('contactUs.delete', $data->id) }}"
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
        <div class="dashboard_pagination_table">
            {{$contactus->links()}}
        </div>
    </div>
@stop
