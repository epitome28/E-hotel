@extends("layouts.forntend")
@section('title')
E-Hotel - Room Details
@endsection
@section('content')

    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="wow fadeInUp my-3" data-wow-delay="0.1s">
                    <h4 class="text-dark">{{$rmdetail->hotelbranch->hotel_name}}</h4>
                    <p>{{$rmdetail->hotelbranch->address}}</p>
                </div>
            </div>
            <div class="w-100 my-4">
                <div class="row g-2">
                    <?php $i=0;?>
                    @foreach ($rmdetail->roomimages as $mitem)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{asset($mitem->images)}}" data-lightbox="images{{$i+1}}"><img class="img-fluid" src="{{asset($mitem->images)}}" width="100%" height="100%"  alt=""></a>
                    </div>
                    <?php $i++;?>
                    @endforeach
                </div>
            </div>
            <div class="row g-4 justify-content-start">
                <div class="col-12">
                    <h5 class="btn btn-dark rounded py-2 px-4">{{$rmdetail->room_name}}</h5>
                    <hr class="text-dark">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 w-80  wow fadeInUp" data-wow-delay="0.1s">
                   <div class="border border-dark rounded-3 overflow-hidden">
                    <div class="row  border-bottom">
                        <div class="col-md-3 col-lg-3 col-sm-12 border-end py-3">
                            <h5 class="text-dark px-2">{{$rmdetail->room_name}}
                                <span class="float-end">{{$rmdetail->room_capacity}}&nbsp;<i class="fas fa-user"></i></span>
                            </h5>
                        </div>
                        <div class="col-md-9 col-lg-9 col-sm-12 py-3">
                            <h5 class="text-dark">Room Amenities</h5>
                            <div class="d-flex mb-3">
                                @foreach ($rmdetail->roomfeatures as $rfitem)
                                <small class="me-3 pe-3 text-dark"><i class="fas fa-{{$rfitem->icon}} text-dark me-2"></i>{{$rfitem->icon_name}}</small>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row  py-2 px-2  justify-content-between">
                        @foreach ($rmdetail->roomdurations as $rditem)
                        <div class="col-md-6 col-lg-6 col-sm-12 my-2">
                            <i class="fas fa-clock text-primary"></i>&nbsp;<span class="text-dark">{{$rditem->hour}}</span>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 my-2">
                            <a href="{{route('book.checkout')}}?roomid={{$rmdetail->id}}&price={{$rditem->price}}&period={{$rditem->hour}}" class="btn btn-sm btn-outline-dark rounded-3 px-4  py-2 float-end">Pay&nbsp;&#x20A6;{{number_format($rditem->price)}}</a>
                        </div><hr>
                        @endforeach
                    </div>
                   </div>

                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="text-dark">Description</h4>
                            <p>{!!$rmdetail->room_description!!}</p>
                        </div>
                      </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <h4 class="text-center text-dark">Other Rooms</h4>
                    @foreach ($oths as $item)
                    <div class="card shadow rounded-3 bg-white">
                        <div class="card-body">
                            <a href="{{route('roomdetails',['slug' => $item->room_slug])}}"  title="view details"><h5 class="text-dark">{{$item->room_name}}</h5></a>
                            <div class="d-flex mb-3 overflow-hidden">
                                @foreach ($item->roomfeatures as $rfitem)
                                <small class="me-3 pe-3 text-dark"><i class="fas fa-{{$rfitem->icon}} text-dark me-2"></i>{{$rfitem->icon_name}}</small>
                                @endforeach
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Room End -->

@endsection
