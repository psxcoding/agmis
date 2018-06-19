@extends ('layouts.master')

@section('content')

<h1>Create Item</h1>

<form method="POST" action="{{ route('items.store') }}">

	{{ csrf_field() }}

	<div class="form-group">
		<label for="name">Name: </label>
		<input type="text" class="form-control" id="name" name="name">
	</div>

	<div class="form-group">
		<label for="name">Quantity: </label>
		<input type="text" class="form-control" id="quantity" name="quantity">
	</div>

	<div class="form-group">
		<label for="name">Price: </label>
		<input type="text" class="form-control" id="price" name="price">
	</div>

	<div class="form-group">
		<label for="name">Categories: </label>
		<select name="category[]" class="form-control" multiple="multiple">
			@foreach($categories as $category)
			<option  value="{{$category->id}}">{{$category->name}}</option>
			@endforeach
		</select>
	</div>

	<div class="form-group">
		<label for="name">Description: </label>
		<textarea class="form-control" id="description" name="description"> </textarea> 
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">create</button>
	</div>

	@include ('layouts.errors')

</form>

@endsection