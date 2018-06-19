@extends ('layouts.master')

@section('content')

<form method="POST" action="{{ route('categories.update',[$category->id]) }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">save</button>
    </div>

    @include ('layouts.errors')

</form>



@endsection