@extends ('layouts.master')

@section('content')

<a class="btn btn-primary" href="{{ route('items.create') }}"> Create item </a>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="items">

	<ul class="list-group">

		@if (count($items)>0)
		@foreach ($items as $item)
		<li class="list-group-item">
			Name: <a href="{{ route('items.show',[$item->id]) }}"> <strong>{{ $item->name }} </strong></a>
		</li>
		@endforeach
		@else
		<h1>There are no items</h1>
		@endif

	</ul>

</div>


@endsection