@extends('layouts.app')
@section('title')
    Check In
@endsection
@section('pagetitle')
    Check In
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                           All Active Check In
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('includes.success')
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" id="chein">
                                        <thead>
                                            <tr>
                                                <th>Sn</th>
                                                <th>Client Name</th>
                                                <th>Room Type</th>
                                                <th>Room Name</th>
                                                <th>Booking Option</th>
                                                <th>Duration</th>
                                                 <th>Price</th>
                                                <th>Checked In</th>
                                                <th>Checked In By</th>
                                                <th>Room Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                            <?php $i=0;?>
                                             @foreach ($chins as $ch)
                                                 <tr>
                                            <td align="center">{{$i+1}}</td>
                                            <td>{{$ch->client_name}} </td>
                                            <td>{{$ch->room_type}} </td>
                                            <td>{{$ch->room->room_name}}</td>
                                            <td>{{$ch->bookoption}} </td>
                                            <td>{{$ch->duration}} </td>
                                            <td>&#x20A6;{{number_format($ch->amount_paid)}} </td>
                                            <td>{{date('d-M, Y',strtotime($ch->checkin))}} @ {{date('H:i a',strtotime($ch->time_in))}}</td>
                                            <td>{{$ch->checkedin_by}}</td>
                                            <td align="center"><span class="text-sm {{$ch->status == '1' ? 'text-success' : 'text-danger'}}">{{$ch->status == '1' ? 'Active' : 'Not Active'}}</span> </td>
                                            <td>
                                            <span> 
                                              <a href="{{route('checkin.details',['id' => $ch->id])}}"  class="btn btn-info btn-sm">Details</a></span>                                     
                                              <a href="{{route('checkin.out',['id' => $ch->id])}}" onclick = "return confirm('Are you sure you want to check out these customer');" class="btn btn-danger btn-sm">Check Out</a></span>                                     
                                            </td>
                                            </tr> 
                                            <?php $i++?> 
                                             @endforeach

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
       $("#chein").DataTable();
    });
</script>
@endsection
