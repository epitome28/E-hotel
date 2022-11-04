@extends('layouts.app')
@section('title')
 Create Room
@endsection
@section('pagetitle')
 Create Room
@endsection
@section('adcontent')
<?php
 if(!empty($_GET['hotelid'])){
    $hotelid = $_GET['hotelid'];
 }
?>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create Room  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('htl.room',['id' => $hotelid])}}"  class="btn btn-outline-info btn-sm float-end">Back</a></h4>
                        
                    </div>
                    <div class="card-body">
                        @include('includes.errors')
                        <form action="{{route('htlroom.store')}}" method="post" enctype="multipart/form-data" onsubmit="thisform()">
                            @csrf
                            <input type="hidden" name="hotel_id" value="{{$hotelid}}">
                            <input type="hidden" name="redirect_url" value="{{route('htl.room',['id' => $hotelid])}}">
                            <div class="row">
                                <div class="form-group col-md-12 col-lg-12 col-sm-12 mb-3">
                                    <label for="rm">Room Type</label>
                                    <select name="room_type" id="rm" class="form-control border px-3">
                                        <option selected disabled>Select...</option>
                                        <option value="budget">Budget Room</option>
                                        <option value="standard">Standard Room</option>
                                        <option value="executive">Executive Room</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                    <label for="rmme">Room Name</label>
                                    <input type="text" name="room_name" required id="rmme" class="form-control border px-3" placeholder="Enter Room Name" value="{{old('room_name')}}">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mb-3">
                                      <label class="form-label">Room Booking Options</label>
                                      <select name="bookingoption" class="form-control border px-3"  id="rbtype" autocomplete="off">
                                        <option selected disabled>Select Options</option>
                                        <option value="by hour">By Hour</option>
                                        <option value="by day">By Day</option>
                                        <option value="by night">By Night</option>
                                        <option value="group stay">Group Stay</option>
                                        <option value="short stay">Short Stay</option>
                                        <option value="long stay">Long Stay</option>
                                        <option value="service apartment">Service Apartment</option>
                                        <option value="full booking">Full Booking</option>
                                      </select>
                                    </div>
                                    <img src="{{asset('images/ajax-loader.gif')}}" id="ms" style="display: none" alt="loading">
                                  </div>
                               
                            </div>
                            <div class="mb-2" id="shwdrua" style="display:none">
                                <h6 class="my-2">Set Room Duration and Price</h6>
                                <table class="table table-sm" id="tbl">
                                    <tr>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th> </th>
                                    </tr>
                                    <tbody id="rmdrbody">
                                      <tr class="addrow">
                                        <td>
                                            <select name='room_durations[]' id='optns'  autocomplete='off'  class='form-control col-lg-12 col-md-12 col-xs-12 border px-3'></select>
                                        </td>
                                        <td>
                                            <input type="number" name="price[]"  required placeholder="Booking Price" class="border px-3 form-control col-lg-12 col-md-12 col-xs-12" autocomplete="off">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-danger font-weight-bold fs-6" style="cursor:pointer;"  title="remove row" onclick="removetr(this)">&times;</button>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table>
                                <div class="my-3">
                                    <button type="button" class="btn btn-info btn-sm float-start my-3" title="click to add new"  onclick="addmoreopt('rmdrbody')">Add More</button>
                                </div>
                            </div>
                           
                            <br><br>
                            <hr>

                           <div class="row">
                            <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                <label for="imge">Select Room Images (select multiple)</label>
                                <input type="file" name="images[]" multiple required id="imge" class="form-control border px-3" accept=".jpg,.jpeg,.png" placeholder="Enter images">
                            </div>
                            <div class="form-group col-md-6 col-lg-6 col-sm-12 mb-3">
                                <label for="rmcit">Room Capacity</label>
                                <input type="number" name="room_capacity" required id="rmcit" class="form-control border px-3" accept=".jpg,.jpeg,.png" placeholder="Enter Hotel Name">
                            </div>
                           </div>
                            <div class="form-group mb-3">
                                <label for="rmdesc">Room Description</label>
                                <textarea name="room_description" id="rmdesc" cols="30" rows="10"></textarea>
                            </div>
                            
                            
                            <div class="mb-2">
                                <div><h6 class="my-3">Room Features</h6></div>
                                <table class="table table-sm">
                                    <tr>
                                        <th>Icons</th>
                                        <th> </th>
                                    </tr>
                                    <tbody id="clbody">
                                        <tr>
                                            <td>
                                                <select name='icons[]' autocomplete='off' onchange="document.getElementById('decri').value=this.options[this.selectedIndex].textContent" class='form-control col-lg-12 col-md-12 col-xs-12 border px-3' required>
                                                    <option selected disabled>Select Icons</option>
                                                    <option value='bed'>Bed </option>
                                                    <option value='mug-hot'>Breakfast </option>
                                                    <option value='wine-glass-alt'>Bar </option>
                                                    <option value='wifi'>Wifi </option>
                                                    <option value='car'>Car Park</option>
                                                    <option value='shower'>Bathroom</option>
                                                    <option value='tv'>Television</option>
                                                    <option value='swimmer'>Pool</option>
                                                    <option value='dumbbell'>Gym</option>
                                                    <option value='utensils'>Resturant</option>
                                                    </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="description[]" required placeholder="Icon Description" id="decri" class="border px-3 form-control col-lg-12 col-md-12 col-xs-12">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                           <button type="button" class="btn btn-info btn-sm float-start my-3" title="click to add new" id="addclrecord">Add Features</button>
                           <br><br>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                     <label for="rmdesc">State</label>
                                    <select name='state' id="states" autocomplete='off' onchange="getcities(this.value)" class='form-control col-lg-12 col-md-12 col-xs-12 border px-3' required>
                                       
                                        </select>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12">
                                     <label for="rmdesc">City</label>
                                    <select name='city' id="cites" autocomplete='off'  class='form-control col-lg-12 col-md-12 col-xs-12 border px-3' required>
                                       
                                    </select>
                                </div>
                            </div>
                           <div class="form-group">
                            <button type="submit" class="btn btn-md bg-gradient-primary float-end" id="btn">Submit</button>
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
        
    $("#addclrecord").click(function(){
    $("#savebtn").show();
    let exp = new Date().getTime();
    let section ="<select name='icons[]' id='opt"+exp+"' autocomplete='off'  class='form-control col-lg-12 col-md-12 col-xs-12 border px-3' required><option selected disabled>Select Icons</option>\
        <option value='bed'>Bed </option>\
        <option value='mug-hot'>Breakfast</option>\
        <option value='wine-glass-alt'>Bar </option>\
        <option value='wifi'>Wifi </option>\
        <option value='car'>Car Park</option>\
        <option value='shower'>Bathroom</option>\
        <option value='tv'>Television</option>\
        <option value='swimmer'>Pool</option>\
        <option value='dumbbell'>Gym</option>\
        <option value='utensils'>Resturant</option>\
        </select>";
    let html = '<tr id="cltdrow'+exp+'"><td>'+section+'</td>\
    <td align="left"><input type="hidden" name="description[]" id="desc'+exp+'" required placeholder="Icon Description" class="border px-3 form-control col-lg-12 col-md-12 col-xs-12"></td>\
    <td align="center"><span class="cldeltrow'+exp+' text-danger font-weight-bold" style="cursor:pointer;"  title="remove row"><i class="fas fa-trash"></i></span></td></tr>';

    $("#clbody").append(html);
    
    $(".cldeltrow"+exp).click(function(){
        $("#cltdrow"+exp).remove();
    });

    $("#opt"+exp).change(function(){
        let gettxt = $("#opt"+exp).find('option:selected').text();
        $("#desc"+exp).val(gettxt); 
    });
    });

        $("#rbtype").change(function(){
            let opt = $("#rbtype").val();
           
            let url = "{{route('htl.gethrs')}}";
            // alert(url);
            $.ajax({
                url: url,
                method: "get",
                data:{typ:opt},
                beforeSend:function(){
                    $("#ms").show();
                },
                success:function(data){
                   if(data == 0){
                    $("#ms").hide();
                    $("#shwdrua").hide();
                   }else{
                    $("#optns").html(data);
                    $("#shwdrua").show();
                    $("#ms").hide();
                   }
                },
                error:function(){
                    alert('An Error Ocurred');
                    $("#ms").hide();
                }
            });
        
        });
});
</script>

<script>
    CKEDITOR.replace('room_description',{
        height: '150'
    });
    </script>
    <script>
    function addmoreopt(rmdrb){
        //alert(rmdrb);
          let tbbody = document.getElementById(rmdrb),
        //   ;
               fr_tr = tbbody.firstElementChild;
               tr_clone = fr_tr.cloneNode(true);
              // console.log(tr_clone);

               tbbody.append(tr_clone);
        //clean_inpr(tbbody.firstElementChild);
        }
    
    </script>
   
    <script> 
        function removetr(thtr){
            if(thtr.closest('tbody').childElementCount == 1){
                alert('sorry you can\'t delete these row');
            }else{
                thtr.closest('tr').remove();
            }
        }
    </script>
    <script>
        init();
        function init(){
            let options = "<option selected disabled>Select State</option>";
            for(let s =0; s<locations.length; s++){
                options += "<option value="+locations[s].name+">"+locations[s].name+"</option>";
            }
            document.getElementById("states").innerHTML=options;
        }
        function getcities(city){
            let options = "<option selected disabled>Select State</option>";
            for(var s=0; s < locations.length; s++){
              if(locations[s].name == city){
                // console.log('city', locations.length[s].name);
                let cities = locations[s].lgas;
                for(let i=0; i<cities.length;i++){
                    options += "<option value="+cities[i]+">"+cities[i]+"</option>";
                }
              }
            }
            document.getElementById("cites").innerHTML=options;
        }
    </script>
@endsection