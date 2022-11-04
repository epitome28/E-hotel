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
    @media print{
  .noprint{
    display: none !important;
  }
 }
  </style>
</head>

<body class="g-sidenav-show bg-gray-200">

    
    @if (!empty($_GET['filter']) && $_GET['filter'] == true)
    <div class="my-3 noprint">
     <button class="btn btn-dark mx-2 float-start" onclick="window.print()">Print Report</button>
     <button class="btn btn-danger mx-2 float-start" onclick="window.location.href='{{route('admin.report')}}'">Back</button>
     <br><br>
 </div>
    <div class="mt-3 w-100">
     
     <div class="text-center my-2">
         <h5 class="text-uppercase font-weight-bold">Sale Report</h5>
         <p class="text-center text-dark font-weight-bold">Period: {{"From ".date("d M, Y",strtotime($_GET['date_from']))." To ".date("d M, Y",strtotime($_GET['date_to']))}}</p>
         <p class="text-center text-dark font-weight-bold">Generated on {{date("d M, Y")." at ".date("h:i:s")}}</p>
        </div>
      <div class="table-responsive mt-4">
         <table class="table mb-0">
             <thead>
                 <tr>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Name</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Hotel Branch</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Room</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Room Type</th> 
                     <th class="text-dark text-center" style="border:2px solid #000!important">Check in</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Check out</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Amount Paid</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Checkedin By</th>
                     <th class="text-dark text-center" style="border:2px solid #000!important">Checkedout By</th>
                 </tr>
             </thead>
             <tbody>
                   @if ($reports ?? "")
                   <?php $tot =0;?>
                   @foreach ($reports as $rp)
                   <tr>
                    <td class="text-dark" style="border:2px solid #000!important">{{$rp->client_name}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">
                    <?php 
                       $rmh = DB::table('rooms')->select('hotel_branches_id')->where('id',$rp->room_id)->first();
                       $htl = DB::table('hotel_branches')->select('hotel_name')->where('id',$rmh->hotel_branches_id)->first();
                     ?>
                     {{$htl->hotel_name}}
                   </td>
                    <td class="text-dark" style="border:2px solid #000!important">{{$rp->room->room_name}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">{{$rp->room_type}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">{{date('d m Y',strtotime($rp->checkin))}} @ {{date('H:i a',strtotime($rp->time_in))}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">{{date('d m Y',strtotime($rp->checkout))}} @ {{date('H:i a',strtotime($rp->time_out))}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">&#x20A6;{{number_format($rp->amount_paid)}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">{{$rp->checkedin_by}}</td>
                    <td class="text-dark" style="border:2px solid #000!important">{{$rp->checkedout_by}}</td>
                   </tr>
                   <?php $tot += $rp->amount_paid;?>
                   @endforeach
                   <tr class="text-dark" style="border:2px solid #000!important">
                     <td colspan="7" align="right">Total: &#x20A6;{{number_format($tot)}}</td>
                 </tr>

                   @endif
             </tbody>
         </table>
     </div>
    
    </div>
    @endif

<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>
<script src="{{asset('js/chartscripts.js')}}"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>

</body>
</html>