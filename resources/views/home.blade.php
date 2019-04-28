@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>Dashboard</h5></div>

                <div class="card-body">
                  <h6>You are logged in!</h6>
                  <audio autoplay>
                  <source src="{{ asset('media/MarioJump.m4a') }}" type="audio/mpeg">
                  </audio>
                  <img src="{{ asset('media/Inventory-PNG-File.png') }}" alt="">
                  <hr>
                  <video controls style="width: 100%;"> <source src="{{ asset('media/inventory.mp4') }}" type="video/mp4"></video>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
