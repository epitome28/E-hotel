@extends('layouts.app')
@section('title')
    Bookings
@endsection
@section('pagetitle')
    Bookings
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                          All Bookings
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('includes.success')
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" id="bookin">
                                        <thead>
                                            <tr>
                                              <th>Booking Code</th>
                                              <th>Client Name</th>
                                              <th>Email</th>
                                              <th>Phone</th>
                                              <th>Expected Arrival Time</th>
                                               <th>Payment Method</th>
                                              <th>Payment status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             @foreach ($allboks as $bok)
                                                 <tr>
                                            <td>{{$bok->booking_code}} </td>
                                            <td>{{$bok->client_name}} </td>
                                            <td>{{$bok->email}} </td>
                                            <td>{{$bok->client_phone}} </td>
                                            <td>{{$bok->arrival_time}} </td>
                                            <td>{{$bok->Payment_method}} </td>
                                            <td><span class="{{$bok->payment_status == '1' ? 'text-success' : 'text-danger'}}">{{$bok->payment_status == '1' ? 'Paid' : 'Not Paid'}}</span></td>
                                            <td><span class="badge {{$bok->payment_status == '0' ? 'badge-danger' : 'badge-dark'}}">{{$bok->status == '0' ? 'New' : 'Seen'}}</span></td>
                                            <td>
                                            <span> 
                                              @if ($bok->payment_status == '1')
                                              <a href=""  class="btn btn-dark btn-sm">Checkin</a>
                                              @else
                                              <a href="javascript:void(0);" onclick="openpayment()"  class="btn btn-gradient-primary btn-sm">Confirm Payment and Checkin</a>
                                              @endif
                                              </span>                                     
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
        
@endsection
@section('adscript')
    <script>
    $(document).ready(function(){
       $("#bookin").DataTable();
    });
</script>
<script>
  function openpayment(){
   $('#exampleModal').modal('show');
  }
</script>
@endsection
