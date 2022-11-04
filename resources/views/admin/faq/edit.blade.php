@extends('layouts.app')
@section('title')
    Faq
@endsection
@section('pagetitle')
    Faq
@endsection
@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('admin.faq')}}"  class="btn btn-outline-info btn-sm float-end">Back</a></h4>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{route('faq.update',['id' => $edfq->id])}}" method="post"  enctype="multipart/form-data" onsubmit="thisform(this)">
                              @csrf
                                
                            <div class="form-group">
                                  <label for="title">Name</label>
                                <input type="text" name="name" id="title" class="form-control border mb-3 px-2"  value="{{$edfq->name}}">
                                </div>
                     
                            <div class="form-group">
                            <textarea name="body" id="" cols="30" class="form-control" placeholder="Enter message" rows="10">{{$edfq->body}}</textarea>
                            </div>
                  
                    <div class="form-group mt-3">
                        <a href="{{route('admin.faq')}}" class="btn btn-danger">Back</a>
                        <button type="submit" id="btn" class="btn btn-success bts">Update Record</button>
                    </div>
                </form>
           
    </div>
</div>
</div>
</div>

@endsection
@section('adscript')
  <script>
          CKEDITOR.replace('body');
      </script>
@endsection