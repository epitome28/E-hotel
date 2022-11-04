@extends('layouts.app')
@section('title')
    Terms And Conditions
@endsection
@section('pagetitle')
    Terms And Conditions
@endsection
@section('adcontent')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Terms And Conditions</h4>
            </div>
            <div class="card-body">
                @include('includes.errors')
                @include('includes.success')
        <form action="{{route('terms.save')}}" method="post"  onsubmit="thisform()">
            @csrf
                     <div class="container">
                   
                    <div class="form-group">
                    
                    <textarea name="content" id="content" cols="30" rows="10">@if($trm ?? ""){!!$trm->content!!}@endif</textarea>
                    </div>

                     <div class="form-group mt-3">
                        <input type="submit" name="terms" id="btn" class="btn btn-primary bts"  value="Save">
                    </div>                         
  </form>
</div>
</div>
</div>
</div>

@endsection
@section('adscript')
<script>
CKEDITOR.replace('content');
</script>
@endsection
