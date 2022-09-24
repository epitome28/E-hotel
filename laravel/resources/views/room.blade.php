@extends("layouts.header")

@section('content')

    <!-- Branches Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Branches</h6>
                    <h4 class="mb-5">Which location will you like to stay in our <span class="text-primary text-uppercase">Branches</span></h4>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/white house.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#36,450 - #46,950</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">White House</h5>
                                </div>
                                <p class="text-body mb-3">24 Iyalla Street, Beside Ikeja City Mall, Alausa, Lagos, Nigeria</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{url('room-details1')}}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/iyala.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#9,450 - #46,950</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Iyala</h5>
                                </div>
                                <p class="text-body mb-3"> 3 Iyalla Street, Alausa, Ikeja, Lagos, Nigeria</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{url('room-details2')}}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/Allen.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#8,400 - #16,485</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Allen</h5>
                                </div>
                                <p class="text-body mb-3">1 Folawewo, Ogundana St, Allen, Ikeja, Lagos, Nigeria</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{url('room-details3')}}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/118.jpg" alt="">
{{--                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#8,400 - #16,485</small>--}}
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">118</h5>
                                </div>
                                <p class="text-body mb-3">118, Awolowo Way, Ikeja, Lagos, Nigeria</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{url('room-details5')}}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/faita.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#11,025 - #26,750</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Fatai</h5>
                                </div>
                                <p class="text-body mb-3">23 Fatai Irawo Street, Off Muritala Muhamed Intl Airport Road, Ajao Estate, lagos</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{url('room-details5')}}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" src="img/babatola.jpg" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#9,450 - #46,950</small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">Babatola</h5>
                                </div>
                                <p class="text-body mb-3">3, Babatola Drive, Opposite Computer Village, Ikeja, Lagos</p>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-sm btn-dark rounded py-2 px-4" href="{{url('room-details6')}}">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Branches End -->

@include('layouts.footer')
@endsection
