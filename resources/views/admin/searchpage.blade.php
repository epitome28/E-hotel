@extends('layouts.app')
@section('title')
    Search Result
@endsection
@section('pagetitle')
Search Result
@endsection
@section('adcontent')
<div class="row mt-5">
    <div class="col-lg-12 col-md-12 mt-4 mb-4">
        <div class="card">
          <div class="card-header">Search Found For {{!empty($_GET['q']) ? ucfirst($_GET['q']) : ""}} : {{count($sears)}}</div>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm" id="serch">
                    <thead>
                        <tr>
                            <th>Sn</th>
                            <th>Client Name</th>
                            <th>Client Phone</th> 
                            <th>Room Name</th>
                            <th>Checked In</th>
                            <th>Room Status</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        <?php $i=0;?>
                         @foreach ($sears as $s)
                             <tr>
                         <td align="left">{{$i+1}}</td>
                        <td>{{$s->client_name}}</td>
                        <td>{{$s->client_phone}}</td>
                        <td>{{$s->room->room_name}}</td>
                        <td>{{date('d-M, Y',strtotime($s->checkin))}} @ {{date('H:i a',strtotime($s->time_in))}}</td>
                        <td align="center"><span class="text-sm {{$s->status == '1' ? 'text-success' : 'text-danger'}}">{{$s->status == '1' ? 'Active' : 'Not Active'}}</span> </td>
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
       $("#serch").DataTable({"pageLength":50});
    });
</script>
@endsection