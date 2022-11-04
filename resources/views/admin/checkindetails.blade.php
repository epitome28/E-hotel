@extends('layouts.app')
@section('title')
    Subcribers
@endsection
@section('pagetitle')
    Details
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Check In or Out Detail</div>
                    <div class="card-body">
                        @include('includes.success')
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                       
                                        <tbody>
                                           <tr><td>Customer Name</td><td>{{$ch->client_name}} </td></tr>  
                                           <tr><td>Phone</td><td>{{$ch->client_phone}}</td></tr>  
                                           <tr><td>Alternative Phone</td><td>{{$ch->client_alt_phone}}</td></tr>  
                                           <tr><td>Booking Option</td><td>{{$ch->bookoption}}</td></tr>  
                                           <tr><td>Room Type</td><td>{{$ch->room_type}}</td></tr>  
                                           <tr><td>Room Name</td><td>{{$ch->room->room_name}}</td></tr>  
                                           <tr><td>Duration</td><td>{{$ch->duration}}</td></tr>  
                                           <tr><td>Timing</td><td>{{$ch->timing}}</td></tr>  
                                           <tr><td>Check In</td><td>{{$ch->checkin}}</td></tr>  
                                           <tr><td>Check Out</td><td>{{$ch->checkout}}</td></tr>  
                                           <tr><td>Time In</td><td>{{$ch->time_in}}</td></tr>  
                                           <tr><td>Time Out</td><td>{{$ch->time_out}}</td></tr>  
                                           <tr><td>Checkedin By</td><td>{{$ch->checkedin_by}}</td></tr>  
                                           <tr><td>Checkedout By</td><td>{{$ch->checkedout_by}}</td></tr>  
                                           <tr><td>No Of People</td><td>{{$ch->no_people}}</td></tr>  
                                           <tr><td>Created On</td><td>{{$ch->room_type}}</td></tr>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        
@endsection
@section('adscript')
    <script>
    $(document).ready(function(){
       $("#newsleter").DataTable();
    });
</script>
@endsection
