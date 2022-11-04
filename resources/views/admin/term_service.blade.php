@extends('layouts.admin')
@section('title')
Term of Service
@endsection

@section('adcontent')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Term of Service </h3>
               
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Term of Service</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                @include('includes.errors')  
                <form action="{{route('terms.save')}}" method="post" onsubmit="return performsubmit(this)">
                    @csrf
                             <div class="container">
                           
                            <div class="form-group">
                            
                            <textarea name="content" id="content" cols="30" rows="10">@if($trm ?? ""){!!$trm->content!!}@endif</textarea>
                            </div>
        
                             <div class="form-group">
                                <input type="submit" name="terms" id="terms" class="btn btn-primary bts"  value="Save Terms">
                            </div>                         
          </form>
        </div>
    </div>
</div>
</div>
</section>
</div>
@endsection
@section('adscripts')
     <script>
      CKEDITOR.replace('content');
      </script>
@endsection
