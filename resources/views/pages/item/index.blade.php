@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Item Page</h5></div>
					<div class="card-body">
						<a href="{{ route('item.create') }}" class="btn btn-primary">Add Item</a><br><br>

						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Total</th>
									<th>Room</th>
									<th>Type</th>
									<th>Operator</th>
									<th>Date Added</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $field->name }}</td>
									<td>{{ $field->total }}</td>
									<td>{{ $field->room->name }}</td>
									<td>{{ $field->type->name }}</td>
									<td>{{ $field->user->name }}</td>
									<td>{{ $field->registration_date }}</td>
									<td>
										<div class="btn btn-group">
											<a href="{{ route('item.edit', $field) }}" class="btn btn-warning">Edit</a>
											<a href="{{ route('supply.item', $field) }}" class="btn btn-success">Supply</a>
											<form method="post" action="{{ route('item.destroy', $field) }}">
												@csrf @method('delete')
												<button class="btn btn-danger">Delete</button>
											</form>
										</div>
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