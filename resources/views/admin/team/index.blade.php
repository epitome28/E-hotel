@extends('layouts.app')
@section('title')
Team
@endsection
@section('pagetitle')
Team
@endsection
@section('adcontent')
<div class="row">
            <div class="card">
            <div class="card-header">Team  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('team.create')}}" class="btn btn-outline-info btn-sm float-end">Add New</a></div>
                            <div class="card-body">
                                @include('includes.success')
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="pastord">
                                    
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Image</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                            @foreach ($allteams as $item)
                                                
                                         <tr>
                                         <td>{{ $item->name}}</td>
                                         <td>{{ $item->position}}</td>
                                         <td><img src="{{asset($item->image)}}" width="60" height="60" alt=""></td>
                                     
                                        <td>
                                        <a href="{{ route('team.edit',['id' => $item->id]) }}" class="btn btn-sm btn-info" title="Edit pastor"> Edit </a>
                                        <a href="{{ route('team.delete',['id' => $item->id]) }}" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this record')" title="delete pastor"> Delete </a>
                                        </td>
                                            </tr>  
                                            @endforeach
                                        </tbody>
                                      
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
@endsection
@section('adscript')
    <script>
    $(document).ready(function(){
       $("#pastord").DataTable();
    });
</script>
@endsection
