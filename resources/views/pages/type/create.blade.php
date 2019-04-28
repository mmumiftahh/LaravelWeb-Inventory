@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Add Type</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('type.store') }}">
							@csrf

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea class="form-control" name="description"></textarea>
							</div>

							<button class="btn btn-primary">Submit</button>
							<a href="{{ route('type.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection