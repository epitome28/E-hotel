@extends("layouts.header")

@section('content')

    <!-- Page Header Start -->
{{--    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/slide-2.jpeg);" >--}}
{{--        <div class="container-fluid page-header-inner py-5">--}}
{{--            <div class="container text-center pb-5">--}}
{{--                <h1 class="display-3 text-white mb-3 animated slideInDown">Service</h1>--}}
{{--                <nav aria-label="breadcrumb">--}}
{{--                    <ol class="breadcrumb justify-content-center text-uppercase">--}}
{{--                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>--}}
{{--                        <li class="breadcrumb-item text-white active" aria-current="page">Service</li>--}}
{{--                    </ol>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Page Header End -->--}}

{{--    <!-- Booking Start -->--}}
{{--    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">--}}
{{--        <div class="container">--}}
{{--            <div class="bg-white shadow" >--}}
{{--                <div class="row g-2">--}}
{{--                    <div class="hotel-search-box">--}}
{{--                        <div class="container">--}}
{{--                            <div class="banner-search-form">--}}
{{--                                <p class="type"><span class="bookingIcon">Booking Type</span></p>--}}
{{--                                <div class="search-filters-wrap wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.5s">--}}
{{--                                    <form class="booking-form">--}}
{{--                                        <div class="bookingTypRow text-center radio-warp">--}}
{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="hourly" value="hourly" /><label for="hourly">Hotel by Hour</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Hotel by Day</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Hotel by night</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Group Stay</label>--}}
{{--                                            </div>--}}

{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="weekly" value="weekly" /><label for="weekly">Short Stay</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="monthly" value="monthly" /><label for="monthly">Long Stay</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="radioCol">--}}
{{--                                                <input type="radio" name="bookingType" id="annual" value="annual" /><label for="annual">Service Apartment </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="search-filter-Row clearfix">--}}
{{--                                            <div class="common-cols city-coloumn ">--}}
{{--                                                <label  class="cityIcon">City or Place</label>--}}
{{--                                                <input type="text" id="searchText" class="form-control" placeholder="Enter City or Hotel name">--}}
{{--                                            </div>--}}
{{--                                            <div class="common-cols chkin-field">--}}
{{--                                                <label for="txtChkIn" class="calenderIcon">Check In</label>--}}
{{--                                                <input id="txtChkIn" type="date" class="form-control" name="">--}}
{{--                                            </div>--}}
{{--                                            <div class="common-cols chkin-field has-caret hour-type" style="display:none">--}}
{{--                                                <label style="padding-left:0">In-Time</label>--}}
{{--                                                <select class="form-control" id="ddlCheckInTime" onchange="bindCheckOutTime()">--}}
{{--                                                    <option value="0">--:--</option>--}}
{{--                                                    <option value=" 01:00">01:00 AM</option>--}}
{{--                                                    <option value=" 02:00">02:00 AM</option>--}}
{{--                                                    <option value=" 03:00">03:00 AM</option>--}}
{{--                                                    <option value=" 04:00">04:00 AM</option>--}}
{{--                                                    <option value=" 05:00">05:00 AM</option>--}}
{{--                                                    <option value=" 06:00">06:00 AM</option>--}}
{{--                                                    <option value=" 07:00">07:00 AM</option>--}}
{{--                                                    <option value=" 08:00">08:00 AM</option>--}}
{{--                                                    <option value=" 09:00">09:00 AM</option>--}}
{{--                                                    <option value=" 10:00">10:00 AM</option>--}}
{{--                                                    <option value=" 11:00">11:00 AM</option>--}}
{{--                                                    <option value=" 12:00">12:00 PM</option>--}}
{{--                                                    <option value=" 13:00">01:00 PM</option>--}}
{{--                                                    <option value=" 14:00">02:00 PM</option>--}}
{{--                                                    <option value=" 15:00">03:00 PM</option>--}}
{{--                                                    <option value=" 16:00">04:00 PM</option>--}}
{{--                                                    <option value=" 17:00">05:00 PM</option>--}}
{{--                                                    <option value=" 18:00">06:00 PM</option>--}}
{{--                                                    <option value=" 19:00">07:00 PM</option>--}}
{{--                                                    <option value=" 20:00">08:00 PM</option>--}}
{{--                                                    <option value=" 21:00">09:00 PM</option>--}}
{{--                                                    <option value=" 22:00">10:00 PM</option>--}}
{{--                                                    <option value=" 23:00">11:00 PM</option>--}}

{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="common-cols chkin-field has-caret hour-type" style="display:none">--}}
{{--                                                <label style="padding-left:0">Out-Time</label>--}}
{{--                                                <select class="form-control" id="ddlCheckOutTime">--}}
{{--                                                    <option value="0">--:--</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="common-cols chkin-field">--}}
{{--                                                <label for="txtChkOut" class="calenderIcon">Check Out</label>--}}
{{--                                                <input id="txtChkOut" type="date" class="form-control" name="">--}}
{{--                                            </div>--}}
{{--                                            <div class="common-cols common-cols-lg chkin-field">--}}
{{--                                                <label  class="adultIcon"> Adults</label>--}}
{{--                                                <input type="number" id="txtAdult" class="form-control" value="0" min="0" max="100" step="1" />--}}
{{--                                            </div>--}}
{{--                                            <div class="common-cols common-cols-lg chkin-field">--}}
{{--                                                <label for="children" class="childrenIcon"> Children</label>--}}
{{--                                                <input type="number" id="children" class="form-control" value="0" min="0" max="100" step="1" />--}}
{{--                                            </div>--}}

{{--                                            <div class="common-cols common-cols-lg has-caret chkin-field">--}}
{{--                                                <label for="price" class="priceIconWrap">Price</label>--}}
{{--                                                <select id="price" class="form-control">--}}
{{--                                                    <option value="1000-2000">&#8358; 1000 - 2000</option>--}}
{{--                                                    <option value="2000-5000">&#8358; 2000 - 5000</option>--}}
{{--                                                    <option value="5000-10000">&#8358; 5000 - 10000</option>--}}
{{--                                                    <option value="10000-20000">&#8358; 10000 - 20000</option>--}}
{{--                                                    <option selected value="">any</option>--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="btn-row">--}}
{{--                                            <input type="button" id="btnSearch" class="common-btn" value="Search" />--}}
{{--                                            <a href="javascript:void(0);" id="btnSearchUrl" class="btn" style="display:none">Search</a>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Booking End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Services</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Services</span></h1>
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
        <div class="container">
            <div class="owl-carousel testimonial-carousel py-5">
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>For the price and location a very nice hotel. Nice staff, Nice breakfast (vegetarian options as well), rooms and bathrooms are a bit small but nothing to complain about (since the price), good "sound isolation" between the rooms as far as we could notice. Good distance to things that you probably want to do on a weekend in Lagos.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Adewale Ruth</h6>
                            <small>Accountant</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>Thank you so much for your help and cooperation. My daughter would forget her head if it was loose! We will definitely use your hotel again when we visit London. You and your staff could not have been any more helpful. We were delighted that we had chosen E-hotel.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Akinwumi Ayodele</h6>
                            <small>Engineers</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
                <div class="testimonial-item position-relative bg-white rounded overflow-hidden">
                    <p>I left so early on my last day on April 10th that I didn’t get to say how much I enjoyed my stay with you again this month. Your rooms are great, and your friendly help and attention to detail were much appreciated! With hopes that you have an enjoyable spring and summer, and I’m very much looking forward to staying with you again this September on my way back from Austria</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Oloyede Victor</h6>
                            <small>lawyers</small>
                        </div>
                    </div>
                    <i class="fa fa-quote-right fa-3x text-primary position-absolute end-0 bottom-0 me-4 mb-n1"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


@include('layouts.footer')
@endsection
