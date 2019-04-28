@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Edit Room</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('room.update', $data) }}">
							@csrf @method('patch')

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}">
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description">{{ old('description', $data->description) }}</textarea>
							</div>

							<button class="btn btn-warning">Update</button>
							<a href="{{ route('room.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection