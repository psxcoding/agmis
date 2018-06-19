@extends ('layouts.master')

@section('content')

<h1>Create Category</h1>

<form method="POST" action="{{ route('categories.store') }}">

	{{ csrf_field() }}

	<div class="form-group">
		<label for="name">Name: </label>
		<input type="text" class="form-control" id="name" name="name">
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">create</button>
	</div>

	@include ('layouts.errors')

</form>

@endsection