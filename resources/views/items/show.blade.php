@extends ('layouts.master')

@section('content')

<a class="btn btn-primary" href="{{ route('items.edit',[ $item->id]) }}"> Edit item </a>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Showing item: {{ $item->name }}</h1>

<div class="jumbotron text-center">
	<h2>{{ $item->name }}</h2>
	<p>
		<strong>Name:</strong> {{ $item->name }}<br>
		<strong>Price:</strong> {{ $item->price }}<br>
		<strong>Quantity:</strong> {{ $item->quantity }}<br>
		<strong>Description:</strong> {{ empty($item->description ) ? "Description is empty" : $item->description }}  <br>
		<strong>Categories:</strong> 
		@if (count($item->cats) > 0)
		@foreach ($item->cats as $cat)
		{{ $cat->name }} |
		@endforeach
		@else
		There are no categories for this item.
		@endif
		
		<br>
	</p>
</div>


@endsection