@extends ('layouts.master')

@section('content')

<a class="btn btn-primary" href="{{ route('categories.create') }}"> Create category </a>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<div class="categories">

	<ul class="list-group">


		@if (count($categories)>0)
		@foreach ($categories as $category)
		<li class="list-group-item">
			Name: <a href="{{ route('categories.show',[$category->id]) }}"> <strong>{{ $category->name }} </strong></a>
		</li>
		@endforeach
		@else
		<h1>There are no categories yet</h1>
		@endif
		

	</ul>

</div>





@endsection