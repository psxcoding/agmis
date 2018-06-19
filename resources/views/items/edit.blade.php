@extends ('layouts.master')

@section('content')

<form method="POST" action="{{ route('items.update',[$item->id]) }}">

    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="form-group">
        <label for="name">Name: </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
    </div>

    <div class="form-group">
        <label for="name">Price: </label>
        <input type="text" class="form-control" id="price" name="price" value="{{ $item->price }}">
    </div>

    <div class="form-group">
        <label for="name">Quantity: </label>
        <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}">
    </div>

     <div class="form-group">
        <label for="name">Description: </label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $item->description }}">
    </div>


<div class="form-group">
    <label for="name">Categories: </label>
    <select name="category[]" class="form-control" multiple="multiple">
            @foreach($categories as $category)
                <option  {{ in_array($category->id, $slectedCats ) ? "selected='selected'" : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
    </select>
 </div>
   

    <div class="form-group">
        <button type="submit" class="btn btn-primary">save</button>
    </div>

    @include ('layouts.errors')

</form>



@endsection