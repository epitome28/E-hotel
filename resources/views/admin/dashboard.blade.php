@extends('layouts.app')
@section('title')
    Dashboard
@endsection
@section('pagetitle')
    Dashboard
@endsection
@section('adcontent')
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">weekend</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Bookings</p>
              <h4 class="mb-0 bknum"></h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$bkcount}} </span>rooms booked</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Checked In</p>
              <h4 class="mb-0">{{$totcheckin}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">{{$chinsct}} </span>active checked in</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">person</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Checked Out</p>
              <h4 class="mb-0">{{$choutct}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{$choutct}}</span> checked out</p>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">money</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total Sales</p>
              <h4 class="mb-0">&#x20A6;{{number_format($totsale)}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0">today's sales <span class="text-success text-sm font-weight-bolder">&#x20A6;{{number_format($tdsale)}} </span></p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row mt-4 mb-4">
      <div class="col-lg-4 col-md-6">
        <div class="card h-auto">
          <div class="card-header pb-0">
            <h6>Check Booking</h6>
          </div>
          <div class="card-body p-2">
            <form action="{{route('checkbookincode')}}" method="post" id="checkbokin">
              @csrf
              <div class="input-group input-group-outline mb-3">
                <label class="form-label">Booking Code</label>
                <input type="text" name="code" id="cod"  class="form-control" value="{{old('code')}}">
              </div>
              <small id="txstat" class="text-sm px-1 mt-0"></small>
              <div class="text-center">
                <button type="submit" class="btn btn-lg bg-gradient-primary w-100 mt-4 mb-0" id="ckbtns">Check Booking</button>
              </div>
            </form>
              <div class="text-center">
                <button type="button" onclick="document.getElementById('checkinuserinfo').style.display='block';document.getElementById('bookuserinfo').style.display='none';" class="btn btn-lg bg-gradient-info w-100 mt-4 mb-0">Walk in Customer</button>
              </div>
              <form action="{{route('searchquery')}}" method="get" class="mt-5" onsubmit="thisform(this)">
                <div class="form-group mb-3">
                  <input type="text" class="form-control border" name="q" placeholder="Search Check In by room,name or phone">
                  <button class="btn bg-gradient-primary w-100 mt-2" type="submit" id="btn">Search <i class="fas fa-search"></i></button>
                </div>
              </form>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        
        <div class="card">
          <div class="card-header pb-0">
            <h3>Customers Information</h4>
          </div>
         
          <div class="card-body px-2 pb-2">
            <div class="expiry w-100"></div>
            @include('includes.success')

             <div id="bookuserinfo" style="display: none">
              <span class="text-center text-sm txtsuce"></span>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Name: <span id="cname"></span></h6>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold" id="cemail"></span></span>
                    <span class="text-xs mb-2">Phone Number: <span class="text-dark ms-sm-2 font-weight-bold" id="cnumba"></span></span>
                    <span class="text-xs mb-2">Booked Location: <span class="text-dark ms-sm-2 font-weight-bold" id="bloca"></span></span>
                    <span class="text-xs mb-2">Expected time of arrival: <span class="text-dark ms-sm-2 font-weight-bold" id="arri"></span></span>
                    <span class="text-xs mb-2">Booking Option: <span class="text-dark ms-sm-2 font-weight-bold" id="bopt"></span></span>
                    <span class="text-xs mb-2">Room Type: <span class="text-dark ms-sm-2 font-weight-bold" id="crmt"></span></span>
                    <span class="text-xs mb-2">Check In: <span class="text-dark ms-sm-2 font-weight-bold" id="chin"></span></span>
                    <span class="text-xs mb-2">Check Out: <span class="text-dark ms-sm-2 font-weight-bold" id="chot"></span></span>
                    <span class="text-xs mb-2">Period: <span class="text-dark ms-sm-2 font-weight-bold" id="priod"></span></span>
                    <span class="text-xs mb-2">Amount: <span class="text-dark ms-sm-2 font-weight-bold" id="amt"></span></span>
                    <span class="text-xs mb-2">Payment Method: <span class="text-dark ms-sm-2 font-weight-bold" id="pmth"></span></span>
                    <span class="text-xs mb-2">Payment Status: <span class="text-dark ms-sm-2 font-weight-bold" id="pstut"></span></span>
                  </div>
                  <input type="hidden" id="bid">
                  <div class="ms-auto text-end">
                    <img src="{{asset('images/ajax-loader.gif')}}" id="chk2" style="display: none"  alt="checking in...">
                    <span class="opbtn">
                      <a class="btn btn-link text-danger text-gradient px-3 mb-0 oppy" href="javascript:void(0);" onclick="openpayment()"><i class="material-icons text-sm me-2">money</i>Confirm Payment and Checkin</a>
                    <a class="btn btn-link text-dark text-gradient px-3 mb-0 chkin" href="javascript:void(0);"><i class="material-icons text-sm me-2">person</i>Check In</a>
                    </span>
                  </div>
                </li>
              </ul>
              
             </div>
             <div id="checkinuserinfo">
              <form action="{{route('submitcheckin')}}" method="post" role="form" id="submitcheckin">
                @csrf
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <h6>Select Room Type</h6>
                  <div class="d-flex justify-content-center mb-3">
                    <div class="mx-3 border rounded py-2 px-4" id="Budget" style="cursor: pointer" onclick="selectroomtyp('Budget')">
                      <p class="text-center my-auto">
                        Budget Room
                      </p>
                    </div>
                    <div class="mx-3 border rounded py-2 px-4" id="Standard" style="cursor: pointer" onclick="selectroomtyp('Standard')">
                      <p class="text-center my-auto">
                         Standard Room
                      </p>
                    </div>
                    <div class="mx-3 border rounded py-2 px-4" id="Executive" style="cursor: pointer" onclick="selectroomtyp('Executive')">
                      <p class="text-center my-auto">
                        Executive Room
                      </p>
                    </div>
                    
                </div>
                <input type="hidden" name="roomtype" id="rmtp" value="" autocomplete="off">
               </div>
               <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group mb-3">
                    <label class="form-label">Room Name</label>
                    <select name="room_id" class="form-control border px-3" id="rmnme" autocomplete="off">
                      <option selecte disabled>Select Room</option>
                    </select>
                  </div>
                  <img src="{{asset('images/ajax-loader.gif')}}" id="ms" style="display: none"  alt="loading">
                </div>
               </div>
                 <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group  mb-3">
                      <label class="form-label">Customer Name</label>
                      <input type="text" name="customer_name" id="cliname"  class="form-control border px-3" autocomplete="off" value="{{old('customer_name')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group  mb-3">
                      <label class="form-label">Customer Mobile Number</label>
                      <input type="text" name="customer_mobile" id="climbi"  class="form-control border px-3" autocomplete="off" value="{{old('customer_mobile')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group  mb-3">
                      <label class="form-label">Alternative Mobile Number(optional)</label>
                      <input type="text" name="alternative_mobile"  class="form-control border px-3" autocomplete="off" value="{{old('alternative_mobile')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                      <label class="form-label">Booking Option</label>
                      <select name="booking_option" class="form-control border px-3" id="opttype" autocomplete="off">
                        <option selected disabled>Select Options</option>
                        <option value="by hour">By Hour</option>
                        <option value="by day">By Day</option>
                        <option value="by night">By Night</option>
                        <option value="group stay">Group Stay</option>
                        <option value="short stay">Short Stay</option>
                        <option value="long stay">Long Stay</option>
                        <option value="service apartment">Service Apartment</option>
                        <option value="full booking">Full Booking</option>
                      </select>
                    </div>
                   
                    <img src="{{asset('images/ajax-loader.gif')}}" id="bk" style="display: none"  alt="loading">
                  </div>
                  <p id="txs" class="text-sm px-3 mt-0"></p>
                  <div  id="accordionExample" style="display: none">
                    <h6>Click to Select Timing</h6>
                    <div class="my-3">
                          <select class="form-control border px-3" onchange="getpripr(this.value,this.options[this.selectedIndex].getAttribute('data-price'),this.options[this.selectedIndex].getAttribute('data-hour'))" id="prie">
                           
                          </select>    
                    </div>
                    <input type="hidden" name="timing" class="dru" value="" autocomplete="off">
                    <input type="hidden" name="amount_paid" class="picre" value="" autocomplete="off">
                    <input type="hidden"  class="pice" value="" autocomplete="off">
                    <input type="hidden" name="timeout" id="timeout" value="" autocomplete="off">
                  </div>
                  <div class="my-2 row" id="prices" style="display: none">
                    <div class="pric2 form-group mb-3 col-lg-4 col-md-4 col-sm-12"></div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group mb-3">
                      <label class="form-label">Check In</label>
                      <input type="date" name="checkin" id="dtein" autocomplete="off"  class="form-control border px-3" value="{{old('checkin')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group  mb-3">
                      <label class="form-label">Check Out</label>
                      <input type="date" name="checkout" id="dteout" autocomplete="off" onchange="getdateprice()"  class="form-control border px-3" value="{{old('checkout')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group  mb-3">
                      <label class="form-label">No Of People</label>
                      <input type="number" name="people" id="peple" required autocomplete="off"   class="form-control border px-3" value="{{old('people')}}">
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group  mb-3">
                      <label class="form-label">Durations</label>
                      <input type="hidden" name="durations" id="dura" autocomplete="off"  class="form-control border px-3" value="">
                       <p class="text-dark dar">0 Day</p>
                    </div>
                  </div>

                  
                  <div id="swamo" style="display: none">
                    <div class="row mb-2">
                      <div class="col-md-6 col-lg-6 col-sm-12">
                        <label>Discount</label>
                        <input type="number" name="discount" id="discotn" class="form-control border px-3" placeholder="000000">
                      </div>
                      <div class="col-md-6 col-lg-6 col-sm-12">
                        <label>Autorized By</label>
                        <input type="text" name="autorize" id="auotzir" class="form-control border px-3" placeholder="Enter Autorized Name">
                      </div>
                    </div>
                    <div class="d-flex justify-content-between">
                      <p>
                        <strong class="text-break">Amount to be paid</strong>
                      </p>
                      <p class="mx-5">&#x20A6; <span class="topy">{{!empty($_GET['price']) ? number_format($_GET['price']) : ''}}</span></p>
                     </div>
                  </div>
                  <div class="form-group">
                    <select name="payment_method" autocomplete="off" class="form-control border px-3" id="">
                      <option selected disabled>Select Payment Method</option>
                      <option value="Pos Payment">Pos Payment</option>
                      <option value="Transfer">Transfer</option>
                      <option value="Cash">Cash</option>
                    </select>
                  </div>
                 <div class="text-center">
                  <span class="text-center text-sm txtsuce"></span>
                 
                  <img src="{{asset('images/ajax-loader.gif')}}" id="chk" style="display: none"  alt="checking in...">
                  <button type="submit" class="btn btn-md bg-gradient-primary w-100 mt-4 mb-0" id="ckinbtns">Check in </button>
                </div>
              </form>
             </div>
          </div>
        </div>
      </div>
    </div>

    <!--Continue To Check in Modal -->
    <div class="modal fade" id="contiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Continue To Check in</h1>
            <button type="button" class="btn-close text-dark font-wieght-bold fs-3" data-bs-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
                <div class="details w-100">
                  <p class="cnme"></p>
                  <p class="cphn"></p>
                  <p class="chkn"></p>
                  <p class="chkou"></p>
                  <p class="pck"></p>
                </div>
                <span class="text-center text-sm txtsck"></span>
               <button type="button" onclick="contichekin('{{route('continsubmitcheckin')}}')" id="btn" class="btn btn-md bg-gradient-primary">Continue</button>
          </div>
        </div>
      </div>
    </div>

     
@endsection

@section('adscript')
    <script>
      function openpayment(){
       $('#exampleModal').modal('show');
       $("#buid").val($("#bid").val());
      }
</script>
<script>
      function selectroomtyp(tp){
        if(tp === "Budget"){
          $("#rmtp").val(tp);
          $('#'+tp).addClass('selected');
          $('#Standard').removeClass('selected');
          $('#Executive').removeClass('selected');
        }else if(tp === "Standard"){
          $("#rmtp").val(tp);
          $('#'+tp).addClass('selected');
          $('#Budget').removeClass('selected');
          $('#Executive').removeClass('selected');
        }else if(tp === "Executive"){
          $("#rmtp").val(tp);
          $('#'+tp).addClass('selected');
          $('#Budget').removeClass('selected');
          $('#Standard').removeClass('selected');
        }else{
          $("#rmtp").val("");
          $('#'+tp).removeClass('selected');
        }
        
        $.ajax({
            url:"{{route('getromms')}}",
            method:'get',
            data:{rmtyp:tp},
            beforeSend:function(){
              $("#ms").show();
            },
            success:function(data){
              $("#ms").hide();
              $("#rmnme").html(data);
              $("#rmnme").prepend('<option selected value="0">Select Room</option>');
            },
            error:function(){
              alert('An Error Occurred');
              $("#ms").hide();
            }
          });
      }
    </script>
    <script>
      let prc = "";
      function getpripr(hr,p,t){
        $(".dru").val(hr);  
        $(".picre").val(p);
        $(".pice").val(p);   
        $("#timeout").val(t);   
        $("#swamo").show();
        $(".topy").text(Number(p).toLocaleString('en'));
        prc = p;
      }
    </script>
    <script>
      $(document).ready(function(){
        $("#discotn").keyup(function(){
          let pcc = $(".pice").val(); 
          let d = $("#discotn").val(); 
          let to = pcc - d;
          $(".topy").text(Number(to).toLocaleString('en'));
          $(".picre").val(to); 
        });

        $("#checkbokin").submit(function(e){
          e.preventDefault();
          if($("#cod").val() === ""){
            alert('Booking code is empty');
          }else{
            $.ajax({
            url:$("#checkbokin").attr('action'),
            method:'post',
            data:$("#checkbokin").serialize(),
            beforeSend:function(){
              $("#ckbtns").text('Checking...');
              $("#ckbtns").attr('disabled',true);
            },
            success:function(data){
              if(data == 0){
                $("#ckbtns").text('Check Booking');
              $("#ckbtns").attr('disabled',false);
              $("#txstat").text('Code Not Found').addClass('text-danger');
              }else{
                $("#bookuserinfo").show();
                $("#checkinuserinfo").hide();
                $("#cname").text(data.cname);
                $("#cemail").text(data.em);
                $("#cnumba").text(data.cpone);
                $("#bloca").text(data.htbloca);
                $("#crmt").text(data.rmty);
                $("#pmth").text(data.pmethod);
                $("#pstut").text(data.pstat);
                $("#arri").text(data.arriv);
                $("#bopt").text(data.bopt);
                $("#chin").text(data.checkin);
                $("#chot").text(data.checkout);
                $("#priod").text(data.period);
                $("#amt").text(data.amout);
                $("#bid").val(data.bookid);
                if (data.pstat == "Paid") {
                  $(".opbtn").html('<a class="btn btn-link text-dark text-gradient px-3 mb-0 chkinc" href="javascript:void(0);" onclick="checkinviabookin('+data.bookid+')"><i class="material-icons text-sm me-2">person</i>Check In</a>');
                } else {
                  $(".opbtn").html('<a class="btn btn-link text-danger text-gradient px-3 mb-0 oppy" href="javascript:void(0);" onclick="openpayment('+data.bookid+')"><i class="material-icons text-sm me-2">money</i>Confirm Payment and Checkin</a>');
                }
                $("#ckbtns").text('Check Booking');
              $("#ckbtns").attr('disabled',false);
              }
            },
            error:function(){
              alert('An Error Occurred');
              $("#ckbtns").text('Check Booking');
              $("#ckbtns").attr('disabled',false);
            }
          });
          }
        });


        $("#opttype").change(function(){
          let opt = $("#opttype").val();
          let rmtyp = $("#rmtp").val();
          if(rmtyp == ""){
            alert("Please Select A Room Type");
            $("#opttype option:first").prop('selected',true);
          }else{
            let url = "{{route('getrommsprices')}}";
           // alert(url);
           $.ajax({
               url: url,
               method: "get",
               data:{opt:opt,rmtyp:rmtyp},
               beforeSend:function(){
                   $("#bk").show();
               },
               success:function(data){
                 if(data == 0){
                  $("#txs").text("No Price Or Duration Found for "+opt).addClass('text-danger');
                  $("#accordionExample").hide();
                 }else{
                  if(opt == "by day" || opt == "by hour" || opt == "by night"){
                  $("#accordionExample").show();
                  $("#prices").hide();
                  $("#prie").html(data);
                  $("#prie").prepend('<option selected disabled>Select Options</option>');
                  $("#txs").text('');
                }else{
                  $("#txs").text('');
                  $("#accordionExample").hide();
                  $("#prices").show();
                  $("#pric2").html(data);
                }
                 }
                 $("#bk").hide();
               },
               error:function(){
                   alert('An Error Ocurred');
                   $("#bk").hide();
                   $("#prices").hide();
                  $("#accordionExample").hide();
               }
           });
          }
        });

        $("#submitcheckin").submit(function(e){
          e.preventDefault();
          opt = $("#opttype").val();
          chkin = $("#dteout").val();
          chkot = $("#dteout").val();
          cname = $("#cliname").val();
           cmob = $("#climbi").val();
            rme = $("#rmnme").val();
          if(opt == "" || chkin == "" || chkot == "" || cname == "" || cmob == "" || rme == "0"){
            alert("Please complete all fields");
          }else{
            $.ajax({
              url: $("#submitcheckin").attr('action'),
              method:"post",
              data:$("#submitcheckin").serialize(),
              beforeSend:function(){
                $("#chk").show();
                $("#ckinbtns").hide();
              },
              success:function(data){
                if(data.cp == 2){
                  $(".txtsuce").text('Room selected can only take the capacity of '+data.rmcap+' People').addClass('text-danger');
                  $("#chk").hide();
                 $("#ckinbtns").show();
                }else if(data.bst == 0){
                  $("#contiModal").modal('show');
                  $(".cnme").text('These Room has already being booked by '+data.client_name);
                  $(".cphn").text('Customer Phone: '+data.client_phone);
                  $(".chkn").text('Checkin Date: '+data.checkin_date);
                  $(".chkou").text('Checkout Date: '+data.checkout_date);
                  $(".pck").text('Payment Status: '+data.payment_status);
                   $("#chk").hide();
                 $("#ckinbtns").show();
                 $("#submitcheckin")[0].reset();
                }else if(data.chkst == 0){
                  $("#contiModal").modal('show');
                  $(".cnme").text('These Room has already being Checked In with these customer '+data.client_name);
                  $(".cphn").text('Customer Phone: '+data.client_phone);
                  $(".chkn").text('Checkin Date: '+data.checkin_date);
                  $(".chkou").text('Checkout Date: '+data.checkout_date);
                  $(".pck").text('Checked in by: '+data.checkedin_by);
                   $("#chk").hide();
                 $("#ckinbtns").show();
                 $("#submitcheckin")[0].reset();
                }else if(data.success == 1){
                  $(".txtsuce").html('<p class="text-success">Customer Check in successful <strong><a href="javascript:void(0)" onclick="return windowpop('+data.id+',545, 433)" title="Print Receipt">Print Receipt</a></strong></p>');
                  $("#chk").hide();
                 $("#ckinbtns").show();
                 $("#submitcheckin")[0].reset();
                }
              },
              error:function(xhr){
                alert('An Error Ocurred');
                $("#chk").hide();
                $("#ckinbtns").show();
              }
            });
          }
        });

        
        
      });
    </script>
    <script>
    function getdateprice(){
      let nwd1 = new Date($("#dteout").val());
            let nwd2 = new Date($("#dtein").val());
           // let price = $("#pr").val();

            let dura = Math.abs(nwd2 - nwd1);
            let diffdt = Math.ceil(dura / (1000 * 60 * 60 * 24));
           // alert(dura);
            let tpr = diffdt * prc;
            $("#dura").val(diffdt);
            $(".dar").text(diffdt+' Day(s)');
            $(".picre").val(tpr);
            $(".pice").val(tpr); 
            $(".topy").text(Number(tpr).toLocaleString('en'));  
    }
</script>
    <script>
    function contichekin(u){
      $(".btn").text('Please Wait...');
      $(".btn").attr('disabled',true);
       $.ajax({
        url: u,
        method: "get",
        success:function(data){
          if(data.success == 1){
            $(".txtsck").html('<p class="text-success">Customer Check in successful <strong><a href="javascript:void(0)" onclick="return windowpop('+data.id+',545, 433)" title="Print Receipt">Print Receipt</a></strong></p>');
            $(".btn").text('Continue');
            $(".btn").attr('disabled',false);
          }
        },
        error:function(xhr,status,errorThrown){
            alert("Error... "+errorThrown);
            $(".btn").text('Continue');
            $(".btn").attr('disabled',false);
        }
       });
    }
</script>
<script>
  function checkinviabookin(id){
     $(".chkinc").text('Checking in...').addClass('text-danger');
     $token = $("meta[name='csrf-token']").attr('content');
     $.ajax({
        url: "{{route('submitcheckinviabookin')}}",
        method: "post",
        data:{'_token':$token,'uid':id},
        success:function(data){
          if(data.success == 1){
            $(".txtsuce").html('<p class="text-success">Customer Check in successful <strong><a href="javascript:void(0)" onclick="return windowpop('+data.id+',545, 433)" title="Print Receipt">Print Receipt</a></strong></p>');
            $(".chkinc").text('Check In');
            $("#bookuserinfo").hide();
               $("#checkinuserinfo").show();
          }else if(data.chkst == 0){
                  $("#contiModal").modal('show');
                  $(".cnme").text('These Room has already being Checked In with these customer '+data.client_name);
                  $(".cphn").text('Customer Phone: '+data.client_phone);
                  $(".chkn").text('Checkin Date: '+data.checkin_date);
                  $(".chkou").text('Checkout Date: '+data.checkout_date);
                  $(".pck").text('Checked in by: '+data.checkedin_by);
                   $("#chk").hide();
                   $(".chkinc").text('Check In');
                   $("#bookuserinfo").hide();
               $("#checkinuserinfo").show();
                }
        },
        error:function(xhr,status,errorThrown){
            alert("Error... "+errorThrown);
            $(".chkinc").text('Check In');
        }
       });
  }
</script>
@endsection