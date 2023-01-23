<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('setting/' . $setting->favIcon_image) }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Login</title>
</head>

<style>
    #login-section .login-page .form{
        min-width: 388px;
    }
    .login_eye_wrapper {
        position: relative;
    }

    .login_eye_wrapper i {
        position: absolute;
        right: 13px;
        top: 20px;
    }
</style>

<body>
    <section id="login-section" style="background-image:url('{{ asset('setting/' . $setting->loginBg_images) }}')">
        <div class="login-page">
            <div class="form">

                <form class="login-form" action="{{ route('admin-login') }}" method="POST">
                    @csrf
                    <div class="login_title text-center">
                        <h3>Login Form</h3>
                    </div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Username" />
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="login_eye_wrapper">
                        <input type="password" name="password" placeholder="Password" id="test-input" />
                        <i class="fa fa-eye" aria-hidden="true" id="check"></i>
                    </div>
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>

                    <button class="btn-login" type="submit">login</button>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- <script>
        $('.message a').click(function() {
            $('form').animate({
                height: "toggle",
                opacity: "toggle"
            }, "slow");
        });
    </script> -->
    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
    <script type='text/javascript'>
        $('#check').click(function() {
            if ('password' == $('#test-input').attr('type')) {
                $('#test-input').prop('type', 'text');
                $('#check').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            } else {
                $('#test-input').prop('type', 'password');
                $('#check').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }
        });
    </script>
</body>

</html>
