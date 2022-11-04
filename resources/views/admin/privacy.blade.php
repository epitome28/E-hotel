@extends('layouts.app')
@section('title')
Privacy Policy
@endsection
@section('pagetitle')
Privacy Policy
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                @include('includes.errors')
                @include('includes.success')
                <form action="{{route('privacypg.save')}}" method="post"  onsubmit="thisform()">
                    @csrf
                             <div class="container">
                           
                            <div class="form-group">
                            
                            <textarea name="content" id="content" cols="30" rows="10">@if($prv ?? ""){!!$prv->content!!}@endif</textarea>
                            </div>
        
                             <div class="form-group mt-3">
                                <input type="submit" name="privacy" id="btn" class="btn btn-primary bts"  value="Save Privacy">
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
