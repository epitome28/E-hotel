@extends('layouts.app')
@section('title')
Rooms
@endsection
@section('pagetitle')
Rooms
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                           Rooms For {{$htlname->hotel_name}}
                           <a href="{{route('htl')}}" class="float-end mx-2 btn btn-outline-danger btn-sm">Back</a>
                           <a href="{{route('htlroom.create')}}?hotelid={{$htlname->id}}" class="float-end btn btn-outline-info btn-sm">ADD Room</a>
                          
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('includes.success')
                        @include('includes.errors')
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="rhtm">
                                        <thead>
                                            <tr>
                                                <th>Room Name</th>
                                                <th>Room Type</th>
                                                <th>Room Capacity</th>
                                                <th>State</th>
                                                <th>City</th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             @foreach ($allrooms as $room)
                                                 <tr>
                                            <td>{{$room->room_name}} </td>
                                            <td>{{$room->room_type}} </td>
                                            <td>{{$room->room_capacity}} </td>
                                            <td>{{$room->state}} </td>
                                            <td>{{$room->city}}</td>
                                            <td>                                   
                                            <a href="{{route('htlroom.edit',['id' => $room->id])}}?hotelid={{$htlname->id}}"  class="btn btn-info btn-sm">Edit</a>                                     
                                            <a href="{{route('htlroom.delete',['id' => $room->id])}}" onclick = "return confirm('Are you sure you want to delete these room and it\'s features');" class="btn btn-danger btn-sm">delete</a>                                     
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
{{-- <div class="modal fade" id="exampleModalrm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Room</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold fs-3" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <h5 class="text-center"></h5>
           
        </div>
        <div class="modal-footer ">
            <button type="submit" class="btn btn-md bg-gradient-primary" id="btn">Submit</button>
           </div>
          
        </form>
      </div>
    </div>
  </div> --}}
@endsection
@section('adscript')
    <script>
    $(document).ready(function(){
       $("#rhtm").DataTable();
//console.log(locations);
    });
</script>


@endsection
