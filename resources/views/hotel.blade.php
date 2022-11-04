@extends("layouts.forntend")
@section('title')
E-Hotel - Our Hotels
@endsection
@section('content')

    <!-- Branches Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Hotels</h6>
                    <h4 class="mb-5">Explore Our<span class="text-primary text-uppercase"> Hotels</span></h4>
                </div>
                <div class="row g-4">
                    @foreach ($hotels as $hotel)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow h-auto shadow2 rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid" width="100%" height="100%" src="{{asset($hotel->image)}}" alt="{{$hotel->hotel_name}}">
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-2">
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
                </div>
            </div>

        </div>
    </div>
    <!-- Branches End -->

@endsection
