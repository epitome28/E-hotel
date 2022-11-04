@extends("layouts.forntend")
@section('title')
E-Hotel - Support
@show
@section('content')


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="section-title text-center text-primary text-uppercase">Support / Help</h2>
                <h4 class="mb-5"><span class="text-primary text-uppercase">Tell Us</span> What You Want</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <p class="form-result3"></p>
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="{{route('supportmail')}}" method="post" id="suprtsubmit">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" name="name" required placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="tel" name="phone" required placeholder="Your Phone Number ">
                                        <label for="email">Your Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email" required placeholder="Your Email Address">
                                        <label for="subject">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" name="subject" required placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" required name="message" id="message" style="height: 150px"></textarea>
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

@endsection
@section('fscript')
<script>
    $(document).ready(function(){
      
        $("#suprtsubmit").submit(function(e){
            e.preventDefault();
              let url = $("#suprtsubmit").attr("action");
            $.ajax({
            url: url,
            method: "post",
            data: $("#suprtsubmit").serialize(),
            beforeSend:function(){
                $(".cbtn").attr('disabled',true);
                $(".cbtn").text('Please wait...');
            },
            success:function(data){
                if(data == "success"){
                    $("#name").val("");
                    $("#tel").val("");
                    $("#email").val("");
                    $("#subject").val("");
                    $("#message").val("");
                    $(".form-result3").text('Thank You for Contacting Support').addClass('text-success');
                    $(".cbtn").attr('disabled',false);
                    $(".cbtn").text('Send Message');
                }else{
                    $(".form-result3").text('Error').addClass('text-danger');
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
