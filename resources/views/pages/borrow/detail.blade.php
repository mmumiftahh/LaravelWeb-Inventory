@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Item</div>
                <div class="card-body">
                    <a href="{{ route('borrow.index') }}" class="btn btn-secondary"> Go Back</a>
                    <br><br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total Borrow</th>
                                <th>Room</th>
                                <th>Type</th>
                                <th>Operator</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data->detail_borrow as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>{{ $field->item->room->name }}</td>
                                <td>{{ $field->item->type->name }}</td>
                                <td>{{ $field->item->user->name }}</td>
                                <td>{{ $field->item->registration_date }}</td>
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