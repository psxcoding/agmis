@extends ('layouts.master')

@section('content')

<a class="btn btn-primary" href="{{ route('categories.edit',[ $category->id]) }}"> Edit item </a>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Showing Category: {{ $category->name }}</h1>

<div class="jumbotron text-center">
	<h2>{{ $category->category }}</h2>
	<p>
		<strong>Name:</strong> {{ $category->name }}<br>
		<strong>Items:</strong> 
		@if (count($category->items) > 0)

		@foreach ($category->items as $item)
			{{ $item->name }} |
		@endforeach
		@else
		There are no items for this category.
		@endif
		
		<br>

	</p>
</div>


@endsection