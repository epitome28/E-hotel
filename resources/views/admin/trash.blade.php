@extends('layouts.app')
@section('title')
    Trash
@endsection
@section('pagetitle')
    Trash
@endsection
@section('adcontent')
<div class="row mt-5">
    <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Website Views</h6>
          </div>
        </div>
      </div>
</div>
@endsection