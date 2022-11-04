@extends("layouts.forntend")
@section('title')
E-Hotel - Rooms
@endsection
@section('content')
  <!-- Page Header Start -->
  <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{asset('img/slide-1.jpeg')}});">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center pb-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown"></h1>
        </div>
    </div>
</div>
<!-- Page Header End -->

 <!-- Booking Start -->
 @include('includes.searchform')
 <!-- Booking End -->

    <!-- Branches Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                @if (!empty($hotl))
                <h1 class="text-dark">{{ucwords($hotl->hotel_name)}}</h1>
                <p class="text-dark"><small>{{$hotl->address}}</small></p>
                <p>
                    <?php 
                          $rooms_count = DB::table('rooms')->where('hotel_branches_id',$hotel->id)->count();
                        ?>
                 {{$rooms_count}}&nbsp;<i><small>Rooms</small></i>
                </p>
                <div class="d-flex justify-content-end my-3">
                    <a class="btn btn-sm btn-outline-primary rounded py-2 px-4" href="{{url('/hotels/room/'.$hotl->hotel_slug)}}">View More</a>
                </div>
                 <div class="w-100">
                    <img src="{{asset($hotl->image)}}" class="img-fluid rounded-3 w-100 h-100" alt="hotel-image">
                 </div>
                 
                @elseif(!empty($rooms))

                <div class="row g-4">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <h3 class="text-dark">{{count($rooms)}} Result Found</h3>
                    </div>
                    @foreach ($rooms as $rmitem)
                         <div class="col-lg-4 col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="room-item shadow shadow2 rounded overflow-hidden h-auto">
                            <div class="position-relative romimgs">
                                @foreach ($rmitem->roomimages as $mitem)
                                <img class="img-fluid" src="{{asset($mitem->images)}}" alt="">
                                @endforeach
                                {{-- <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">#36,450 - #46,950</small> --}}
                            </div>
                            <div class="px-2 mt-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0">{{$rmitem->hotelbranch->hotel_name}}</h5>
                                    <h6><small>from</small>
                                        @foreach ($rmitem->roomdurations->take(1) as $rditem)
                                        &#x20A6;{{number_format($rditem->price)}}
                                        @endforeach
                                    </h6>
                                </div>
                                <p class="text-body mb-3">{{$rmitem->hotelbranch->address}}</p>
                                <div class="d-flex text-center">
                                    @foreach ($rmitem->roomfeatures as $rfitem)
                                        <small class="text-sm text-lowercase">
                                        <i class="w-100 m-auto text-dark fas fa-{{$rfitem->icon}}"></i>
                                            <small class="w-100 m-auto text-dark px-1">{{$rfitem->icon_name}}</small>
                                        </small>
                                    @endforeach
                                </div>
                                <div class="d-flex mt-2 py-3">
                                    @foreach ($rmitem->roomdurations as $rditem)
                                    <a class="btn btn-sm btn-outline-dark rounded mx-1" href="{{route('roomdetails',['slug' => $rmitem->room_slug])}}">{{$rditem->hour}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
                @else
                <h2 class="text-center">No Result Found</h2>
                @endif
                
            </div>

        </div>
    </div>
    <!-- Branches End -->

@endsection
@section('fscript')
<script type="text/javascript">
    $(document).ready(function(){
      $('.romimgs').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        fade: true,
      });

        //console.log(locations);
     });
    </script>

@endsection