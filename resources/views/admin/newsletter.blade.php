@extends('layouts.app')
@section('title')
    Subcribers
@endsection
@section('pagetitle')
    Subcribers
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <div class="text-end">
                                @if (count($adnews)>0)
                                <a href="{{route('showbcast')}}" class="btn btn-outline-info btn-sm text-end">Send Broadcast Message</a>
                                @endif
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                        @include('includes.success')
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="newsleter">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                      
                                        <tbody>
                                             @foreach ($adnews as $news)
                                                 <tr>
                                            <td>{{$news->email}}                                   
                                                </td>
                                            
                                            <td>
                                            <span> <a href="{{route('news.delete',['id' => $news->id])}}" onclick = "return confirm('Are you sure you want to trash this subcriber');" class="btn btn-danger btn-sm">delete</a></span>                                     
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
       $("#newsleter").DataTable();
    });
</script>
@endsection
