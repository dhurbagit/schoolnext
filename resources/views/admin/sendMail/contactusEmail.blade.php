<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <style>
        .datadefination dt {
            float: left;
            width: 15%;
        }

        .datadefination dd {
            width: 85%;
        }

        .wrapper_class {
            border: 1px solid #0000002b;
            margin: 90px auto;
            padding: 25px;
        }

        .email_templete_company_logo img {
            height: 150px;
        }

        .email_templete_company_logo {
            height: 150px;
            width: 150px;
            overflow: hidden;
            border-radius: 50%;
            margin: 0 auto 60px;
        }
    </style>
    <div class="row">
        <div class="col-lg-7 m-auto">
            <div class="wrapper_class">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="email_templete_company_logo">
                            <img src="{{ asset('setting/' . $logo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <dl class="datadefination">
                            <dt>Name</dt>
                            <dd>{{ $student_name }}</dd>
                            <dt>Phone</dt>
                            <dd>{{ $s_phone }}</dd>
                            <dt>Address</dt>
                            <dd>{{ $s_address }}</dd>
                        </dl>
                    </div>
                    <div class="col-lg-12">
                        <label for=""><b>Message:</b></label><br>
                        {{ $email_message }}
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

{{-- @dd('THIS') --}}
