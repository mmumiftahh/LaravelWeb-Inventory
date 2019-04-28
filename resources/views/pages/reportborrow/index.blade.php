@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alert')
            <div class="card">
                <div class="card-header"><h5>Report Borrow</h5></div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Report Borrowed Today</td>
                                <td>
                                    <a href="{{ route('reportborrow.borrow','today') }}" class="btn btn-info btn-block" target="_blank"><i class="fa fa-print"></i> Print</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Report All Borrowed</td>
                                <td>
                                    <a href="{{ route('reportborrow.borrow','all') }}" class="btn btn-info btn-block" target="_blank"><i class="fa fa-print"></i> Print</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Report All Broken</td>
                                <td>
                                <a href="{{ route('reportborrow.borrow','broken') }}" class="btn btn-info btn-block" target="_blank"><i class="fa fa-print"></i> Print</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Report Borrow New</td>
                                <td>
                                <a href="{{ route('reportborrow.borrow','latest') }}" class="btn btn-info btn-block" target="_blank"><i class="fa fa-print"></i> Print</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection