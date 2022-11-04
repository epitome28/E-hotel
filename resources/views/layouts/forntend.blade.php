<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title') </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.jpg')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!--  Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">
    <link href="{{asset('css/slick.css')}}" rel="stylesheet">
    <link href="{{asset('css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('css/lightbox.css')}}" rel="stylesheet" />
   
</head>
<body>
<div class="container-xxl bg-white p-0" style="{{URL::current() == route('book.checkout') ? 'background-color:#f4f4f4 !important;' : ''}}">
    <!-- Spinner Start -->
    {{-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border" style="color: #0F172B; width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}
    <!-- Spinner End -->

    <!-- Header Start -->
    <div class="container-fluid bg-dark px-0">
        <div class="row gx-0">
            <div class="col-lg-3 bg-dark d-none d-lg-block">
                <a href="{{route('welcome')}}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                    <img src="{{asset('img/logo.png')}}" alt="logo" >
                </a>
            </div>
            <div class="col-lg-9">
                <div class="row gx-0 bg-white d-none d-lg-flex">
                    <div class="col-lg-7 px-5 text-start">
                        <div class="h-100 d-inline-flex align-items-center py-2 me-4">
                            <i class="fas fa-envelope text-primary me-2"></i>
                            <p class="mb-0"><a href="mailto:{{$contpg ? $contpg->email : ""}}" style="color:#666565">{{$contpg ? $contpg->email : ""}}</a></p>
                        </div>
                        <div class="h-100 d-inline-flex align-items-center py-2">
                            <i class="fas fa-phone-alt text-primary me-2"></i>
                            <p class="mb-0"><a href="tel:{{$contpg ? $contpg->phone : ""}}" style="color:#666565">{{$contpg ? $contpg->phone : ""}}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-5 px-5 text-end">
                        <div class="d-inline-flex align-items-center py-2">
                            <a class="me-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="me-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="me-3" href=""><i class="fab fa-instagram"></i></a>
                            <a class="" href=""><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                    <a href="{{route('welcome')}}" class="navbar-brand d-block d-lg-none">
                        <img src="{{asset('img/logo.png')}}" alt="logo">
                    </a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('welcome')}}" class="nav-item nav-link">Home</a>
                            <a href="{{route('about')}}" class="nav-item nav-link">About</a>
                            <a href="{{route('services')}}" class="nav-item nav-link">Services</a>
                            <a href="{{route('gallery')}}" class="nav-item nav-link">Gallery</a>
{{--                            <div class="nav-item dropdown">--}}
{{--                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>--}}
{{--                                <div class="dropdown-menu rounded-0 m-0">--}}
{{--                                    <a href="#" class="dropdown-item">Booking</a>--}}
{{--                                    <a href="#" class="dropdown-item">Our Team</a>--}}
{{--                                    <a href="" class="dropdown-item">Testimonial</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <a href="{{url('contact')}}" class="nav-item nav-link">Contact</a>
                        </div>
                        {{-- <a href="{{route('login')}}" class="btn btn-primary rounded-0 py-4 px-md-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a> --}}
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Header End -->
    @yield('content')

    <!-- Newsletter Start -->
<div class="container newsletter mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row justify-content-center">
        <div class="col-lg-10 border rounded p-1">
            <div class="border rounded text-center p-1">
                <div class="bg-white rounded text-center p-5">
                    <h4 class="mb-4">Subscribe Our <span class="text-primary text-uppercase">Newsletter</span></h4>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                       <form action="{{route('newsletter')}}" method="post" id="newslet">
                        @csrf
                        <input class="form-control w-100 py-3 ps-4 pe-5 em" type="email" name="email" required placeholder="Enter your email">
                        <button type="submit" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2 newssubmit">Submit</button>
                       </form>
                       <p class="form-result"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Start -->
<div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
    <div class="container pb-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-4">
                      <a href="{{route('welcome')}}">
                        <img src="{{asset('img/logo.png')}}" alt="logo">
                    </a>
                    
                    <p class="text-white mb-0 my-2">
                        where you be like prince and princess, like no others, where you enjoy yourself, and back yourslef comfortable 
                    </p>
            </div>
            <div class="col-md-6 col-lg-3">
                <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                <p class="mb-2 text-white"><i class="fa fa-map-marker-alt me-3"></i>{{$contpg ? $contpg->address : ""}}</p>
                <p class="mb-2 text-white"><i class="fa fa-phone-alt me-3"></i>{{$contpg ? $contpg->phone : ""}}</p>
                <p class="mb-2 text-white"><i class="fa fa-envelope me-3"></i>{{$contpg ? $contpg->email : ""}}</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="row gy-5 g-4">
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Company</h6>
                        <a class="btn btn-link" href="{{route('about')}}">About Us</a>
                        <a class="btn btn-link" href="{{route('contact')}}">Contact Us</a>
                        <a class="btn btn-link" href="{{route('privacy')}}">Privacy Policy</a>
                        <a class="btn btn-link" href="{{route('tc')}}">Terms & Conditions</a>
                        <a class="btn btn-link" href="{{route('faq')}}">Faq</a>
                        <a class="btn btn-link" href="{{route('support')}}">Support</a>
                    </div>
                    <div class="col-md-6">
                        <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                        <a class="btn btn-link" href="https://ebnbhotel.com/location/3/cinema">Cinema</a>
                        <a class="btn btn-link" href="https://ebnbhotel.com/location/7/bar-restaurant">Bar & Resturant</a>
                        <a class="btn btn-link" href="https://ebnbhotel.com/location/5/tourist-beach">Tourist & Beach</a>
                        <a class="btn btn-link" href="https://evenue.ng/event-services">Event & Party</a>
                        <a class="btn btn-link" href="https://ebnbhotel.com/location/2/gym-sport">GYM & Yoga</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy;{{date("Y")}} <a class="border-bottom" href="{{route('welcome')}}">E-hotel</a>, All Right Reserved.

                    <!--/*** footer.. T. ***/-->
                    Designed By <a class="border-bottom" href="http://essentialgroup.ng/">Essential Group</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{route('welcome')}}">Home</a>
                        <a href="{{route('support')}}">Help</a>
                        <a href="{{route('faq')}}">Faqs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

</div>

@include('includes.aboutmodal')
<!-- JavaScript Libraries -->
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap/bundle.min.js')}}"></script>
<script src="{{asset('lib/wow/wow.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Javascript -->
<script src="{{asset('js/all.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script src="{{asset('js/lightbox.min.js')}}"></script>
<script src="{{asset('js/jsonscript.js')}}"></script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
    $(document).ready(function(){
        let url = $("#newslet").attr("action");
        $(".newssubmit").click(function(e){
            e.preventDefault();
            
            $.ajax({
            url: url,
            method: "post",
            data: $("#newslet").serialize(),
            beforeSend:function(){
                $(".newssubmit").attr('disabled',true);
                $(".form-result").text('Please wait...').addClass('text-danger');
            },
            success:function(data){
                if(data == "success"){
                    $(".em").val("");
                    $(".form-result").text('Registration success').addClass('text-success');
                    $(".newssubmit").attr('disabled',false);
                }else{
                    $(".form-result").text('Error').addClass('text-danger');
                    $(".newssubmit").attr('disabled',false);
                }
            },
            error:function(){
                alert('Error');
            }
        });
        });

        $("#searchText").keyup(function(){
              let search =  $("#searchText").val();
             $.ajax({
                url:"{{route('searchdropdown')}}",
                method:"get",
                data:{q:search},
                beforeSend:function(){
                    $("#gtimg").show();
                },
                success:function(data){
                    $(".htl").html(data.hotels);
                    $(".palc").html(data.places);
                    $("#list").removeClass('d-none');
                    $("#list").addClass('d-block');
                },
                error:function(xhr,status,errorThrown){
                    alert("Error... "+errorThrown);
                }
             });
          });
          $(document).on('click','.resl',function(){              
            $("#searchText").val($(this).text());
            $("#hid").val($(this).attr('data-id'));
            $("#stat").val($(this).attr('data-state'));
            $("#cit").val($(this).attr('data-city'));
            $("#list").addClass('d-none');
          });
    });
</script>
@yield('fscript')
</body>
</html>