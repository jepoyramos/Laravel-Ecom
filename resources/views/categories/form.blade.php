@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $messages)
            <div>{{ $messages }}</div>
        @endforeach
    </div>
@endif

<form method="POST" enctype="multipart/form-data" action="{{url('/')}}/categories{{isset($category) ? '/'.$category->id : ''}}"> <!-- enctype => required for file uploads form / action => checks if category has a value and set the url based on condition-->
	{{ csrf_field() }}
	{{isset($category) ? method_field('PATCH') : ''}}<!-- creates a hidden method field if var category is set and make it a PATCH for update route -->
	<input name="image" type="file" value="{{isset($category) ? $category->image : ''}}"><!-- value checks if category has value and make it as the imput default value else blank value -->
	<input name="name" type="text" value="{{isset($category) ? $category->name : ''}}"> <!-- value checks if category has value and make it as the imput default value else blank value -->
	<button type="submit">
		{{ isset($category) ? 'Update Category' : 'Create Category' }} 
	</button>
</form>


@endsection


