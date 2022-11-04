@extends('layouts.app')
@section('title')
    About Us
@endsection
@section('pagetitle')
    About Us
@endsection
@section('adcontent')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">About Us</h4>
                    </div>
                    <div class="card-body">
                        @include('includes.errors')
                        @include('includes.success')
                
                <form action="{{route('about.biosave')}}" method="post" onsubmit="thisform()">
                    @csrf
                             <div class="container">
                           
                            <div class="form-group">
                            
                            <textarea name="content1" id="content" cols="30" rows="10">@if($abt ?? ""){!!$abt->content!!}@endif</textarea>
                            </div>
        
                             <div class="form-group mt-3">
                                <input type="submit" name="saveabout" id="btn" class="btn btn-lg bg-gradient-primary"  value="Save About">
                            </div>                         
          </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('adscript')
     <script>
      CKEDITOR.replace('content1');
      </script>
@endsection
