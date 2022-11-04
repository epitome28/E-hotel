@extends("layouts.forntend")
@section('title')
E-Hotel
@endsection
@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('img/slide-1.jpeg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">E-Hotel</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">A Place Like Home</h1>
                            <a href="{{route('gallery')}}" class="btn btn-primary rounded py-md-3 px-md-5 me-3 animated slideInLeft">Our Gallery</a>
                            <a href="#book-room" class="btn btn-outline-primary rounded py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('img/slide-2.jpeg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">E-Hotel</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">Let make you like Price and Princess</h1>
                            <a href="{{route('gallery')}}" class="btn btn-primary rounded py-md-3 px-md-5 me-3 animated slideInLeft">Our Gallery</a>
                            <a href="#book-room" class="btn btn-outline-primary rounded py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{asset('img/slide-3.jpeg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 700px;">
                            <h6 class="section-title text-white text-uppercase mb-3 animated slideInDown">E-Hotel</h6>
                            <h1 class="display-3 text-white mb-4 animated slideInDown">You Are Fit To Be There</h1>
                            <a href="{{route('gallery')}}" class="btn btn-primary rounded py-md-3 px-md-5 me-3 animated slideInLeft">Our Gallery</a>
                            <a href="#book-room" class="btn btn-outline-primary rounded py-md-3 px-md-5 animated slideInRight">Book A Room</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Booking Start -->
    @include('includes.searchform')
    <!-- Booking End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                    <h1 class="mb-4 text-dark">Welcome to <span class="text-primary text-uppercase">E-Hotel</span></h1>
                    <p class="mb-4">Welcome to E-hotel, where you be like KING and QUEEN, a comfort zone you ever wanted to be, where you will always want to be and spend your night always</p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1 text-dark" data-toggle="counter-up">100</h2>
                                    <p class="mb-0">Rooms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1 text-dark" data-toggle="counter-up">50</h2>
                                    <p class="mb-0">Staffs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1 text-dark" data-toggle="counter-up">1329</h2>
                                    <p class="mb-0">Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="{{route('about')}}">To Know More</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="{{asset('img/about1.jpg')}}" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="{{asset('img/about2.jpg')}}">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="{{asset('img/about3.jpg')}}">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="{{asset('img/about4.jpg')}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/flexibility.png')}}" class="img-fluid" alt="image">
                        <h5 class="my-3">Hotel by Hour</h5>
                        <p>Need to take a nap or cut a busy work day</p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/lifestyle.png')}}" class="img-fluid" alt="image">
                        <h5 class="my-3">Hotel by Day</h5>
                        <p>Need a hotel room, but only for a few hours during the day</p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/night.webp')}}" width="97" height="97" class="img-fluid rounded-circle" alt="image">
                        <h5 class="my-3">Hotel by night</h5>
                        <p>Free to enjoy all the hotel amenities offered that your heart desires.</p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/group.png')}}" width="97" height="97" class="img-fluid rounded-circle" alt="image">
                        <h5 class="my-3">Group Stay</h5>
                        <p>Having a family celebration,a reunion or having birthday party</p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/short.jpg')}}" width="97" height="97" class="img-fluid rounded-circle" alt="image">
                        <h5 class="my-3">Short Stay</h5>
                        <p>Having a family vacation,a reunion</p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/longsty.jpeg')}}" width="97" height="97" class="img-fluid rounded-circle" alt="image">
                        <h5 class="my-3">Long Stay</h5>
                        <p>Whether you are staying with us for one night or a longer period, your health and well-being is our priority</p>
                    </div>
                    <div class="col-lg-3 col-sm-12 col-md-3 wow fadeInUp text-center" data-wow-delay="0.1s">
                        <img src="{{asset('images/serviceapt.jpg')}}" width="97" height="97" class="img-fluid rounded-circle" alt="image">
                        <h5 class="my-3">Service Apartment</h5>
                        <p>Enjoy the homey feeling of an apartment with the luxury service</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hotels Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Hotels</h6>
                    <h1 class="mb-5 text-dark">Explore Our <span class="text-primary text-uppercase">Hotels</span></h1>
                </div>
                <div class="row g-4">
                    @foreach ($hotels as $hotel)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="room-item shadow shadow2 h-auto rounded overflow-hidden">
                                <div class="position-relative">
                                    <img class="img-fluid" width="100%" height="100%" src="{{asset($hotel->image)}}" alt="{{$hotel->hotel_name}}">
                                </div>
                                <div class="p-4 mt-2">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="mb-0">{{$hotel->hotel_name}}</h5>
                                        <p>
                                            <?php 
                                                  $rooms_count = DB::table('rooms')->where('hotel_branches_id',$hotel->id)->count();
                                                ?>
                                         {{$rooms_count}}&nbsp;<i><small>Rooms</small></i>
                                        </p>
                                    </div>
                                    <p class="text-body mb-3">{{$hotel->address}}</p>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-sm btn-outline-primary rounded py-2 px-4" href="{{url('/hotels/room/'.$hotel->hotel_slug)}}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                     <div class="col-12">
                        @if (count($ho) > 6)
                             <a href="{{route('hotels')}}" class="btn btn-primary btn-sm py-3 px-5 mt-2">View More</a>
                        @endif
                       
                     </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Hotels End -->


    <!-- Video Start -->
    <div class="container-xxl py-5 px-0 wow zoomIn" data-wow-delay="0.1s">
        <div class="row g-0">
            <div class="col-md-6 bg-dark d-flex align-items-center">
                <div class="p-5">
                    <h6 class="section-title text-start text-white text-uppercase mb-3">E-hotel</h6>
                    <h1 class="text-white mb-4">Discover A  E-Hotel</h1>
                    <p class="text-white mb-4">A comfort zone you ever wanted to be, where you will always want to be and spend your night always</p>
                    <a href="{{route('gallery')}}" class="btn btn-primary py-md-3 px-md-5 me-3 my-2">Our Gallery</a>
                    <a href="#book-room" class="btn btn-light py-md-3 px-md-5">Book A Room</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video">
                    <button type="button" class="btn-play" data-bs-toggle="modal" data-src="img/video.mp4" data-bs-target="#videoModal">
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">E-Hotel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Start -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5 text-dark">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item rounded" href="https://ebnbhotel.com/location/3/cinema">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-hotel fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Cinema</h5>
                        <p class="text-body mb-0">I always remember my childhood house with happy memories. There was a beautiful garden, and outside my bedroom window was a jasmine vine which would open in the evenings, giving off a divine scent.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <a class="service-item rounded" href="https://ebnbhotel.com/location/7/bar-restaurant">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Food & Restaurant</h5>
                        <p class="text-body mb-0">Now I will take the oil of Life, the eggs of Destiny, the pan of Justice, the sausage of Truth, and go to cook the scrambled eggs of the Apocalypse. </p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <a class="service-item rounded" href="https://ebnbhotel.com/location/5/tourist-beach">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-spa fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Tourist & Beach</h5>
                        <p class="text-body mb-0">Fitness is not about competing with others. It’s about competing with yourself and working to be better than you were yesterday.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <a class="service-item rounded" href="https://ebnbhotel.com/location/4/shopping">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-swimmer fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Shopping</h5>
                        <p class="text-body mb-0">Remember, it doesn’t matter whether you win or lose; what matters is whether I win or lose</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <a class="service-item rounded" href="https://evenue.ng/event-services">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-glass-cheers fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">Event & Party</h5>
                        <p class="text-body mb-0">Someone said that life is a party. You join in after it’s started and leave before it’s finished.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <a class="service-item rounded" href="https://ebnbhotel.com/location/2/gym-sport">
                        <div class="service-icon bg-transparent border rounded p-1">
                            <div class="w-100 h-100 border rounded d-flex align-items-center justify-content-center">
                                <i class="fa fa-dumbbell fa-2x text-primary"></i>
                            </div>
                        </div>
                        <h5 class="mb-3">GYM & Yoga</h5>
                        <p class="text-body mb-0">My doctor recently told me that jogging could add years to my life. I think he was right. I feel ten years older already</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Testimonial Start -->
    <div class="container-xxl testimonial my-5 py-5 bg-dark wow zoomIn" data-wow-delay="0.1s">
        <div class="container container-md container-sm">
            <div class="owl-carousel testimonial-carousel">
                @foreach ($testis as $titem)
                     <div class="testimonial-item position-relative bg-white rounded-3">
                    <p class="w-100">{!!$titem->content!!}</p>
                    <div class="d-flex align-items-center">
                        {{-- <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;"> --}}
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">{{$titem->name}}</h6>
                            {{-- <small>Accountant</small> --}}
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Gallery</h6>
                <h1 class="mb-5 text-dark">Gallery</h1>
            </div>
            <div class="container my-3">
                <div class="galley">
                    <?php $i=0;?>
                    @foreach ($gallas as $gitem)
                         <a href="{{asset($gitem->imagefile)}}" class="mx-3" data-lightbox="images{{$i+1}}"><img class="img-fluid" src="{{asset($gitem->imagefile)}}" alt=""></a>
                         <?php $i++;?>
                         @endforeach
                   
                  </div>
            </div>
            
        </div>
    </div>
    <!-- Team End -->

@endsection
@section('fscript')
<script type="text/javascript">
    $(document).ready(function(){
      $('.galley').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
         });

        //console.log(locations);
     });
    </script>
    

@endsection