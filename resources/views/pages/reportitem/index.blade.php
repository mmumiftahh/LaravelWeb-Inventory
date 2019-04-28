@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alert')
            <div class="card">
                <div class="card-header"><h5>Report Item by Type</h5></div>
                <div class="card-body">
                    <form action="{{ route('reportitem.item') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type_id" class="form-control">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <br>
                            <button class="btn btn-primary" target="_blank">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection