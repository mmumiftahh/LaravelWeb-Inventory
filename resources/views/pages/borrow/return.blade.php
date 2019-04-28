@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))

            <div class="alert alert-info">{{ session('message') }}</div>

            @endif
            <div class="card">
                <div class="card-header"><h5>List Items</h5></div>
                <div class="card-body">

                    <form action="{{ route('detail_borrow.update',$data) }}" method="post">
                    <input type="hidden" name="borrow_id" value="{{ $data->id }}">
                    @csrf @method('patch')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Item</td>
                                <td>Total</td>
                                <td>Total Broken</td>
                            </tr>
                        </thead>
                        <tbody>
                            @csrf
                            @foreach($data->detail_borrow as $field)
                            <tr>
                                <td>{{ $loop->index + 1 }}
                                    <input type="hidden" name="item_id[]" value="{{ $field->item->id }}">
                                    <input type="hidden" name="total[]" value="{{ $field->total }}">
                                </td>
                                <td>{{ $field->item->name }}</td>
                                <td>{{ $field->total }}</td>
                                <td>
                                    <input type="text" class="form-control" name="total_broken[]" max="{{ $field->total }}" min="0" autocomplete="off" value="0" required>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <button class="btn btn-primary pull-right">Return</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection