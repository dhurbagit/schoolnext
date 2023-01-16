@extends('admin.layout.master')
@section('pageTitle', 'News and Events')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify_and_align">
                    <h5 class="text-uppercase mb-0 mt-0 page-title">New User Registration</h5>

                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (UserList() as $data)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                @if ($data->email != 'allstarsms45@gmail.com')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal_neDelete{{ $data->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                @endif
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_neDelete{{ $data->id }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure
                                                                    you want
                                                                    to delete</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <form action="{{ route('user.delete', $data->id) }}"
                                                                    method="post">
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
                    </div>
                    <div class="col-lg-4">
                        <div class="registration_wrapper">
                            <form action="{{ route('user.registration') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for=""><b>User Name</b></label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ isset($editUser) ? $editUser->name : old('name') }}">
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Email Address</b></label>
                                    <input type="email" class="form-control" name="email">
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Password</b></label>
                                    <div class="input_wrap">
                                        <input type="password" class="form-control" name="password" id="test-input">
                                        <i class="fa fa-eye-slash" aria-hidden="true" id="check"></i>
                                    </div>
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for=""><b>Confirm Password</b></label>
                                    <div class="input_wrap">
                                        <input type="password" class="form-control" name="password_confirmation" id="Ptest-input">
                                        <i class="fa fa-eye-slash" aria-hidden="true" id="Pcheck"></i>
                                    </div>

                                    <span class="text-danger">
                                        @error('confirmed-password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <button type="submit" class="btn btn-success">Register user</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
@push('scripts')
    <script type='text/javascript'>
        $('#check').click(function() {
            if ('password' == $('#test-input').attr('type')) {
                $('#test-input').prop('type', 'text');
                $('#check').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                $('#test-input').prop('type', 'password');
                $('#check').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        });
    </script>
    <script type='text/javascript'>
        $('#Pcheck').click(function() {
            if ('password' == $('#Ptest-input').attr('type')) {
                $('#Ptest-input').prop('type', 'text');
                $('#Pcheck').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                $('#Ptest-input').prop('type', 'password');
                $('#Pcheck').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        });
    </script>
@endpush
