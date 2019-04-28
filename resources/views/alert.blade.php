@if(session('message'))
<div class="alert alert-success">
	{{ session('message') }}
</div>
@endif

@if($errors->any)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
	{{ $error }}
</div>
@endforeach
@endif
