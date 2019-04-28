@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Supply Item</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('supply.item.store') }}">
							@csrf

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}" disabled>
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control" disabled>{{ old('description', $data->description) }}</textarea>
							</div>

							<div class="form-group">
								<label>Total</label>
								<input type="number" name="total" class="form-control">
							</div>

							<input type="hidden" class="form-control" value="{{ $data->id }}" name="item_id" required min="1">

							<button class="btn btn-success">Supply</button>
							<a href="{{ route('item.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

@endsection