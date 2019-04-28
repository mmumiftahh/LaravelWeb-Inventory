@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Add Item</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('item.store') }}">
							@csrf

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Total</label>
								<input type="number" name="total" class="form-control">
							</div>

							<div class="form-group">
								<label>Room</label>
								<select name="room_id" class="form-control">
									<option value="">Choose Room</option>
									@foreach($rooms as $room)
									<option value="{{ $room->id }}">{{ $room->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Type</label>
								<select name="type_id" class="form-control">
									<option value="">Choose Type</option>
									@foreach($types as $type)
									<option value="{{ $type->id }}">{{ $type->name }}</option>
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control"></textarea>
							</div>

							<button class="btn btn-primary">Submit</button>
							<a href="{{ route('item.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

@endsection