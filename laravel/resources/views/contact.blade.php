@extends("layouts.header")

@section('content')


    <!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/slide-1.jpeg);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
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
                                <div class="search-filters-wrap wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="1.7s">
                                    <form class="booking-form">
                                        <div class="bookingTypRow text-center radio-warp">
                                            <div class="radioCol">
                                                <input type="radio" name="bookingType" id="hourly" value="hourly" /><label for="hourly">Hotel by Hour</label>
                                            </div> <div class="radioCol">
                                                <input type="radio" name="bookingType" id="daily" value="daily" checked /><label for="daily">Hotel by Daily</label>
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

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Contact Us</h6>
                <h1 class="mb-5"><span class="text-primary text-uppercase">Contact</span> For Any Query</h1>
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Booking</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>book@E-hotel.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">General</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>info@E-hotel.com</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Technical</h6>
                            <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@E-hotel.com</p>
                        </div>
                    </div>
                    <div class="row gy-4">
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Booking</h6>
                            <p><i class="fa fa-phone text-primary me-2"></i>+234 700 555 6666</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">General</h6>
                            <p><i class="fa fa-phone text-primary me-2"></i>+234 700 505 6666</p>
                        </div>
                        <div class="col-md-4">
                            <h6 class="section-title text-start text-primary text-uppercase">Technical</h6>
                            <p><i class="fa fa-phone text-primary me-2"></i>+234 700 559 6666</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="500" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=24%20Iyalla%20St,%20Oregun%20101233,%20Ikeja&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://fmovies-online.net"></a>
                            <br>
                            <style>.mapouter{position:relative;text-align:right;height:500px;width:500px;}</style>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Subject</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                        <label for="message">Message</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@include('layouts.footer')

@endsection

