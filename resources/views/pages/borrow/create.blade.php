@extends('layouts.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('alert')
				<div class="card">
					<div class="card-header">
						@if(Auth::guard('web')->check())
						<h5>Add Borrowing</h5>
						@elseif(Auth::guard('employee')->check())
						<h5>Add Booking</h5>
						@endif
					</div>
					<div class="card-body">
						<form method="post" action="{{ route('borrow.store') }}">
							@csrf
							
							@if(Auth::guard('web')->check())
							<div class="form-group">
								<label>Operator</label>
								<input type="text" name="operator" value="{{ Auth::user()->name }}" class="form-control" readonly>
							</div>
							@endif

							@if(Auth::guard('employee')->check())
							<div class="form-group">
								<label>Employee</label>
								<input type="text" class="form-control" value="{{ Auth::guard('employee')->user()->name }}" readonly>
	                            <input type="hidden" name="employee_id" class="form-control" value="{{ Auth::guard('employee')->user()->idz }}" readonly>
							</div>
							@endif

							<div class="form-group">
	                            <label for="">Borrow Date</label>
	                            <input type="text" name="borrow_date" id="" class="form-control" value="{{ date('Y-m-d') }}" readonly>
	                        </div>

	                        <div class="form-group">
	                            <label for="">Count Days</label>
	                            <select name="count_day" id="" class="form-control">
	                                <option value="3">3 Days</option>
	                                <option value="7">7 Days</option>
	                                <option value="30">30 Days</option>
	                            </select>
	                        </div>

	                        @if(Auth::guard('web')->check())
	                        <div class="form-group">
	                            <label for="">Employee</label>
	                            <select name="employee_id" id="" class="form-control">
	                                @foreach($employees as $employee)
	                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        @endif
	                        <button class="btn btn-primary"><i class="fa fa-save"></i> Borrow</button>
	                        <a href="{{ route('borrow.index') }}" class="btn btn-secondary">Go Back</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection