@extends ('layouts.master')

@section('content')

<a class="btn btn-primary" href="{{ route('categories.edit',[ $category->id]) }}"> Edit category </a>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Showing Category: {{ $category->name }}</h1>

@if (count($category->items) > 0)
<h3>Category items: </h3>


<ul class="list-group">

	@foreach ($category->items as $item)
	<li class="list-group-item">
		Name: <a href="{{ route('items.show',[$item->id]) }}"> <strong>{{ $item->name }} </strong></a>
	</li>
	@endforeach

	
</ul>
@else

<h3>There are no items</h3>
@endif



@endsection