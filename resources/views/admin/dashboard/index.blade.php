@extends('admin.layout.master')
@section('content')

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <span class="float-left"><img src="{{asset('backend/assets/img/dash/dash-1.png')}}" alt="" width="80"></span>
            <div class="dash-widget-info text-right">
                <span><a href="{{route('inquiry.lists')}}">Online form</a></span>
                <h3>{{$online}}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <span class="float-left"><img src="{{asset('backend/assets/img/dash/dash-1.png')}}" alt="" width="80"></span>
            <div class="dash-widget-info text-right">
                <span><a href="{{route('inquiry_next.lists')}}">Inquiry form</a></span>
                <h3>{{$inquiry}}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <div class="dash-widget dash-widget5">
            <span class="float-left"><img src="{{asset('backend/assets/img/dash/dash-1.png')}}" alt="" width="80"></span>
            <div class="dash-widget-info text-right">
                <span><a href="{{route('contactus_next.lists')}}">ContactUs form</a></span>
                <h3>{{$contact_us}}</h3>
            </div>
        </div>
    </div>
@stop
