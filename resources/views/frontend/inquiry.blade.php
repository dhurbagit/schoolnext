@extends('frontend.layout.master')
@section('content')

    <main>
        <section id="form-section" class="section-margin">
            <div class="container">
                <div class="form-card">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="school__details text-center mb-4">
                                <h2 class="mb-0">{{$setting->school_name}}</h2>
                                <p class="mb-0">{{$setting->address}} | {{$setting->Phone_one}}</p>
                                <p class="mb-0">{{$setting->email}}</p>
                            </div>
                            <hr>
                            <p class="text-danger">Fields with (*) are compulsory.</p>
                            <form action="{{ route('inquiry.save') }}" method="POST">
                                @csrf
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
                                                <option value="10">10</option>
                                                <option value="9">9</option>
                                                <option value="8">8</option>
                                                <option value="7">7</option>
                                                <option value="6">6</option>
                                                <option value="5">5</option>
                                                <option value="4">4</option>
                                                <option value="3">3</option>
                                                <option value="2">2</option>
                                                <option value="1">1</option>
                                                <option value="UKG">UKG</option>
                                                <option value="LKG">LKG</option>
                                                <option value="Nursery">Nursery</option>
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
                                                    id="flexRadioDefault1" value="male">
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
                                            <input class="form-control" name="s_date_of_birth_bs" type="text"
                                                id="nepali-datepicker" aria-describedby="">
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
                                            <select name="nationality" class="form-select" id="select-form3"
                                                name="l_occupation">
                                                <option value="" selected hidden disabled>--- Select ---</option>
                                                <option value="39" class="bg-white">Banks related Jobs</option>
                                                <option value="41" class="bg-white">Barber</option>
                                                <option value="6" class="bg-white">Businessman</option>
                                                <option value="37" class="bg-white">Carpenter </option>
                                                <option value="2" class="bg-white">Doctor</option>
                                                <option value="46" class="bg-white">Driller</option>
                                                <option value="7" class="bg-white">Driver</option>
                                                <option value="8" class="bg-white">Electrician</option>
                                                <option value="3" class="bg-white">Engineer</option>
                                                <option value="9" class="bg-white">Farmer</option>
                                                <option value="14" class="bg-white">Foreign country Employee</option>
                                                <option value="12" class="bg-white">Government Officer</option>
                                                <option value="23" class="bg-white">Hotel (Small/ Medium)</option>
                                                <option value="10" class="bg-white">House wife </option>
                                                <option value="30" class="bg-white">IT professionals</option>
                                                <option value="25" class="bg-white">Jobless </option>
                                                <option value="36" class="bg-white">Journalist</option>
                                                <option value="18" class="bg-white">Labour | Mason </option>
                                                <option value="5" class="bg-white">Lawyer</option>
                                                <option value="35" class="bg-white">Leaders</option>
                                                <option value="38" class="bg-white">Manager</option>
                                                <option value="40" class="bg-white">Mechanics</option>
                                                <option value="47" class="bg-white">Medical &amp; Allied Science
                                                </option>
                                                <option value="28" class="bg-white">Medical Profession (Lab
                                                    Technician,
                                                    BPH, HA etc.)
                                                </option>

                                                <option value="17" class="bg-white">NGO / INGO </option>

                                                <option value="24" class="bg-white">Not sure</option>

                                                <option value="27" class="bg-white">Nurse</option>

                                                <option value="44" class="bg-white">Officer</option>

                                                <option value="19" class="bg-white">Others</option>

                                                <option value="21" class="bg-white">Own small Business</option>

                                                <option value="32" class="bg-white">Painters</option>

                                                <option value="43" class="bg-white">Pharmacy</option>

                                                <option value="29" class="bg-white">Photographers</option>

                                                <option value="26" class="bg-white">Physically Challenged </option>

                                                <option value="1" class="bg-white">Pilot</option>

                                                <option value="33" class="bg-white">Police, Army &amp; National
                                                    Security
                                                    Jobs</option>

                                                <option value="11" class="bg-white">Politician</option>

                                                <option value="42" class="bg-white">Press Officer</option>

                                                <option value="13" class="bg-white">Private Job Holder</option>

                                                <option value="22" class="bg-white">Shopkeeper</option>

                                                <option value="34" class="bg-white">Sister</option>

                                                <option value="45" class="bg-white">Sub-Engineer</option>

                                                <option value="31" class="bg-white">Tailors</option>

                                                <option value="4" class="bg-white">Teacher</option>

                                                <option value="20" class="bg-white">Travels, Tours &amp; Ticketing
                                                    officer</option>
                                            </select>

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
                                <div class="text-center">
                                    <button class="btn btn-form px-4 py-2" type="submit">Apply
                                        Now</button>
                                    <button class="btn btn-reset px-4 py-2" type="reset">Reset
                                    </button>
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
@endpush
