@extends('frontend.layout.master')
@section('content')
<style type="text/css">

    body
    {
        background:#f2f2f2;
    }

    .payment
	{
		border:1px solid #f2f2f2;
		height:280px;
        border-radius:20px;
        background:#fff;
	}
   .payment_header
   {
	   background:rgba(255,102,0,1);
	   padding:20px;
       border-radius:20px 20px 0px 0px;

   }

   .check
   {
	   margin:0px auto;
	   width:50px;
	   height:50px;
	   border-radius:100%;
	   background:#fff;
	   text-align:center;
   }

   .check i
   {
	   vertical-align:middle;
	   line-height:50px;
	   font-size:30px;
   }

    .content1
    {
        text-align:center;
    }

    .content1  h1
    {
        font-size:25px;
        padding-top:25px;
    }

    .content1 a
    {
        width:200px;
        height:35px;
        color:#fff;
        border-radius:30px;
        padding:5px 10px;
        background:rgba(255,102,0,1);
        transition:all ease-in-out 0.3s;
    }

    .content1 a:hover
    {
        text-decoration:none;
        background:#000;
    }

</style>
<div class="container">
    <div class="row">
       <div class="col-md-6 mx-auto mt-5">
          <div class="payment">
             <div class="payment_header">
                <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
             </div>
             <div class="content1">
                <h1>Online form  Success send !</h1>
                <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. </p>
                <a href="/">Go to Home</a>
             </div>

          </div>
       </div>
    </div>
 </div>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>


@stop
