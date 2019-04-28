@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alert')
            <div class="card">
                <div class="card-header"><h5>Report Item by Room</h5></div>
                <div class="card-body">
                    <form action="{{ route('reportroom.room') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Room</label>
                            <select name="room_id" class="form-control">
                                @foreach($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection