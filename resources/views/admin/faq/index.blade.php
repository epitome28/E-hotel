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
                      <h4 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="javascript:void(0)" onclick="modfaq()" class="btn btn-outline-info btn-sm float-end">Create</a></h4>
                      
                  </div>
                  <div class="card-body">
                    @include('includes.errors')
                    @include('includes.success')
                    <div class="table-responsive">
                               
                            <table class="table table-striped table-sm" id="faqs">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Title</th>
                                  <th>Content</th>
                                  
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                 <?php $i = 0;
                               
                                ?>
                                @foreach ($faqlist as $item)
                                    <tr>
                                <td>{{$i+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{!! substr($item->body,0,60) !!}</td>
                                   
                                  <td>
                                   <a class="btn btn-info btn-sm" href="{{route('faq.edit',['id' => $item->id])}}" title="edit">Edit</a>
                      <a class="btn btn-danger btn-sm" href="{{route('faq.delete',['id' => $item->id])}}" onclick="return confirm('Are you sure you want to delete this Record')" title="delete">Delete</a>
                      </td>
                                </tr>
                                <?php  $i++ ?>
                                @endforeach          
                              </tbody>
                            </table>
                            
                          </div>



    <div class="modal fade" id="watwe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
            <button type="button" class="btn-close text-dark font-weight-bold fs-3"  data-bs-dismiss="modal" aria-label="Close">&times;</button>
          </div>
          <div class="modal-body">
            <form action="{{route('admin.addquest')}}" method="post" onsubmit="thisform(this)">
                    @csrf
                                    
                    <div class="form-group">
                    <input type="text" name="name" id="title" class="form-control border mb-3 px-2" placeholder="Enter Caption" required autofocus value="{{old('name')}}">
                    
                        </div> 
                      
                        <div class="form-group">
                        <textarea name="body" id="" cols="30" class="form-control" placeholder="Enter message" rows="10">{{old('body')}}</textarea>
                        </div>
                                            
          </div>
          <div class="modal-footer">
            <button type="submit" id="btn" class="btn btn-success bts">Save</button>
          </div>
            </form>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</div>

@endsection
@section('adscript')
    <script>
        function modfaq(){
            $("#watwe").modal('show');
        }    
      CKEDITOR.replace('body');
    
     $(document).ready(function(){
       $("#faqs").DataTable();
    });
</script>
@endsection