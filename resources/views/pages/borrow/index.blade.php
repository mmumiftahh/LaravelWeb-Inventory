@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Borrow Page</h5></div>
					<div class="card-body">
						<a href="{{ route('borrow.create') }}" class="btn btn-primary">Add Borrowing</a><br><br>
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Borrow Date</th>
									<th>Return Date</th>
									<th>Employee</th>
									<th>Operator</th>
									<th>Status</th>
									<th>Total Items</th>
									@if(Auth::guard('web')->check())
									<th>Action</th>
									@endif
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $field->borrow_date }}</td>
									<td>{{ $field->return_date }}</td>
									<td>{{ $field->employee->name }}</td>
									<td>
										@if($field->user == null)
										<h6 class="badge badge-warning">Must be <br>Approve or Deny <br>by Admin or Operator</h6>
										@else
										{{ $field->user->name }}
										@endif
									</td>
									<td class="text-center">
										@if($field->status == "book")
										<span class="badge badge-warning">Booking</span>
										@endif
										@if($field->status == "uncomplete")
										<span class="badge badge-info">Uncomplete</span>
										@endif
										@if($field->status == "borrowed")
										<span class="badge badge-primary">Borrowed</span>
										@endif
										@if($field->status == "returned")
										<span class="badge badge-success">Returned</span>
										@endif
									</td>
									<td>{{ count($field->detail_borrow) }}</td>
									@if(Auth::guard('web')->check())
									<td class="text-center">
										@if($field->status == "uncomplete")
										<a href="{{ route('borrow.show', $field) }}" class="btn btn-primary">Form</a>
										@endif
										@if($field->status == "borrowed")
										<a href="{{ route('detail_borrow.show', $field) }}" class="btn btn-success">Return</a>
										@endif
										@if($field->status == "book")
										<div class="btn btn-group">
											<form method="post" action="{{ route('borrow.destroy', $field) }}">
												@csrf @method('delete')
												<input type="hidden" name="approve" value="1">
	                                        	<button class="btn btn-info">Approve</button>
											</form>
											<form method="post" action="{{ route('borrow.destroy', $field) }}">
												@csrf @method('delete')
												<input type="hidden" name="approve" value="0">
	                                        	<button class="btn btn-info">Denied</button>
											</form>
										</div>
										@endif
										<a href="{{ route('borrow.detail', $field) }}" class="btn btn-info">Detail</a>
									</td>
									@endif
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