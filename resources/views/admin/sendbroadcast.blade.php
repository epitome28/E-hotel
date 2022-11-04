@extends('layouts.app')
@section('title')
    Broadcast message
@endsection
@section('pagetitle')
    Broadcast message
@endsection
@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <div class="text-end">
                                <a href="{{route('news')}}" class="btn btn-info btn-sm text-end">Back</a>
                            </div>
                        </h4>
                    </div>
                    <div class="card-body">
                                    @include('includes.errors')
                          <div class="col-8">
                            <form action="{{route('send.msg')}}" method="post">
                                @csrf 
                                @foreach ($allemail as $mail)
                            <input type="hidden" name="email[]" id="email" class="form-control" value="{{$mail->email}}">     
                                @endforeach
                                        <div class="form-group">
                                          <input type="text" name="subject" id="subject" class="form-control border mb-3 px-2" placeholder="Enter Subject">     
                                        </div>                          
                                       <div class="form-group">
                                           <textarea name="message" id="message" cols="30" rows="10"></textarea>
                                     </div> 
                                                                          
                                     <div class="form-group mt-3">
                                         <button type="submit" class="btn btn-success">Send Message</button>
                                 </div>                          
                            </form>
                          </div>
                            </div>
                        </div>
            </div>
        </div>
       
@endsection

@section('adscript')
     <script>
      CKEDITOR.replace('message');
      </script>

@endsection