@extends('frontend.layout.master')
@section('pageTitle', 'Online Form')
@section('content')
    <style>
        .photo-upload .custom-file-label {
            background-color: {{ $themeOption->primary_color ?? '' }};
            color: #ffffff;
            padding: 7px;
            width: 9rem;
            border-radius: 5px;
        }

        .photo-upload .custom-file-label::after {
            display: none;
        }

        .photo-upload .img-holder {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 100%;
            width: 100%;
        }

        .photo-upload .img-holder .input__image-holder {
            width: 9rem;
            height: 8rem;
            border-radius: 5px;
        }
    </style>
    <main>
        <section id="form-section" class="section-margin">
            <div class="container">
                <div class="form-card">
                    <div class="card">
                        <div class="card-body p-5">
                            <form action="{{ route('inquiry.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="school__details text-center mb-4">
                                        <h2 class="mb-0">{{ $setting->school_name }}</h2>
                                        <p class="mb-0">{{ $setting->address }} | {{ $setting->Phone_one }}</p>
                                        <p class="mb-0">{{ $setting->email }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 input-image">
                                    <div class="photo-upload">
                                        <div class="img-holder form-group d-flex justify-content-center mb-1">
                                            <img src="{{asset('frontend/assets/Images/avatar-02.jpg')}}" class="input__image-holder" alt=""
                                                width="100%" height="100%">
                                        </div>
                                        <div class="text-center">
                                            <div class="btn-holder form-group mb-0">
                                                <div class="custom-file d-flex justify-content-center">
                                                    <input id="inputGroupFile02" type="file" name="s_image"
                                                        class="custom-file-input inputGroupFile02 d-none" id="customFile">
                                                    <label class="custom-file-label" for="inputGroupFile02">Choose
                                                        File</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p class="text-danger">Fields with (*) are compulsory.</p>

                                <div class="form-header mb-2">
                                    <span>STUDENT'S INFORMATION</span>
                                </div>
                                <div class="mb-2">
                                    <label for="text-form" class="form-label mb-0">Name of the Applicant (Full Name)
                                        <span class="text-danger">*</span>:</label>
                                    <input type="text" name="student_name" class="form-control" id="text-form"
                                        aria-describedby="emailHelp">
                                    <span class="text-danger">
                                        @error('student_name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="select-form1" class="form-label mb-0">Applied for Grade <span
                                                    class="text-danger">*</span>:</label>
                                            <select class="form-select" id="select-form1" name="s_applied_grade"
                                                aria-label="">
                                                <option selected hidden disabled>--select--</option>

                                                <option value="Nursery">PG</option>
                                                <option value="Nursery">Nursery</option>
                                                <option value="LKG">LKG</option>
                                                <option value="UKG">UKG</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                                <option value="5">Five</option>
                                                <option value="6">Six</option>
                                                <option value="7">Seven</option>
                                                <option value="8">Eight</option>
                                                <option value="9">Nine</option>

                                            </select>
                                            <span class="text-danger">
                                                @error('s_applied_grade')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form1" class="form-label mb-0">Current Grade <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" class="form-control" name="s_current_grade"
                                                id="text-form1" aria-describedby="emailHelp">
                                            <span class="text-danger">
                                                @error('s_current_grade')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <label for="#" class="pe-3">Gender:</label>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="flexRadioDefault1" value="male" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="radio" name="gender"
                                                    id="flexRadioDefault2" value="female">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="select-form2" class="form-label mb-0">Nationality:</label>
                                            <select name="s_nationality" class="form-select" id="select-form2">
                                                <option value="Afghan/Afghani" class="bg-white">Afghan/Afghani</option>
                                                <option value="Bangladeshi" class="bg-white">Bangladeshi</option>
                                                <option value="Chinese" class="bg-white">Chinese</option>
                                                <option value="Indian" class="bg-white">Indian</option>
                                                <option value="Kazakh/Kazakhstani " class="bg-white">Kazakh/Kazakhstani
                                                </option>
                                                <option selected="" value="Nepali" class="bg-white">Nepali</option>
                                                <option value="Pakistani" class="bg-white">Pakistani</option>
                                                <option value="Sri Lankan" class="bg-white">Sri Lankan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form3" class="form-label mb-0">Email:</label>
                                            <input type="email" class="form-control" id="text-form3"
                                                aria-describedby="emailHelp" name="s_email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="date-form1" class="form-label mb-0">Date of birth(BS):</label>
                                            <div class="icon-Wrapper">
                                                <input class="form-control" name="s_date_of_birth_bs" type="text"
                                                id="nepali-datepicker" aria-describedby="">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="date-form2" class="form-label mb-0">Date of birth(AD):</label>
                                            <input type="date" class="form-control" name="s_date_of_birth_ad"
                                                id="date-form2" aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form3" class="form-label mb-0">Age:</label>
                                            <input type="text" class="form-control" id="text-form5" name="s_age"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form6" class="form-label mb-0">Address <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" name="s_address" class="form-control" id="text-form6"
                                                aria-describedby="emailHelp">
                                            <span class="text-danger">
                                                @error('s_address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form7" class="form-label mb-0">Phone <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" name="s_phone" class="form-control" id="text-form7"
                                                aria-describedby="emailHelp">
                                            <span class="text-danger">
                                                @error('s_phone')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-header mb-2">
                                    <span>FATHER'S INFORMATION</span>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form8" class="form-label mb-0">Father's Name <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" name="f_name" class="form-control" id="text-form8"
                                                aria-describedby="emailHelp">
                                            <span class="text-danger">
                                                @error('f_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form9" class="form-label mb-0">Mobile No.:</label>
                                            <input type="text" name="f_mobile_no" class="form-control"
                                                id="text-form9" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form10" class="form-label mb-0">Email:</label>
                                            <input type="email" name="f_email" class="form-control" id="text-form11"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form12" class="form-label mb-0">Occupation:</label>
                                            <input type="text" name="f_occupation" class="form-control"
                                                id="text-form12" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-header mb-2">
                                    <span>MOTHER'S INFORMATION</span>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form13" class="form-label mb-0">Mother's Name <span
                                                    class="text-danger">*</span>:</label>
                                            <input name="m_name" type="text" class="form-control" id="text-form13"
                                                aria-describedby="emailHelp">
                                            <span class="text-danger">
                                                @error('m_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form14" class="form-label mb-0">Mobile No.:</label>
                                            <input name="m_mobile_no" type="text" class="form-control"
                                                id="text-form14" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form15" class="form-label mb-0">Email:</label>
                                            <input name="m_email" type="email" class="form-control" id="text-form15"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form16" class="form-label mb-0">Occupation:</label>
                                            <input name="m_occupation" type="text" class="form-control"
                                                id="text-form16" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-header mb-2">
                                    <span>LOCAL GUARDIAN'S INFORMATION</span>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form17" class="form-label mb-0">Local Guardian:</label>
                                            <input name="l_local_guardian" type="text" class="form-control"
                                                id="text-form17" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form18" class="form-label mb-0">Mobile No.:</label>
                                            <input name="l_mobile_no" type="text" class="form-control"
                                                id="text-form18" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form19" class="form-label mb-0">Email:</label>
                                            <input name="l_email" type="email" class="form-control" id="text-form19"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="select-form3" class="form-label mb-0">Occupation:</label>
                                             <input type="text" class="form-control" name="l_occupation">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-header mb-2">
                                    <span>PREVIOUS SCHOOL'S INFORMATION</span>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form20" class="form-label mb-0">School Name:</label>
                                            <input name="p_school_name" type="text" class="form-control"
                                                id="text-form20" aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form21" class="form-label mb-0">Address:</label>
                                            <input name="p_address" type="text" class="form-control" id="text-form21"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form22" class="form-label mb-0">Grade:</label>
                                            <input name="p_grade" type="text" class="form-control" id="text-form22"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea name="p_description" class="form-control" id="exampleFormControlTextarea1"
                                            placeholder="Write your query(If any)" rows="3"></textarea>
                                    </div>

                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <div class="d-flex">
                                            <div class="g-recaptcha"
                                                data-sitekey={{$setting->site_key ?? ''}}>
                                            </div>
                                            <br>
                                            @if (Session::has('g-recaptcha-response'))
                                                <span class="text-danger">{{ Session::get('g-recaptcha-response') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-end">
                                            <button class="btn btn-form px-4 py-2" type="submit">Apply
                                                Now</button>
                                            <button class="btn btn-reset px-4 py-2" type="reset">Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>
@stop
@push('scripts')
    <script>
        $('form').submit(function() {
            $(this).find('button[type=submit]').prop('disabled', true);
        });
    </script>
    <script>
        var loadFile3 = function(event) {
            var image = document.getElementById('placeholder_image3');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
    <script>
        $('.inputGroupFile02').on('change', function(e) {
            if (e.target.files.length) {
                // $(this).next('.custom-file-label').html(e.target.files[0].name);
                $(this).closest('.text-center').find('.file__name').html(e.target.files[0].name);

            }
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // $('.blah').attr('src', e.target.result);
                    var image = $(input).closest('.input-image').find('img');
                    // image.removeClass('input__image-holder');

                    image.attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        window.onload = function () {
            var mainInput = document.getElementById("nepali-datepicker");
            mainInput.nepaliDatePicker();
        };
    </script>
@endpush
