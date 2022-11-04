@extends("layouts.forntend")
@section('title')
E-Hotel - Terms and conditions
@endsection
@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-white shadow " >
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center  text-uppercase">Terms & Conditions</h6>
                    
                </div>
                <section id="learning-goals" class="wrapper-content priva">
                    {!!$trm ? $trm->content : ""!!}
                </section>
            </div>

        </div>
    </div>

@endsection
