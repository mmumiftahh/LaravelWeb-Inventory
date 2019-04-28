@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Edit Employee</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('employee.update', $data) }}">
							@csrf @method('patch')

							<div class="form-group">
								<label>NIP</label>
								<input type="number" name="nip" class="form-control" value="{{ old('nip', $data->nip) }}" disabled>
							</div>

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}">
							</div>

							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control" value="{{ old('username', $data->username) }}">
							</div>

							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>

							<div class="form-group">
								<label>Address</label>
								<textarea name="address" class="form-control">{{ old('address', $data->address) }}</textarea>
							</div>

							<button class="btn btn-warning">Update</button>
							<a href="{{ route('employee.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection