@extends('admin.layout.master')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">Online form Applications</h5>
                    <a href="{{ route('Almuni.view') }}" class="btn btn-success">List New</a>
                </div>
            </div>
            <div class="card-body">
                <table id="example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Applied Grade</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Father Name</th>
                            <th>local mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lists as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->student_name }}</td>
                                <td>{{ $data->s_applied_grade }}</td>
                                <td>{{ $data->s_address }}</td>
                                <td>{{ $data->s_phone }}</td>
                                <td>{{ $data->f_name }}</td>
                                <td>{{ $data->l_mobile_no }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModal_online{{ $data->id }}">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_online{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Online form Reply</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">




                                                    <label for=""><b>Leave Message</b></label>
                                                    <form action="" method="POST">
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
                                        data-target="#exampleModal_reply{{ $data->id }}">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal_reply{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Online Form Applications Info
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <dl class="online_form_info">
                                                        <dt>Name of the Applicant (Full Name) </dt>
                                                        <dd>{{$data->student_name}}</dd>
                                                        <dt>Applied for Grade</dt>
                                                        <dd>{{$data->s_applied_grade}}</dd>
                                                        <dt>Current Grade</dt>
                                                        <dd>{{$data->s_current_grade}}</dd>
                                                        <dt>Gender</dt>
                                                        <dd>{{$data->gender}}</dd>
                                                        <dt>Nationality</dt>
                                                        <dd>{{$data->s_nationality}}</dd>
                                                        <dt>Email</dt>
                                                        <dd>{{$data->s_email}}</dd>
                                                        <dt>Date of birth(BS):</dt>
                                                        <dd>{{$data->s_date_of_birth_bs}}</dd>
                                                        <dt>Date of birth(AD):</dt>
                                                        <dd>{{$data->s_date_of_birth_ad}}</dd>
                                                        <dt>Age:</dt>
                                                        <dd>{{$data->s_age}}</dd>
                                                        <dt>Address:</dt>
                                                        <dd>{{$data->s_address}}</dd>
                                                        <dt>Phone :</dt>
                                                        <dd>{{$data->s_phone}}</dd>
                                                        <dt>Father's Name</dt>
                                                        <dd>{{$data->f_name}}</dd>
                                                        <dt>Email:</dt>
                                                        <dd>{{$data->f_email}}</dd>
                                                        <dt>Mobile No.:</dt>
                                                        <dd>{{$data->f_mobile_no}}</dd>
                                                        <dt>Occupation</dt>
                                                        <dd>{{$data->f_occupation}}</dd>
                                                        <dt>Mother's Name *:</dt>
                                                        <dd>{{$data->m_name}}</dd>
                                                        <dt>Mobile No.:</dt>
                                                        <dd>{{$data->m_mobile_no}}</dd>
                                                        <dt>Email:</dt>
                                                        <dd>{{$data->m_email}}</dd>
                                                        <dt>Occupation</dt>
                                                        <dd>{{$data->m_occupation}}</dd>
                                                        <dt>Local Guardian</dt>
                                                        <dd>{{$data->l_local_guardian}}</dd>
                                                        <dt>Mobile No</dt>
                                                        <dd>{{$data->l_mobile_no}}</dd>
                                                        <dt>Email</dt>
                                                        <dd>{{$data->l_email}}</dd>
                                                        <dt>Occupation</dt>
                                                        <dd>{{$data->l_occupation}}</dd>
                                                        <dt>School Name:</dt>
                                                        <dd>{{$data->p_school_name}}</dd>
                                                        <dt>Address</dt>
                                                        <dd>{{$data->p_address}}</dd>
                                                        <dt>Grade</dt>
                                                        <dd>{{$data->p_grade}}</dd>
                                                        <dt>Message</dt>
                                                        <dd>{{$data->p_description}}</dd>

                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-primary"><i class="fas fa-trash"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
