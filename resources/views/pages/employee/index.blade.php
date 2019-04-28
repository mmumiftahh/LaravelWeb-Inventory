@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Employee Page</h5></div>
					<div class="card-body">
						<a href="{{ route('employee.create') }}" class="btn btn-primary">Add Employee</a><br><br>

						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>NIP</th>
									<th>Name</th>
									<th>Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $field->nip }}</td>
									<td>{{ $field->name }}</td>
									<td>{{ $field->address }}</td>
									<td>
										<div class="btn btn-group">
											<a href="{{ route('employee.edit', $field) }}" class="btn btn-warning">Edit</a>
											<form method="post" action="{{ route('employee.destroy', $field) }}">
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