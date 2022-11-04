@extends("layouts.forntend")
@section('title')
E-Hotel - Faq
@endsection
@section('content')

    <!-- start Frequently Asked Questions Section -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Our FAQ</h6>
                <h3 class="mb-5">Explore Our <span class="text-primary text-uppercase">FAQ</span></h3>
            </div>
          <div class="row justify-content-center">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <section id="learning-goals" class="wrapper-content priva">
                    <div class="accordion" id="accordionExample">
                      @foreach ($faqs as $fqitem)
                           <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$fqitem->faqid}}" aria-expanded="true" aria-controls="collapseOne">
                              {{$fqitem->name}}
                            </button>
                          </h2>
                          <div id="collapseOne{{$fqitem->faqid}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              {!!$fqitem->body!!}
                            </div>
                          </div>
                        </div>
                      @endforeach
                       
                      </div>
                  
                </section>
            </div>
          </div>
        </div>
    </div>

   <!-- End Frequently Asked Questions Section -->

@endsection
