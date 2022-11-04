@extends('layouts.app')
@section('title')
    Testimonial
@endsection
@section('pagetitle')
    Testimonial
@endsection
@section('adcontent')
<div class="row">
       <div class="card">
           <div class="card-header">
            Testimonial &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('tst.index')}}" class="btn btn-info btn-sm float-end">Back</a>
           </div>
           <div class="card-body">
            <form action="{{route('tst.update',['id' => $tsed->id])}}" method="post" onsubmit="thisform(this)" enctype="multipart/form-data">
                @csrf 
                
                        <div class="form-group">
                          <input type="text" name="name" id="name" class="form-control border mb-3 px-2" placeholder="Enter Name" value="{{$tsed->name}}">     
                        </div>                          
                       <div class="form-group">
                           <textarea name="content" id="content" class="form-control" cols="30" rows="10">{!!$tsed->content!!}</textarea>
                     </div> 
                                                     
                     <div class="form-group mt-3">
                         <button type="submit" id="btn" class="btn btn-success px-3 bts">Update</button>
                         <img src="{{asset('loader/ajax-loader.gif')}}" id="shwstatus" style="display: none" alt="icon">
                 </div>                          
            </form>
           </div>
       </div>
</div>

@endsection

@section('adscript')
     <script>
      CKEDITOR.replace('content');
      </script>

@endsection