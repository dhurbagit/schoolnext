<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/index.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
<style>
    .full_with{
        padding: 0 !important;
    }
</style>



    <main>
        <nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-primary">
            <div class="container">
               <div class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-danger text-end" href="#">Print</a>
                    </div>
               </div>
            </div>
        </nav>

        <section id="form-section" class="section-margin">
            <div class="container">
                <div class="form-card full_with">
                    <div class="card">
                        <div class="card-body p-5">
                            <div class="school__details text-center mb-4">
                                <h2 class="mb-0">GUINNESS PUBLIC SECONDARY SCHOOL</h2>
                                <p class="mb-0">Gokarneshwor-8, Kathmandu | Phone: +977 01-5168046 / +977 9841501347
                                </p>
                                <p class="mb-0">Email: info@genniess.edu.np</p>
                            </div>
                            <hr>
                            <p class="text-danger">Fields with (*) are compulsory.</p>
                            <form action="#">
                                <div class="form-header mb-2">
                                    <span>STUDENT'S INFORMATION</span>
                                </div>
                                <div class="mb-2">
                                    <label for="text-form" class="form-label mb-0">Name of the Applicant (Full Name)
                                        <span class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control" id="text-form"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="select-form1" class="form-label mb-0">Applied for Grade <span
                                                    class="text-danger">*</span>:</label>
                                            <select class="form-select" id="select-form1" aria-label="">
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
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form1" class="form-label mb-0">Current Grade <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" class="form-control" id="text-form1"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <label for="#" class="pe-3">Gender:</label>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check pe-3">
                                                <input class="form-check-input" type="radio"
                                                    name="flexRadioDefault" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="select-form2" class="form-label mb-0">Nationality:</label>
                                            <select name="nationality" class="form-select" id="select-form2">
                                                <option value="Afghan/Afghani" class="bg-white">Afghan/Afghani
                                                </option>
                                                <option value="Bangladeshi" class="bg-white">Bangladeshi</option>
                                                <option value="Chinese" class="bg-white">Chinese</option>
                                                <option value="Indian" class="bg-white">Indian</option>
                                                <option value="Kazakh/Kazakhstani " class="bg-white">
                                                    Kazakh/Kazakhstani
                                                </option>
                                                <option selected="" value="Nepali" class="bg-white">Nepali
                                                </option>
                                                <option value="Pakistani" class="bg-white">Pakistani</option>
                                                <option value="Sri Lankan" class="bg-white">Sri Lankan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form3" class="form-label mb-0">Email:</label>
                                            <input type="email" class="form-control" id="text-form3"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="date-form1" class="form-label mb-0">Date of birth(BS):</label>
                                            <input class="form-control" type="text" id="nepali-datepicker"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="date-form2" class="form-label mb-0">Date of birth(AD):</label>
                                            <input type="date" class="form-control" id="date-form2"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form3" class="form-label mb-0">Age:</label>
                                            <input type="text" class="form-control" id="text-form5"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form6" class="form-label mb-0">Address <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" class="form-control" id="text-form6"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form7" class="form-label mb-0">Phone <span
                                                    class="text-danger">*</span>:</label>
                                            <input type="text" class="form-control" id="text-form7"
                                                aria-describedby="emailHelp">
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
                                            <input type="text" class="form-control" id="text-form8"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form9" class="form-label mb-0">Mobile No.:</label>
                                            <input type="text" class="form-control" id="text-form9"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form10" class="form-label mb-0">Email:</label>
                                            <input type="email" class="form-control" id="text-form11"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form12" class="form-label mb-0">Occupation:</label>
                                            <input type="text" class="form-control" id="text-form12"
                                                aria-describedby="emailHelp">
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
                                            <input type="text" class="form-control" id="text-form13"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form14" class="form-label mb-0">Mobile No.:</label>
                                            <input type="text" class="form-control" id="text-form14"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form15" class="form-label mb-0">Email:</label>
                                            <input type="email" class="form-control" id="text-form15"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form16" class="form-label mb-0">Occupation:</label>
                                            <input type="text" class="form-control" id="text-form16"
                                                aria-describedby="emailHelp">
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
                                            <input type="text" class="form-control" id="text-form17"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form18" class="form-label mb-0">Mobile No.:</label>
                                            <input type="text" class="form-control" id="text-form18"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="text-form19" class="form-label mb-0">Email:</label>
                                            <input type="email" class="form-control" id="text-form19"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-2">
                                            <label for="select-form3" class="form-label mb-0">Occupation:</label>
                                            <select name="nationality" class="form-select" id="select-form3">
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
                                                <option value="14" class="bg-white">Foreign country Employee
                                                </option>
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

                                                <option value="26" class="bg-white">Physically Challenged
                                                </option>

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
                                            <input type="text" class="form-control" id="text-form20"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form21" class="form-label mb-0">Address:</label>
                                            <input type="text" class="form-control" id="text-form21"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-2">
                                            <label for="text-form22" class="form-label mb-0">Grade:</label>
                                            <input type="email" class="form-control" id="text-form22"
                                                aria-describedby="">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Write your query(If any)"
                                            rows="3"></textarea>
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
            <button id="buttonTop" class="btn btn-top" title="Back to Top"><i
                    class="fa-solid fa-caret-up"></i></button>
        </section>
    </main>




</body>

</html>
