@extends('layouts.app')
@section('title')
Booking Options
@endsection
@section('pagetitle')
Booking Options
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                           Booking Options
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('includes.success')
                        @include('includes.errors')
                    <div class="my-3">
                        <form action="{{route('bkopt.store')}}" method="post" onsubmit="thisform(this)">
                            @csrf
                            <input type="hidden" name="filter" value="true">
                            <div class="table responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Booking Option</th>
                                        <th>Duration</th>
                                        <th>
                                            <button type="button" id="addbkoptrecord" class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Add</button>
                                        </th>
                                    </tr>
                                    <tbody id="bkoptbody">
                                    </tbody>
                                </table>
                            </div>
                           <div class="row justify-content-end">
                            <div class="form-group col-12">
                                <button type="submit" class="btn btn-success btn-md float-end savebtn" style="display: none"  id="btn">Submit</button>
                               </div>
                           </div>
                          </form>
                    </div><hr>
                                <div class="table-responsive mt-2">
                                    <table class="table table-bordered" id="htm">
                                        <thead>
                                            <tr>
                                                <th>Booking Option</th>
                                                <th>Durations</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             @foreach ($bookopts as $opt)
                                                 <tr>
                                            <td>{{ucwords($opt->room_options)}} </td>
                                            <td>{{$opt->hours}} </td>
                                            <td>                                   
                                            <a href="javascript:void(0)" onclick="editopt('{{$opt->id}}','{{$opt->room_options}}','{{$opt->hours}}')"  class="btn btn-info btn-sm">Edit</a>                                     
                                            <a href="{{route('bkopt.delete',['id' => $opt->id])}}" onclick = "return confirm('Are you sure you want to delete this hotel and all it\'s details');" class="btn btn-danger btn-sm">delete</a>                                     
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
<div class="modal fade" id="bkModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Booking Options</h1>
          <button type="button" class="btn-close text-dark font-wieght-bold fs-3" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <h5 class="text-center"></h5>
           <form action="{{route('bkopt.update')}}" method="post" enctype="multipart/form-data" onsubmit="thisform()">
            @csrf
            <div class="form-group mb-3">
                <label for="hname">Booking Option</label>
                <input type="text" name="bookopt" required id="bkp" class="form-control border px-3" placeholder="Enter Hotel Name" value="{{old('hotel_name')}}">
            </div>
            <div class="form-group mb-3">
                <label for="loca">Durations</label>
                <input type="text" name="duration" required id="durtn" class="form-control border px-3" placeholder="Enter Hotel Location" value="{{old('location')}}">
            </div>
           <input type="hidden" name="uid" id="bkuid" value="">
            
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

       $("#addbkoptrecord").click(function(){
    $(".savebtn").show();
    let exp = new Date().getTime();
    let section ='<select name="booking_option[]" class="form-control border px-3"  id="bkopttp'+exp+'" autocomplete="off">\
                <option selected disabled>Select Options</option>\
                <option value="by hour">By Hour</option>\
                <option value="by day">By Day</option>\
                <option value="by night">By Night</option>\
                <option value="group stay">Group Stay</option>\
                <option value="short stay">Short Stay</option>\
                <option value="long stay">Long Stay</option>\
                <option value="service apartment">Service Apartment</option>\
                <option value="full booking">Full Booking</option>\
                </select>';
    let html = '<tr id="bktdrow'+exp+'"><td>'+section+'</td>\
    <td align="left"><input type="text" name="duration[]" id="durtn'+exp+'" class="form-control border px-3" required autocomplete="off"></td>\
    <td align="center"><span class="bkdeltrow'+exp+' text-danger font-weight-bold" style="cursor:pointer;"  title="remove row"><i class="fas fa-trash"></i></span></td></tr>';

    $("#bkoptbody").append(html);
    
    $(".bkdeltrow"+exp).click(function(){
        $("#bktdrow"+exp).remove();
    });

      });
    });
</script>
<script>
    function editopt(id,r,h){
     $('#bkModal').modal('show');
     $('#bkuid').val(id);
     $('#bkp').val(r);
     $('#durtn').val(h);
    }
  </script>
@endsection
