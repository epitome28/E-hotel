<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/favicon.jpg')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.jpg')}}">
  <title class="noprint">
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
 
.pri input[type="radio"]:checked + label{
  background: #E32F6E;
    padding: 7px 5px;
    border-radius: 5px;
    color: #fff;
}
.selected{
  background: #E32F6E;
    padding: 5px 3px;
    border-radius: 5px;
    border: none !important;
    color: #fff;
 }
 
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
            @include('includes.sidenavigation')
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                <!-- Navbar -->
                  @include('includes.navbar')
                <!-- End Navbar -->
                
              <div class="container-fluid py-4">
                   @yield('adcontent')

              </div>

    <footer class="footer py-4 noprint">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-start">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              &copy; <script>
                document.write(new Date().getFullYear())
              </script>,
              
              <a href="javascript:void(0)" class="font-weight-bold">E-Hotels</a>
              
            </div>
          </div>
          
        </div>
      </div>
    </footer>

                 <!-- Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Payment</h1>
                        <button type="button" class="btn-close text-dark font-wieght-bold fs-3" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                      </div>
                      <div class="modal-body">
                        <h5 class="text-center">Select Payment Method</h5>
                         <form action="{{route('submitcheckinviabookin')}}" id="bchink" method="post">
                          @csrf
                          <input type="hidden" name="uid" id="buid" value="">
                          {{-- <div class="form-group  mb-3">
                            <label class="form-label">No Of People</label>
                            <input type="number" name="people" id="peple" required autocomplete="off"   class="form-control border px-3" value="{{old('people')}}">
                          </div>
                          <div class="form-group  mb-3">
                            <label class="form-label">Amount Paid</label>
                            <input type="number" name="amount_paid" id="peple" required autocomplete="off"   class="form-control border px-3" value="{{old('people')}}">
                          </div> --}}
                          <div class="form-group">
                            <select name="payment_method" autocomplete="off"  class="form-control border px-3" id="">
                              <option selected disabled>Select Payment Method</option>
                              <option value="Pos Payment">Pos Payment</option>
                              <option value="Transfer">Transfer</option>
                              <option value="Cash">Cash</option>
                              <option value="Online">Online</option>
                            </select>
                          </div>
                          <span class="text-center text-sm txtsu"></span>
                          <div class="form-group mt-3">
                            <button type="submit" class="btn btn-dark float-end rounded-3" id="bckin">Check In</button>
                          </div>
                         </form>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
        </div>
    </main>
              @include('includes.settingplugin')

               <!--   Core JS Files   ?v=3.0.4-->
  <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('assets/js/material-dashboard.min.js')}}"></script>
  <script src="{{asset('js/chartscripts.js')}}"></script>
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{asset('js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
    <script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('js/jsonscript.js')}}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    function thisform(){
      document.querySelector('#btn').setAttribute('disabled',true);
      document.querySelector('.btns').setAttribute('disabled',true);
    }
  </script>
  <script>
    $(document).ready(function(){
      setInterval(() => {
          $.get('{{route("getbook")}}',(data) => {
          //  console.log(data);
              $(".bknum").text(data);
          });
      },2000);
      setInterval(() => {
          $.get('{{route("getroomexpiry")}}',(data) => {
          //  console.log(data);
             if(data.result == '1'){
              $(".expiry").html(data.records);
            }
          });
      },2000);

      $("#bchink").submit(function(e){
        e.preventDefault();
        $.ajax({
          url: $("#bchink").attr('action'),
          method:'post',
          data: $("#bchink").serialize(),
          beforeSend:function(){
            $("#bckin").text('Checking in...');
            $("#bckin").attr('disabled',true);
          },
          success:function(data){
            if(data.success == 1){
              $(".txtsu").html('<p class="text-success">Check in successfull  <strong><a href="javascript:void(0)" onclick="return windowpop('+data.id+',545, 433)" title="Print Receipt">Print Receipt</a></strong></p>');
              $("#bckin").text('Check In');
            $("#bckin").attr('disabled',false);
            }
          },
          error:function(){
            alert('error');
            $("#bckin").text('Check In');
            $("#bckin").attr('disabled',false);
          }
        });
      });
    });
  </script>
  <script>
    function windowpop(id, width, height) {
    var leftPosition, topPosition;
    //Allow for borders.
    leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
    //Allow for title and status bars.
    topPosition = (window.screen.height / 2) - ((height / 2) + 50);
    //Open the window.
    window.open("{{route('printr')}}?chkid="+id, "Window2", "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
}
</script>
  @yield('adscript')
    </body>
</html>
