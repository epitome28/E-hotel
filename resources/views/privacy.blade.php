@extends("layouts.forntend")
@section('title')
E-Hotel - Privacy Policy
@endsection
@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-white shadow " >
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Our Privacy Policy</h6>
                    <h3 class="mb-5">Explore Our <span class="text-primary text-uppercase">Privacy Policy</span></h3>
                </div>
                <section id="learning-goals" class="wrapper-content priva">
                  {!!$prv ? $prv->content : ""!!}
                </section>
            </div>

        </div>
    </div>

@endsection
