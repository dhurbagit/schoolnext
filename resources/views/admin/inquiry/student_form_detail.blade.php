<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('backend/assets/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student Application Form</title>
</head>

<body>
    <section id="form_view">
        <div
            class="print__button-holder text-end d-flex flex-wrap align-items-center justify-content-lg-end justify-content-end bg-warning p-1 pe-3 sticky-top">
            <div class="container px-5">
                <span class="text-light small">To print the document click the button </span>
                <button class="btn btn-light text-warning ms-3 ps-3 pe-3" id="lnkPrint">Print</button>
            </div>
        </div>
        <div class="container">
            <div class="form_header mt-3 px-2">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                        <div class="logo d-flex justify-content-center">
                            <div class="img_logo">
                                <img src="{{ asset('setting/' . $setting->logo) }}" alt="No logo here" width="100%"
                                    height="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                        <div class="college_description text-center pt-5">

                            <div class="top_2">
                                <h3>{{ $setting->school_name }}</h3>
                                <span>{{ $setting->address }} | {{ $setting->Phone_one }}</span><br><br>
                                <span>{{ $setting->email }}</span>

                            </div>
                            <!-- <div class="top_3">
                                <span>Master of Business Administration(MBA) / MBA-Evening
                                    Program(MBA-EP)/MBA-Jobholders/
                                    MBA-Finance / MBA-Global Business / EMBA / Masters of Computer Information
                                    System(MCIS)
                                    / Masters of heaslth Care Management (MHCM)</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12">
                        <div class="photo-upload">
                            <div class="img-holder form-group d-flex justify-content-center mb-1">
                                <img src="{{asset('uploads/'. $std_detail->s_image)}}"
                                    class="input__image-holder" alt="" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="reg__no-holder">
                <span>Registeration Number/Roll No: (To be filled by the college):
                    ...................................................</span>
            </div>
            <div class="form__personal-details">
                <h5>Personal Details</h5>
                <table class="table table-bordered mb-5 w-100">
                    <tr>
                        <td>Name(CAPITAL LETTERS)</td>
                        <td colspan="6">{{ $std_detail->student_name }}</td>
                    </tr>
                    <tr>
                        <td>Applied Grade</td>
                        <td>{{ $std_detail->s_applied_grade }}</td>
                        <td colspan="2">Current Grade</td>
                        <td>{{ $std_detail->s_current_grade }}</td>
                        <td>Age</td>
                        <td>{{ $std_detail->s_age }}</td>

                    </tr>
                    <tr>
                        <td>Date of Birth (D/M/Y)</td>
                        <td style="width: 9%;">BS</td>
                        <td>{{ $std_detail->s_date_of_birth_bs }}</td>
                        <td style="width: 9%;">AD</td>
                        <td>{{ $std_detail->s_date_of_birth_ad }}</td>
                        <td>Gender</td>
                        <td>{{ $std_detail->gender }}</td>
                    </tr>
                    <tr>

                        <td>Contact number</td>
                        <td>{{ $std_detail->s_phone }}</td>
                        <td>Email</td>
                        <td colspan="2">{{ $std_detail->s_email }}</td>
                        <td>Nationality</td>
                        <td colspan="2">{{ $std_detail->s_nationality }}</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Father's Detail</td>
                        <td colspan="3">{{ $std_detail->f_name }}</td>
                        <td>Occupation</td>
                        <td colspan="2">{{ $std_detail->f_occupation }}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td colspan="2">{{ $std_detail->f_mobile_no }}</td>
                        <td>Email</td>
                        <td colspan="2">{{ $std_detail->f_email }}</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Mother's Details</td>
                        <td colspan="3">{{ $std_detail->m_name }}</td>
                        <td>Occupation</td>
                        <td colspan="2">{{ $std_detail->m_occupation }}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td colspan="2">{{ $std_detail->m_mobile_no }}</td>
                        <td>Email</td>
                        <td colspan="2">{{ $std_detail->m_email }}</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Guardian's Detail</td>
                        <td colspan="3">{{ $std_detail->l_local_guardian }}</td>
                        <td>Occupation</td>
                        <td colspan="2">{{ $std_detail->l_occupation }}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td colspan="2">{{ $std_detail->l_mobile_no }}</td>
                        <td>Email</td>
                        <td colspan="2">{{ $std_detail->l_email }}</td>
                    </tr>

                </table>
                <h5>Previous School's Information</h5>
                <table class="table table-bordered mb-0 w-100">
                    <tr>
                        <td>School Name</td>
                        <td>{{ $std_detail->p_school_name }}</td>
                        <td>Grade</td>
                        <td>{{ $std_detail->p_grade }}</td>
                        <td>Address</td>
                        <td>{{ $std_detail->p_address }}</td>
                    </tr>
                    <tr>
                        <td>Query</td>
                        <td colspan="5">{{ strip_tags($std_detail->p_description) }}</td>
                    </tr>
                </table>
                <div class="msg_holder">
                    <span>Note: I hereby declare that the details given above are correct and I bear the sole responsibility
                        for
                        disqualifying my application due to incomplete or incorrect information. I unconditionally agree
                        to
                        abide by the rules and regulations of Pokhara University.</span>
                </div>
            </div>
            <div class="sign__date-holder d-flex justify-content-between mb-5 flex-wrap">
                <div class="signature">
                    <!-- <p class="mb-0">.........................................</p> -->
                    <p class="auth_text">Applicat's Signature</p>
                </div>
                <div class="date_holder">
                    <p class="auth_text">Date</p>
                </div>
            </div>
            <div class="verification__section">
                <h5 class="mb-4">Official Use Only</h5>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span class="verify">Verification by Account Section:</span>
                    </div>
                    <div class="col-md-3 text-md-end text-sm-start">
                        <span class="sign">Signature: .........................................</span>
                    </div>
                    <div class="col-md-3 text-md-end text-sm-start">
                        <span class="date2">Date: .........................................</span>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <span class="verify2">Verification by Respective College Principal:</span>
                    </div>
                    <div class="col-md-3 text-md-end text-sm-start">
                        <span class="sign2">Signature: .........................................</span>
                    </div>
                    <div class="col-md-3 text-md-end text-sm-start">
                        <span class="date3">Date: .........................................</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="{{ asset('backend/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#lnkPrint').click(function() {
                window.print();
            });
        });
    </script>

</body>

</html>
