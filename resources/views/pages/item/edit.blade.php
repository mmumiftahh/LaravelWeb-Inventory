@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Edit Item</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('item.update', $data) }}">
							@csrf @method('patch')

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control" value="{{ old('name', $data->name) }}">
							</div>

							<div class="form-group">
								<label>Room</label>
								<select name="room_id" class="form-control">
									@foreach($rooms as $room)
									@if($room->id == $data->room_id)
									<option value="{{ $room->id }}" selected>{{ $room->name }}</option>
									@else
									<option value="{{ $room->id }}">{{ $room->name }}</option>
									@endif
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Type</label>
								<select name="type_id" class="form-control">
									@foreach($types as $type)
									@if($type->id == $data->type_id)
									<option value="{{ $type->id }}" selected>{{ $type->name}}</option>
									@else
									<option value="{{ $type->id }}">{{ $type->name}}</option>
									@endif
									@endforeach
								</select>
							</div>

							<div class="form-group">
								<label>Description</label>
								<textarea name="description" class="form-control">{{ old('description', $data->description) }}</textarea>
							</div>

							<button class="btn btn-warning">Update</button>
							<a href="{{ route('item.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>

@endsection