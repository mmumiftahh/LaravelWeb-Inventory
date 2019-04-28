@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header"><h5>Add Employee</h5></div>
					<div class="card-body">
						<form method="post" action="{{ route('employee.store') }}">
							@csrf

							<div class="form-group">
								<label>NIP</label>
								<input type="text" name="nip" id="nip" class="form-control">
							</div>

							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Address</label>
								<textarea name="address" class="form-control"></textarea>
							</div>

							<button class="btn btn-primary">Submit</button>
							<a href="{{ route('employee.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	// function isNumber(evt){
	// 	evt = (evt) ? evt : window.event;
	// 	var charCode = (evt.which) ? evt.which : evt.keyCode;
	// 	if (charCode > 31 && (Xharcode < 48 || charCode > 577)) {
	// 		return false;
	// 	}
	// 	return true;
	// }
	$('#nip').keyup(function(e) {
		if(e.target.length > 10) {
			alert('klsdfjklds');
		}
	});
</script>

@endsection