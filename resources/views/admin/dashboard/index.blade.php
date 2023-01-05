@extends('admin.layout.master')
@section('pageTitle', 'Dashboard')
@section('content')

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
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
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <a href="{{ route('inquiry_next.lists') }}">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><img src="{{ asset('backend/assets/img/dash/enquiry-icon-png-2.png') }}" alt=""
                        width="80"></span>
                <div class="dash-widget-info text-right">
                    <span>Inquiry form</span>
                    <h3>{{ $inquiry }}</h3>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
        <a href="{{ route('contactus_next.lists') }}">
            <div class="dash-widget dash-widget5">
                <span class="float-left"><img src="{{ asset('backend/assets/img/dash/png-transparent-contact-us.png') }}" alt=""
                        width="80"></span>
                <div class="dash-widget-info text-right">
                    <span>Contact-Us form</span>
                    <h3>{{ $contact_us }}</h3>
                </div>
            </div>
        </a>
    </div>
@stop
