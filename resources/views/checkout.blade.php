@extends("layouts.forntend")
@section('title')
E-Hotel - Book Your Stay
@endsection
@section('content')

    <!-- Branches Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{route('roomdetails',['slug' => $rm->room_slug])}}" class="text-dark my-auto">&larr; Back</a>
                    <h6 class="my-3">Checkout</h6>
                </div>
                <form action="{{route('book.submitcheckout')}}" method="post" id="submitcheckout">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-7 col-lg-7 col-sm-12">
                         <div class="card rounded-3 bg-white mb-3">
                             <div class="card-body">
                               
                                 <h6>
                                     <span class="rounded-circle bg-dark text-white px-2 py-1">1</span>&nbsp;&nbsp;
                                 Booking Details
                                 </h6>
                                 <div class="row py-5">
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                        <label for="fname" class="text-dark">First name <sup class="text-danger">*</sup></label>
                                        <input type="text" required name="first_name" id="fname" placeholder="First name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                        <label for="lname" class="text-dark">Last name <sup class="text-danger">*</sup></label>
                                        <input type="text" required name="last_name" id="lname" placeholder="Last name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12 col-lg-12 col-sm-12 mb-3">
                                        <label for="email" class="text-dark">Email address<sup class="text-danger">*</sup></label>
                                        <input type="email" required name="email" id="email" placeholder="Email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                        <label for="phone" class="text-dark">Phone number <sup class="text-danger">*</sup></label>
                                        <input type="tel" required name="phone_number" id="phone" placeholder="Phone number" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                        <label for="tim" class="text-dark">Expected time of arrival <sup class="text-danger">*</sup></label>
                                        <input type="time" required name="arrival_time" id="tim"  class="form-control">
                                    </div>
                                    <div class="row mt-3">
                                        <div class="form-check col-md-6 col-lg-6 col-sm-12">
                                            <div style="margin-left: 5px">
                                                <input class="form-check-input" type="checkbox" name="usersave" value="1" id="flexCheckDefault">
                                            <label class="form-check-label text-dark" for="flexCheckDefault">
                                               Save Details For Future Use
                                            </label>
                                            </div>
                                          </div>
                                          <div class="col-md-6 col-lg-6 col-sm-12">
                                            <span class="float-end text-dark">Return Customer Please Click <a href="javascript:void(0)" onclick="openemailmodal()">Here</a></span>
                                          </div>
                                    </div>
                                 </div>
                             </div>
                         </div>
     
                         <div class="card rounded-3 bg-white mb-3">
                             <div class="card-body">
                                 <h6 class="mb-4">
                                 <span class="rounded-circle bg-dark text-white px-2 py-1">2</span>&nbsp;&nbsp;
                                 Choose How to Pay 
                                 </h6>
                                 <div class="border rounded-3 py-3 mb-3 px-2 prp">
                                    <div class="form-check position-relative">
                                        <input class="form-check-input position-absolute bottom-50" type="radio" name="payment_type" value="at location" autocomplete="off" checked id="flexRadioDefault1">
                                        <label class="form-check-label w-100" for="flexRadioDefault1" style="cursor: pointer">
                                            <div class="row">
                                                <div class="col-md col-lg col-xl">
                                                    <h5 class="text-dark mb-0">Book now, pay at property</h5>
                                                    <p>
                                                        <small class="text-dark">No credit card to book.Available on a First come, First served basis.</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto">
                                                    <h5 class="float-end float-lx-end float-lg-end float-md-end">&#x20A6; {{!empty($_GET['price']) ? number_format($_GET['price']) : ''}}</h5>
                                                </div>
                                            </div>
                                        </label>
                                      </div>
                                 </div>
                                 <div class="border rounded-3 mb-3 py-3 px-2 cc">
                                    <div class="form-check position-relative" style="cursor: pointer">
                                        <input class="form-check-input position-absolute bottom-50 mr-5" type="radio" name="payment_type" autocomplete="off" value="credit card" id="flexRadioDefault2">
                                        <label class="form-check-label w-100" for="flexRadioDefault2" style="cursor: pointer">
                                            <div class="row">
                                                <div class="col-md col-lg col-xl">
                                                    <h5 class="text-dark mb-0">Book now with credit card</h5>
                                                    <p>
                                                        <small class="text-dark">Credit card charged now. Room guaranteed.</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto">
                                                    <h5>&#x20A6; {{!empty($_GET['price']) ? number_format($_GET['price']) : ''}}</h5>
                                                </div>
                                            </div>
                                        </label>
                                      </div>
                                 </div>
                                 <div class="border rounded-3 py-3 px-2 cc">
                                    <div class="form-check position-relative" style="cursor: pointer">
                                        <input class="form-check-input position-absolute bottom-50 mr-5" type="radio" name="payment_type" autocomplete="off" value="transfer" id="flexRadioDefault3">
                                        <label class="form-check-label w-100" for="flexRadioDefault3" style="cursor: pointer">
                                            <div class="row">
                                                <div class="col-md col-lg col-xl">
                                                    <h5 class="text-dark mb-0">Book now, by transfer</h5>
                                                    <p>
                                                        <small class="text-dark">Make Transfer via your bank. Room guaranteed.</small>
                                                    </p>
                                                </div>
                                                <div class="col-auto">
                                                    <h5>&#x20A6; {{!empty($_GET['price']) ? number_format($_GET['price']) : ''}}</h5>
                                                </div>
                                            </div>
                                        </label>
                                      </div>
                                 </div>
                             </div>
                         </div>
                        </div>
                        <div class="col-md-5 col-lg-5 col-sm-12">
                         <div class="card rounded-3 bg-white mb-3">
                             <div class="card-body">
                                 <h5 class="mb-3">
                                     <span class="rounded-circle bg-dark text-white px-2 py-1">3</span>&nbsp;&nbsp;
                                     Verify & Confirm Booking
                                 </h5>
                                 <h4 class="text-dark">{{$rm->hotelbranch->hotel_name}}</h4>
                                 <p>{{$rm->hotelbranch->address}}</p>
                                 <a class="mb-2 text-dark" target="_blank" href="https://www.google.com/maps/place/{{$rm->hotelbranch->address}}">View on map</a>
                                 <hr>
                                 <div class="d-flex justify-content-between">
                                  <p>
                                    <strong>Room:</strong>
                                  </p>
                                  <p class="mx-5">{{$rm->room_name}}</p>
                                 </div>
                                 <div class="d-flex justify-content-between">
                                    <p>
                                      <strong>Fits up to:</strong>
                                    </p>
                                    <p class="mx-5">{{$rm->room_capacity}} <i class="fas fa-user"></i></p>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                    <p>
                                      <strong>Booking Option:</strong>
                                    </p>
                                    <p class="mx-5">{{ucwords($rm->bookoption)}}</p>
                                   </div>
                                   <?php 
                                    $d = !empty($_GET['period']) ? $_GET['period'] : '';
                                     $dte = explode("-",$d);
                                   ?>
                                   <div class="d-flex justify-content-between">
                                    <p>
                                      <strong class="text-break">Check-in no sooner than:</strong>
                                    </p>
                                    <p class="mx-5">{{$dte[0]}}</p>
                                   </div>
                                   <div class="d-flex justify-content-between">
                                    <p>
                                      <strong class="text-break">Check-out no later than:</strong>
                                    </p>
                                    <p class="mx-5">{{$dte[1]}}</p>
                                   </div>
                                   <div class="row justify-content-between">
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 my-2">
                                        <label class="text-dark" for="adu"><strong>Adult</strong></label>
                                        <input type="number" name="adult" min="0" max="30" value="{{session()->has('search') ? session()->get('search')['adult'] : '0'}}" class="form-control" id="adu" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 col-lg-6 col-sm-12 my-2">
                                        <label class="text-dark" for="child"><strong>Children</strong></label>
                                        <input type="number" name="children" min="0" max="30" value="{{session()->has('search') ? session()->get('search')['children'] : '0'}}" class="form-control" id="child" autocomplete="off">
                                    </div> 
                                    
                                    <?php 
                                     $opt = $rm->bookoption;
                                    ?>

                                     @if ($opt == "by day" || $opt == "by hour" || $opt == "by night")
                                     <label class="text-dark"><strong>Pick a Date</strong></label>
                                     <div class="col-md-7 col-lg-7 col-sm-12">
                                        <input type="date" name="pickdate"  class="form-control" id="cinnm" autocomplete="off" value="{{session()->has('search') ? session()->get('search')['checkin'] : ''}}">
                                    </div> 
                                     @else
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <label class="text-dark"><strong>Checkin Date</strong></label>
                                            <input type="date" name="checkin" class="form-control" id="cin" autocomplete="off" value="{{session()->has('search') ? session()->get('search')['checkin'] : ''}}">
                                        </div>
                                        <div class="col-md-6 col-lg-6 col-sm-12">
                                            <label class="text-dark"><strong>Checkout Date</strong></label>
                                            <input type="date" name="checkout" class="form-control" id="cout" onchange="getdateprice()" autocomplete="off" value="{{session()->has('search') ? session()->get('search')['checkout'] : ''}}">
                                        </div> 
                                     @endif
                                   </div>
                                <hr>
                                <h5>Payment Summary:</h5>
                              
                                <div class="d-flex justify-content-between">
                                    <p>
                                      <strong class="text-break">Amount to be paid</strong>
                                    </p>
                                    <p class="mx-5">&#x20A6; <span class="topy">{{!empty($_GET['price']) ? number_format($_GET['price']) : ''}}</span></p>
                                   </div> 
                                   <hr>
                                   <div class="form-check col-md-12 col-lg-12 col-sm-12">
                                    <div style="margin-left: 10px">
                                        <input class="form-check-input" type="checkbox" name="pri" onchange="if(this.checked == true){document.getElementById('cmbtn').disabled = false;}else{document.getElementById('cmbtn').disabled = true;}" autocomplete="off" value="1" id="flexCheckDefaultpriv">
                                    <label class="form-check-label text-dark" for="flexCheckDefaultpriv">
                                       <small>
                                        I agree to the <a href="{{route('tc')}}" >Term & Conditions</a> and <a href="{{route('privacy')}}" >Privacy policies</a> of E-Hotel. 
                                       </small>
                                    </label>
                                    </div>
                                  </div>
                                  {{-- @if ($opt == "by day" || $opt == "by hour" || $opt == "by night")
                                  @else
                                  @endif --}}
                                   <input type="hidden" name="hotel_name" id="hotelname" value="{{$rm->hotelbranch->hotel_name}}">                                   
                                   <input type="hidden" name="book_location" id="bkloca" value="{{$rm->hotelbranch->location}}">                                   
                                   <input type="hidden" name="bookoption" id="bkopt" value="{{$rm->bookoption}}">
                                   <input type="hidden" name="price" id="pr" value="{{!empty($_GET['price']) ? $_GET['price'] : ''}}">
                                   <input type="hidden" name="timing" id="tmu" value="{{!empty($_GET['period']) ? $_GET['period'] : ''}}">
                                   <input type="hidden" name="duration" id="dr" value="1">
                                    <input type="hidden" name="roomid" id="rmid" value="{{$rm->id}}">
                                   
                                   <div class="form-group my-3 cm">
                                    <span class="text-center text-sm txtsuce"></span>
                                    <button type="button" class="btn btn-dark rounded-3 w-100" onclick="comfirmbookin()" id="cmbtn">Confirm Booking</button>
                                   </div>
                                   <div class="form-group my-3 py" style="display: none">
                                    <button type="button" class="btn btn-dark rounded-3 w-100" id="pybtn" onclick="makepayment()">Confirm Booking & Payment</button>
                                   </div>
                             </div>
                         </div>
                        </div>
                     </div>
                </form>
            </div>

        </div>
    </div>
    <!-- Branches End -->

@endsection
@section('fscript')

<script>
      let price = "{{!empty($_GET['price']) ? $_GET['price'] : ''}}";
    function getdateprice(){
        let nwd1 = new Date($("#cout").val());
            let nwd2 = new Date($("#cin").val());
           // let price = $("#pr").val();

            let dura = Math.abs(nwd2 - nwd1);
            let diffdt = Math.ceil(dura / (1000 * 60 * 60 * 24));
           // alert(dura);
            let tpr = diffdt * price;
            $(".shwdnm").show();
            $(".dnum").text(diffdt+' Day(s)');
            $("#pr").val(tpr);
            $(".topy").text(Number(tpr).toLocaleString('en'));
            $("#dr").val(diffdt);
            $("#cmbtn").attr('disabled',false);
    }
</script>
   <script>
     $(document).ready(function(){
         
          $('input[name="payment_type"]').change(function(){
              if($(this).val() === "transfer" || $(this).val() === "credit card"){
                $(".py").show();  
                $(".cm").hide();
            }else{
                $(".py").hide();  
                $(".cm").show();
            }
          });

        // $("#cout").change(function(){
        
        // });

      $("#valiem").submit(function(e){
        e.preventDefault();
        let url =  $("#valiem").attr('action');
        $.ajax({
            url: url,
            method:'get',
            data: $("#valiem").serialize(),
            beforeSend:function(){
                $("#cemail").text('validating...');
                $("#cemail").attr('disabled',true);
            },
            success:function(data){
                if (data == 0) {
                    $(".emtxt").text('No account found with these '+$("#eme").val()).addClass('text-danger');
                    $("#cemail").text('Submit');
                  $("#cemail").attr('disabled',false);
                } else {
                    $("#fname").val(data.fname);
                    $("#lname").val(data.lname);
                    $("#email").val(data.em);
                    $("#phone").val(data.phne);
                    $(".emtxt").text('Details Retrived successfully').addClass('text-success');

                    $("#userModal").modal('hide');

                    $("#cemail").text('Submit');
                  $("#cemail").attr('disabled',false);
                }
               
            },
            error:function(xhr,status,errorThrown){
              alert("Error... "+errorThrown); 
              $("#cemail").text('Submit');
                $("#cemail").attr('disabled',false);
            }
        });
      });

   
     });
   </script>

   <script>
    function openemailmodal(){
        $("#userModal").modal('show');
    }
   </script>
  <script>
function makepayment(){
        let rm = "{{$rm->id}}";
    $.ajax({
            url: "{{route('checkrmbooking')}}",
            method:"get",
            data:{roomid:rm},
            beforeSend:function(){
                $("#pybtn").text('Checking avalability...');
                $("#pybtn").attr('disabled',true);
            },
            success:function(data){
                if(data == "ok"){
                    payWithPaystack();
                    
                }else if(data.bk1 == "1" || data.bk2 == "1"){
                    alert('sorry these room has already been booked');
                    $("#pybtn").text('Confirm Booking & Payment');
                    $("#pybtn").attr('disabled',false);
                    $("#flexCheckDefaultpriv").attr("checked",false);
                    $("#avaroomModal").modal('show');
                    $("#rmcontnt").html(data.record);
                }
            },
            error:function(xhr,status,errorThrown){
              alert("Error... "+errorThrown); 
              $("#pybtn").text('Confirm Booking & Payment');
                $("#pybtn").attr('disabled',false);
                $("#flexCheckDefaultpriv").attr("checked",false);
            }
           });
  }
  </script>

   <script>
    
        var paymentForm = document.getElementById('submitcheckout');
paymentForm.addEventListener('submit', payWithPaystack, false);
    function payWithPaystack() {
        $("#pybtn").text('please wait...');
       $("#pybtn").attr('disabled',true); 
var handler = PaystackPop.setup({

  key: "pk_test_438307910257422994babe837a5a8d5c46075b8b", // Replace with your public key

  email: document.getElementById('email').value,
  amount: document.getElementById('pr').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit

  currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars

  ref: (new Date().getTime()).toString(36) * Math.random(), // Replace with a reference you generated

  callback: function(response) {

    //this happens after the payment is completed successfully

    var reference = response.reference;

    alert('Payment complete! Reference: ' + reference);
    
    paymentForm.submit();
   
    // Make an AJAX call to your server with the reference to verify the transaction

  },

  onClose: function() {

    alert('Transaction was not completed, window closed.');
    $("#pybtn").text('Confirm Booking & Payment');
    $("#pybtn").attr('disabled',false);
  },

});

handler.openIframe();

}//paystack
  
   </script>

<script>
    var comfirmForm = document.getElementById('submitcheckout');
    comfirmForm.addEventListener('submit', comfirmbookin, false);
    function comfirmbookin(){
      
        let cap = "{{$rm->room_capacity}}";
    
    let ppl = parseInt($("#adu").val()) + parseInt($("#child").val());
//   alert(ppl);
    if(ppl > cap){
    alert('Room selected can only take the capacity of '+cap+' people');
    return true;
    }
    let rm = "{{$rm->id}}";
    $.ajax({
            url: "{{route('checkrmbooking')}}",
            method:"get",
            data:{roomid:rm},
            beforeSend:function(){
                $("#cmbtn").text('Checking avalability...');
                $("#cmbtn").attr('disabled',true);
            },
            success:function(data){
                if(data == "ok"){
                    $("#submitcheckout").submit();
                    $("#cmbtn").text('Booking...');
                    $("#cmbtn").attr('disabled',true);
                }else if(data.bk1 == "1" || data.bk2 == "1"){
                    alert('sorry these room has already been booked');
                    $("#cmbtn").text('Confirm Booking');
                    $("#cmbtn").attr('disabled',false);
                    $("#flexCheckDefaultpriv").attr("checked",false);
                    $("#avaroomModal").modal('show');
                    // if(data.record == "0"){
                    //     $("#rmcontnt").html("<p>No Avaliable Room</p>"); 
                    // }else{
                         $("#rmcontnt").html(data.record);
                    console.log(data.record);
                }
            },
            error:function(xhr,status,errorThrown){
              alert("Error... "+errorThrown); 
                $("#flexCheckDefaultpriv").attr("checked",false);
            }
           });
    }
</script>
@endsection