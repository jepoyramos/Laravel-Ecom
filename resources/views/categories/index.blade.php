@extends('layouts.app')

@section('content')

@if (Session::has('flash_message')) <!-- checks if session has message stored in it -->
	<div class="alert alert-info">{{ Session::get('flash_message') }}</div> <!-- receives the flash message sent by controller through session -->
@endif

<table>
    <tr>
        <th><h4>CATEGORIES</h4></th>
    </tr>
    @foreach($categories as $category) <!-- Get all category -->
	<tr>

		<td>
			<div class="img_container" style="background: url('{{url('/')}}/uploads/{{$category->image}}') no-repeat; background-size: contain; background-position: center;">
			</div>
		</td>
		<td style=" text-align:center; border: 1px solid #636363 ">{{$category->name}}</td> <!-- Get and Display category property name -->
		<td><a href="{{url('/')}}/categories/{{$category->id}}/edit" class="btn"> EDIT </a></td><!-- href sets route according to route::list to perform edit method in controller -->
		<td>
			<!-- Creates a form with delete method and assigns a route for destroy method based on route:list, also passes a category id and runs a function for delete action confirmation -->

			 {!!Form::open(['method' => 'DELETE', 'route' => ['categories.destroy', $category->id], 'onsubmit' => 'return ConfirmDelete()']) !!}
			     {!!Form::submit('Delete', ['class' => 'delete-btn']) !!}
			 {!!Form::close() !!}
		</td>
	</tr>
	@endforeach
</table>
<a href="{{url('/')}}/categories/create">Add Category</a>
@endsection
