@extends("layouts.header")

@section('content')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/slide-2.jpeg);" >
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Booking Start -->
    <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="bg-white shadow" >
                <div class="row g-2">
                    <div class="hotel-search-box">
                        <div class="container">
                            <div class="banner-search-form">
                                <p class="type"><span class="bookingIcon">Booking Type</span></p>
                                <div class="search-filters-wrap wow fadeInUp" data-wow-duration="0.4s" data-wow-delay="0.5s">
                                    <form class="booking-form">
                                        <div class="bookingTypRow text-center radio-warp">
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="hourly" value="hourly" /><label for="hourly">Hotel by Hour</label>
                                            </div>
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Hotel by Day</label>
                                            </div>
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Hotel by night</label>
                                            </div>
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Group Stay</label>
                                            </div>

                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="weekly" value="weekly" /><label for="weekly">Short Stay</label>
                                            </div>
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="monthly" value="monthly" /><label for="monthly">Long Stay</label>
                                            </div>
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="annual" value="annual" /><label for="annual">Service Apartment </label>
                                            </div>
                                        </div>
                                        <div class="search-filter-Row clearfix">
                                            <div class="common-cols city-coloumn ">
                                                <label  class="cityIcon">City or Place</label>
                                                <input type="text" id="searchText" class="form-control" placeholder="Enter City or Hotel name">
                                            </div>
                                            <div class="common-cols chkin-field">
                                                <label for="txtChkIn" class="calenderIcon">Check In</label>
                                                <input id="txtChkIn" type="date" class="form-control" name="">
                                            </div>
                                            <div class="common-cols chkin-field has-caret hour-type" style="display:none">
                                                <label style="padding-left:0">In-Time</label>
                                                <select class="form-control" id="ddlCheckInTime" onchange="bindCheckOutTime()">
                                                    <option value="0">--:--</option>
                                                    <option value=" 01:00">01:00 AM</option>
                                                    <option value=" 02:00">02:00 AM</option>
                                                    <option value=" 03:00">03:00 AM</option>
                                                    <option value=" 04:00">04:00 AM</option>
                                                    <option value=" 05:00">05:00 AM</option>
                                                    <option value=" 06:00">06:00 AM</option>
                                                    <option value=" 07:00">07:00 AM</option>
                                                    <option value=" 08:00">08:00 AM</option>
                                                    <option value=" 09:00">09:00 AM</option>
                                                    <option value=" 10:00">10:00 AM</option>
                                                    <option value=" 11:00">11:00 AM</option>
                                                    <option value=" 12:00">12:00 PM</option>
                                                    <option value=" 13:00">01:00 PM</option>
                                                    <option value=" 14:00">02:00 PM</option>
                                                    <option value=" 15:00">03:00 PM</option>
                                                    <option value=" 16:00">04:00 PM</option>
                                                    <option value=" 17:00">05:00 PM</option>
                                                    <option value=" 18:00">06:00 PM</option>
                                                    <option value=" 19:00">07:00 PM</option>
                                                    <option value=" 20:00">08:00 PM</option>
                                                    <option value=" 21:00">09:00 PM</option>
                                                    <option value=" 22:00">10:00 PM</option>
                                                    <option value=" 23:00">11:00 PM</option>

                                                </select>
                                            </div>
                                            <div class="common-cols chkin-field has-caret hour-type" style="display:none">
                                                <label style="padding-left:0">Out-Time</label>
                                                <select class="form-control" id="ddlCheckOutTime">
                                                    <option value="0">--:--</option>
                                                </select>
                                            </div>
                                            <div class="common-cols chkin-field">
                                                <label for="txtChkOut" class="calenderIcon">Check Out</label>
                                                <input id="txtChkOut" type="date" class="form-control" name="">
                                            </div>
                                            <div class="common-cols common-cols-lg chkin-field">
                                                <label  class="adultIcon"> Adults</label>
                                                <input type="number" id="txtAdult" class="form-control" value="0" min="0" max="100" step="1" />
                                            </div>
                                            <div class="common-cols common-cols-lg chkin-field">
                                                <label for="children" class="childrenIcon"> Children</label>
                                                <input type="number" id="children" class="form-control" value="0" min="0" max="100" step="1" />
                                            </div>

                                            <div class="common-cols common-cols-lg has-caret chkin-field">
                                                <label for="price" class="priceIconWrap">Price</label>
                                                <select id="price" class="form-control">
                                                    <option value="1000-2000">&#8358; 1000 - 2000</option>
                                                    <option value="2000-5000">&#8358; 2000 - 5000</option>
                                                    <option value="5000-10000">&#8358; 5000 - 10000</option>
                                                    <option value="10000-20000">&#8358; 10000 - 20000</option>
                                                    <option selected value="">any</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-row">
                                            <input type="button" id="btnSearch" class="common-btn" value="Search" />
                                            <a href="javascript:void(0);" id="btnSearchUrl" class="btn" style="display:none">Search</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">E-Hotel</span></h1>
                    <p class="mb-4">Welcome to E-hotel, where you be like KING and QUEEN, a comfort zone you ever wanted to be, where you will always want to be and spend your night always</p>
                    <div class="row g-3 pb-4">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">100</h2>
                                    <p class="mb-0">Rooms</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">20</h2>
                                    <p class="mb-0">Staffs</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="border rounded p-1">
                                <div class="border rounded text-center p-4">
                                    <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                    <h2 class="mb-1" data-toggle="counter-up">1329</h2>
                                    <p class="mb-0">Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img/about1.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img/about2.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img/about3.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img/about4.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our Team</h6>
                <h1 class="mb-5">Explore Our <span class="text-primary text-uppercase">Staffs</span></h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded shadow shadow1 overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid team-img" src="img/team-1.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Sunny Oshinsegun</h5>
                            <small>Chairman</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="rounded shadow shadow1 overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid team-img" src="img/bukola.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Recheal Oluwabukola</h5>
                            <small>Manager</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="rounded shadow shadow1 overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid team-img" src="img/akin.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Alabi Akinwumi</h5>
                            <small>Manager</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="rounded shadow shadow1 overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid team-img " src="img/bunmi.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Egunjobi Olubunmi </h5>
                            <small>Manager</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    @include('layouts.footer')
@endsection
