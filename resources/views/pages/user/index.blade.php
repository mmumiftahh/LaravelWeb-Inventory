@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>User Page</h5></div>
					<div class="card-body">
						<a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a><br><br>

						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Level</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $field)
								<tr>
									<td>{{ $loop->index + 1 }}</td>
									<td>{{ $field->name }}</td>
									<td>{{ $field->email }}</td>
									<td>{{ $field->level->name }}</td>
									<td class="text-center">
										@if($field->level->name == "admin")
											<h6 class="badge badge-warning">no action needed</h6>
										@else
										<div class="btn btn-group">
											<form method="post" action="{{ route('user.destroy', $field) }}">
												@csrf @method('delete')
												<button class="btn btn-danger">Delete</button>
											</form>
										</div>
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