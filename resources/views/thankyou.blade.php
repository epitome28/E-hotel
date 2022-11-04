@extends("layouts.forntend")
@section('title')
E-Hotel - Thank you
@endsection
@section('content')

    <!-- Branches Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="card col-8">
                        <div class="card-body">
                            @include('includes.success')
                            <div class="my-3 row justify-content-center">
                                <a href="{{route('welcome')}}" class="btn btn-primary">Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Branches End -->

@endsection
