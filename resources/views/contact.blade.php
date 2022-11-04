@extends("layouts.forntend")
@section('title')
E-Hotel - Contact
@endsection
@section('content')


    <!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset('img/slide-1.jpeg')}});">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Page Header End -->


    <!-- Booking Start -->
    @include('includes.searchform')
    <!-- Booking End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>
                <h1 class="mb-5"><span class="text-primary text-uppercase">Contact Us</span> For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Booking</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>book@e-hotel.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">General</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>info@e-hotel.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Technical</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@e-hotel.com</p>
                        </div>
                    </div>
                    
                </div>

                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="500" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=24%20Iyalla%20St,%20Oregun%20101233,%20Ikeja&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://fmovies-online.net"></a>
                            <br>
                            <style>.mapouter{position:relative;text-align:right;height:400px;width:500px;}</style>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <p class="form-result2"></p>
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="{{route('contactsend')}}" method="post" id="contactsubmit">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="Your Name" autocomplete="off" value="{{old('name')}}">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" required placeholder="Your Email" autocomplete="off" value="{{old('email')}}">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" required placeholder="Subject" autocomplete="off" value="{{old('subject')}}">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" name="message" autocomplete="off" required style="height: 150px">{{old('message')}}</textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3 cbtn" type="submit">Send Message</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


@endsection

@section('fscript')
<script>
    $(document).ready(function(){
      
        $("#contactsubmit").submit(function(e){
            e.preventDefault();
              let url = $("#contactsubmit").attr("action");
            $.ajax({
            url: url,
            method: "post",
            data: $("#contactsubmit").serialize(),
            beforeSend:function(){
                $(".cbtn").attr('disabled',true);
                $(".cbtn").text('Please wait...');
            },
            success:function(data){
                if(data == "success"){
                    $("#name").val("");
                    $("#email").val("");
                    $("#subject").val("");
                    $("#message").val("");
                    $(".form-result2").text('Thank You for Contacting Us').addClass('text-success');
                    $(".cbtn").attr('disabled',false);
                    $(".cbtn").text('Send Message');
                }else{
                    $(".form-result2").text('Error').addClass('text-danger');
                    $(".cbtn").attr('disabled',false);
                }
            },
            error:function(){
                alert('Error');
                $(".cbtn").attr('disabled',false);
                    $(".cbtn").text('Send Message');
            }
        });
        });
    });
</script>
@endsection