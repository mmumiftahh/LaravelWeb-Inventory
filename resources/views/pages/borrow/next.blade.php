@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h5>Items</h5></div>
                <div class="card-body">
                    <form action="{{ route('detail_borrow.store') }}" method="post">
                        @csrf
                        <input type="hidden" class="form-control" value="{{ $borrow->id }}" name="borrow_id">
                        <div class="form-group">
                            <label for="">Borrower</label>
                            <input type="text" class="form-control" value="{{ $borrow->employee->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">Item</label>
                            <select name="item_id" id="" class="form-control">
                                @foreach($items as $item)
                                <option value="{{ $item->id }}">{{ $item->name }} || Total : {{ $item->total }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="number" class="form-control" name="total">
                        </div>
                        <button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Submit</button>
                    </form>
                </div>
            </div>
            <br>
        </div>
        <div class="col-md-6">
            @include('alert')
            <div class="card">
                <div class="card-header">List of Borrowed Item</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Item</td>
                                <td>Total</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($borrow->detail_borrow as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>
                                    <form method="post" action="{{ route('detail_borrow.destroy', $field) }}">
                                        @csrf @method('delete')

                                        <input type="hidden" name="item_id", value="{{ $field->item->id }}">
                                        <input type="hidden" name="total" value="{{ $field->total }}">
                                        <button class="btn btn-danger">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <form action="{{ route('borrow.update',$borrow) }}" method="post">
                        @csrf @method('patch')
                        <button class="btn btn-info btn-block">Done</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection