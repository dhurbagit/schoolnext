@extends('admin.layout.master')
@section('pageTitle', 'Dashboard')
@section('content')

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <a href="{{ route('inquiry.lists') }}">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><img src="{{ asset('backend/assets/img/dash/aa.png') }}" alt=""
                        width="80"></span>
                <div class="dash-widget-info text-right">
                    <span>Online Admission Form</span>
                    <h3>{{ $online }}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <a href="{{ route('inquiry_next.lists') }}">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><img src="{{ asset('backend/assets/img/dash/enquiry-icon-png-2.png') }}"
                        alt="" width="80"></span>
                <div class="dash-widget-info text-right">
                    <span>Inquiry form</span>
                    <h3>{{ $inquiry }}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <a href="{{ route('contactus_next.lists') }}">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><img src="{{ asset('backend/assets/img/dash/png-transparent-contact-us.png') }}"
                        alt="" width="80"></span>
                <div class="dash-widget-info text-right">
                    <span>Contact Us form</span>
                    <h3>{{ $contact_us }}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <a href="{{ route('Almuni.view') }}">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><img src="{{ asset('backend/assets/img/dash/passout.png') }}"
                        alt="" width="80"></span>
                <div class="dash-widget-info text-right">
                    <span>Passout Student</span>
                    <h3>{{ $AlmuniGallery }}</h3>
                </div>
            </div>
        </a>
    </div>

    <div class="col-lg-6">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="page-title">
                            Students Survay
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div id="chart1"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card flex-fill">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="page-title">
                            Events
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div id="calendar" class=" overflow-hidden"></div>
            </div>
        </div>
    </div>

    <div class="rougf_container_wrapper" style="display: none;">
        <ul id="js_data_pass">
            @foreach (Events() as $data)
                <li>
                    <div class="in_js_title">{{ $data->title }}</div>
                    <div class="in_js_date">{{ $data->date }}</div>
                </li>
            @endforeach
        </ul>
    </div>
@stop
@push('scripts')
    <script>
        $(document).ready(function() {

            var options = {
                series: [{
                    name: 'New Students',
                    data: [
                        @foreach ($almuni as $records)
                            {{ $records->A_images->count() }},
                        @endforeach
                    ]
                }],
                chart: {
                    height: 350,
                    type: 'area'
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                colors: ["#8944D7", "#00B871"],
                xaxis: {
                    type: 'datetime',
                    categories: [
                        @foreach ($almuni as $records)
                            "{{ $records->title - 57 }}",
                        @endforeach
                     ]
                },
                legend: {
                    position: 'top'
                },
                tooltip: {
                    x: {
                        format: 'yy'
                    },
                },
            };

            var chart = new ApexCharts(document.querySelector("#chart1"), options);
            chart.render();





        });
    </script>
@endpush
