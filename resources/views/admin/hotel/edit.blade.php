@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('pagetitle')
    Edit
@endsection
@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('htl')}}"  class="btn btn-outline-info btn-sm float-end">Back</a></h4>
                        
                    </div>
                    <div class="card-body">
                       
                        @include('includes.errors')
                        <form action="{{route('htl.update',['id' => $hid->id])}}" method="post"  enctype="multipart/form-data" onsubmit="thisform(this)">
                              @csrf
                                
                              <div class="form-group mb-3">
                                <label for="hname">Hotel Branch Name</label>
                                <input type="text" name="hotel_name" required id="hname" class="form-control border px-3" placeholder="Enter Hotel Name" value="{{$hid->hotel_name}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="loca">Location</label>
                                <input type="text" name="location" required id="loca" class="form-control border px-3" placeholder="Enter Hotel Location" value="{{$hid->location}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="addrs">Address</label>
                                <input type="text" name="address" required id="addrs" class="form-control border px-3" placeholder="Enter Hotel Address" value="{{$hid->address}}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="imge">Hotel Image</label><br>
                                <img src="{{asset($hid->image)}}" width="80" height="80" alt=""><br><br>
                                <input type="file" name="image"  id="imge" class="form-control border px-3" accept=".jpg,.jpeg,.png">
                            </div>
                  
                    <div class="form-group mt-3">
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