@extends("layouts.forntend")
@section('title')
E-Hotel -Gallery
@endsection
@section('content')

    <!-- Branches Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Gallery</h6>
                    <h4 class="mb-5">Some beautiful Shots of our <span class="text-primary text-uppercase">Hotel</span></h4>
                </div>
                <div class="row g-4">
                    <?php $i=0;?>
                    @foreach ($galls as $g)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{asset($g->imagefile)}}" data-lightbox="image{{$i+1}}"><img class="img-fluid" src="{{asset($g->imagefile)}}" alt=""></a>
                    </div>
                    <?php $i++;?>
                    @endforeach
                    
                </div>
            </div>

        </div>
    </div>
    <!-- Branches End -->

@endsection
