@extends('layouts.app')
@section('title')
    Testimonial
@endsection
@section('pagetitle')
    Testimonial
@endsection

@section('adcontent')

<div class="row">
    <div class="card">
        <div class="card-header">
            Testimonial &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="{{route('tst.create')}}" class="btn btn-outline-info btn-sm float-end">Create</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="testimonial">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=0;?>
                    @foreach ($txtm as $te)
                        <tr>
                            <td>{{$i+1}}</td>
                        
                        <td>{{$te->name}}</td>
                    <td>
                        {!!Str::limit($te->content,'50','...')!!}
                    </td>
                    <td>
                        <span>
                            <a href="{{route('tst.edit',['id' => $te->id])}}"  class="btn btn-info btn-sm">Edit</a> 
                            <a href="{{route('tst.delete',['id' => $te->id])}}" onclick = "return confirm('Are you sure you want to delete these record');" class="btn btn-sm btn-danger">Delete</a></span>
                    </td>
                    </tr>  
                    <?php $i++;?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
     
                                
                           
@endsection
@section('adscript')
    <script> 
    $(document).ready(function(){
       $("#testimonial").DataTable();
    });
</script>
@endsection
