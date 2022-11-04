@extends('layouts.app')
@section('title')
Hotels
@endsection
@section('pagetitle')
Hotels
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                           Hotels
                           <a href="javascript:void(0)" onclick="openaddhotel()" class="btn btn-outline-info btn-sm float-end">Create Hotel</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('includes.success')
                        @include('includes.errors')
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="htm">
                                        <thead>
                                            <tr>
                                                <th>Hotel Name</th>
                                                <th>Location</th>
                                                <th>No Of Rooms</th>
                                                <th>Image</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             @foreach ($allhotels as $hotel)
                                                 <tr>
                                            <td>{{$hotel->hotel_name}} </td>
                                            <td>{{$hotel->location}} </td>
                                            <td>
                                                <?php 
                                                  $rooms_count = DB::table('rooms')->where('hotel_branches_id',$hotel->id)->count();
                                                ?>
                                                {{$rooms_count}}
                                            </td>
                                            <td><img src="{{asset($hotel->image)}}" width="60" height="60" alt="image"></td>
                                            <td>
                                            <a href="{{route('htl.room',['id' => $hotel->id])}}"  class="btn btn-primary btn-sm">Rooms</a>                                     
                                            <a href="javascript:void(0)"  class="btn btn-info btn-sm" onclick="alert('{{$hotel->address}}')">View Address</a>                                     
                                            <a href="{{route('htl.edit',['id' => $hotel->id])}}"  class="btn btn-info btn-sm">Edit</a>                                     
                                            <a href="{{route('htl.delete',['id' => $hotel->id])}}" onclick = "return confirm('Are you sure you want to delete this hotel and all it\'s details');" class="btn btn-danger btn-sm">delete</a>                                     
                                            </td>
                                            </tr>  
                                             @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>

            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Hotel Branch</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold fs-3" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <h5 class="text-center"></h5>
           <form action="{{route('htl.store')}}" method="post" enctype="multipart/form-data" onsubmit="thisform()">
            @csrf
            <div class="form-group mb-3">
                <label for="hname">Hotel Branch Name</label>
                <input type="text" name="hotel_name" required id="hname" class="form-control border px-3" placeholder="Enter Hotel Name" value="{{old('hotel_name')}}">
            </div>
            <div class="form-group mb-3">
                <label for="loca">Location</label>
                <input type="text" name="location" required id="loca" class="form-control border px-3" placeholder="Enter Hotel Location" value="{{old('location')}}">
            </div>
            <div class="form-group mb-3">
                <label for="addrs">Address</label>
                <input type="text" name="address" required id="addrs" class="form-control border px-3" placeholder="Enter Hotel Address" value="{{old('address')}}">
            </div>
            <div class="form-group mb-3">
                <label for="imge">Hotel Image</label>
                <input type="file" name="image" required id="imge" class="form-control border px-3" accept=".jpg,.jpeg,.png" placeholder="Enter Hotel Name">
            </div>
            
              <div class="modal-footer">
               <button type="submit" class="btn btn-md bg-gradient-primary" id="btn">Submit</button>
              </div>
             
           </form>
        </div>
        
      </div>
    </div>
  </div>
@endsection
@section('adscript')
    <script>
    $(document).ready(function(){
       $("#htm").DataTable();
    });
</script>
<script>
    function openaddhotel(){
     $('#exampleModal').modal('show');
    }
  </script>
@endsection
