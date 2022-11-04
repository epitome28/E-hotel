<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon.jpg')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.jpg')}}">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  {{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" /> --}}
  <!-- Nucleo Icons -->
  <link href="{{asset('assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/nucleo-svg.css')}}" rel="stylesheet" />
  <link href="{{asset('css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
 
  <!-- Font Awesome Icons -->
  <link href="{{asset('css/all.css')}}" rel="stylesheet">
  {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> --}}
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
  <style>
    @page { size: 58mm 80% } /* output size */
    body.receipt .sheet { width: 58mm; height: 100% } /* sheet size */
    @media print { body.receipt { width: 58mm } } /* fix for Chrome */
  </style>
</head>

<body class="receipt g-sidenav-show bg-gray-200">

<div class="sheet">
    <p class="text-center">
        <img src="{{asset('img/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
    </p>

<div class="my-3"><h2 class="text-center">INVOICE</h2></div><hr>
<div class="row justify-content-end my-2">
     <strong class="text-end">Recipt No : <span>#{{mt_rand('000000','999999')}}</span></strong>      
</div> 
<table class="table table-bordered text-dark">
<tbody>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Customer Name</td><td style="border:2px solid #000!important">{{$recpt->client_name}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Phone</td><td style="border:2px solid #000!important">{{$recpt->client_phone}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Room</td><td style="border:2px solid #000!important">{{$recpt->room->room_name}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Room Type</td><td style="border:2px solid #000!important">{{$recpt->room_type}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Booking Option</td><td style="border:2px solid #000!important">{{$recpt->bookoption}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Duration</td><td style="border:2px solid #000!important">{{$recpt->duration}}Day(s)</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Check In Date</td><td style="border:2px solid #000!important">{{date('d-m-Y',strtotime($recpt->checkin))}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Check Out Date</td><td style="border:2px solid #000!important">{{date('d-m-Y',strtotime($recpt->checkout))}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Time In</td><td style="border:2px solid #000!important">{{date('h:ia',strtotime($recpt->time_in))}}</td></tr>
    <tr class="border border-dark"><td style="border:2px solid #000!important">Amount Paid</td><td style="border:2px solid #000!important">&#x20A6;{{number_format($recpt->amount_paid)}}</td></tr>
    @if (!is_null($recpt->discount))
    <tr class="border border-dark"><td style="border:2px solid #000!important">Discount</td><td style="border:2px solid #000!important">&#x20A6;{{number_format($recpt->discount)}}</td></tr> 
    <tr class="border border-dark"><td style="border:2px solid #000!important">Autorized By</td><td style="border:2px solid #000!important">{{$recpt->autorized_by}}</td></tr> 
    @endif
</tbody>
</table>
<hr>
<p class="text-center">Thank you for patronizing us</p>
</div>

<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>
<script src="{{asset('js/chartscripts.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script>
    $(document).ready(function(){
     print();
     window.close();
    });
    
  </script>
</body>
</html>