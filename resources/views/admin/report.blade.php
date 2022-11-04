@extends('layouts.app')
@section('title')
Reports
@endsection
@section('pagetitle')
Reports
@endsection
@section('adcontent')   
        <div class="row">
         
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                    </div>
                    <div class="card-body">
                       <div class="row justify-content-center noprint">
                           <form action="{{route('generatereport')}}" method="get" onsubmit="thisform(this)">
                            <input type="hidden" name="filter" value="true">
                            <div class="table responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Date From</th>
                                        <th>Date To</th>
                                        <th></th>
                                    </tr>
                                    <tbody>
                                        <tr>
                                            <td align="left">
                                                 <input type="date" name="date_from" id="datefrom" class="form-control border px-3" required autocomplete="off">
                                            </td>
                                            <td align="left">
                                               <input type="date" name="date_to" id="dateto" class="form-control border px-3" required autocomplete="off">
                                            </td>
                                            <td align="left">
                                                <input type="submit" class="btn btn-success btn-sm px-2 my-2" id="btn" value="Generate Report">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                           
                          </form>
                       </div>
                  
                    </div>
                </div>
            
        </div>
@endsection

@section('adscript')
    <script>
        $(document).ready(function() {
              $('#transc').DataTable( {
                "pageLength": 50,
                "dom": 'Bfrtip',      
                "buttons": ['csv','print'],
              //buttons: true,
             });

        });
    </script>
@endsection