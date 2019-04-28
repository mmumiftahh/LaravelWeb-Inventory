@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alert')
            <div class="card">
                <div class="card-header"><h5>Maintenance</h5></div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Total Broken</th>
                                <th>Borrower</th>
                                <th>Operator</th>
                                <th>Broken Date</th>
                                <th>Fix Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>{{ $field->borrow->employee->name }}</td>
                                <td>{{ $field->borrow->user->name }}</td>
                                <td>{{ $field->broken_date }}</td>
                                <td>{{ $field->fix_date }}</td>
                                <td>
                                    @if($field->fix_date == null)
                                    <form action="{{ route('maintenance.destroy', $field) }}" method="post">
                                        @csrf @method('delete')
                                        <button class="btn btn-primary"><i class="fa fa-sm fa-hammer"></i>Fix</button>
                                    </form>
                                    @else
                                    <div class="badge badge-info">No Action</div>
                                    @endif
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