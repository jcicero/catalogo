@extends('layouts.app')

@section('content')

  <div>
    <div class="col-md-12">
      <br>
      <div class="card">
        <div class="card-header">
          <b>{{ $title }}</b>
        </div>
        <div class="card-body">
          {{ $message }}
        </div>

      </div>
    </div>
  </div>
  
  @endsection