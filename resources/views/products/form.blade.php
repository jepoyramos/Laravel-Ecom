@extends('layouts.app')

@section('content')
<form method="POST" action="{{url('/')}}/products">
	{{ csrf_field() }}
	<select name="category" id="">
		@foreach($categories as $category)
		<option value="{{$category->id}}">{{$category->name}}</option>
		@endforeach
	</select>
	<input name="name" type="text">
	<input name="price" type="number">
	<textarea name="description"></textarea>
	
	
	<button type="submit">Create Product</button>
</form>

@endsection
