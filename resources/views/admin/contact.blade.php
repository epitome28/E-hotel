@extends('layouts.app')
@section('title')
Contact
@endsection
@section('pagetitle')
Contact
@endsection

@section('adcontent')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contact</h4>
                    </div>
                    <div class="card-body">
          
                        @include('includes.errors')
                        @include('includes.success')
              <form action="{{route('contact.save')}}" method="post" enctype="multipart/form-data"  onsubmit="thisform()">
                  @csrf
                     <div class="container">
                 
                       <div class="form-group mb-3">
                           <label class="form-label">Email</label>
                          <input type="text" name="email" id="email" class="form-control col-7 border px-2"  value="{{$cont ? $cont->email : old('email')}}">
                      </div>
                       <div class="form-group mb-3">
                           <label class="form-label">Phone No</label>
                          <input type="text" name="phone" id="phone" class="form-control col-7 border px-2"  value="{{$cont ? $cont->phone :old('phone')}}">
                      </div>
                      
                       <div class="form-group mb-3">
                           <label class="form-label"> Address</label>
                          <input type="text" name="address" id="address" class="form-control col-7 border px-2" value="{{$cont ? $cont->address :old('phone')}}">
                      </div>
                      {{-- <div class="form-group">
                           <label for="content">Map Location</label>
                          <input type="text" name="location" id="location" class="form-control col-7" placeholder="Enter company Map Location" value="{{$cont ? $cont->location :old('phone')}}">
                      </div> --}}
                      <div class="form-group">
                          <button type="submit" id="btn" class="btn btn-lg bg-gradient-primary">Save Contact</button>
                          
                      </div>
              </div>
                  </form>
                </div>
            </div>
        </div>
    </div>

@endsection


