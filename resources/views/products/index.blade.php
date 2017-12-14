@extends('layouts.app')

@section('content')
<table>
    <tr>
        <th><h4>PRODUCTS</h4></th>
    </tr>
    <!-- <tr>
    	<th>Product Name</th>
    	<th>Product ID</th>
    	<th>Price</th>
    	<th>Description</th>
    </tr> -->
    @foreach($products as $product)
		<tr>
			<td style=" text-align:center; border: 1px solid #636363 ">
				<div style="display: inline-block; border: 1px solid #636363; padding: 5px; margin-left: -4px;">{{$product->name}} </div>
				<div style="display: inline-block; border: 1px solid #636363; padding: 5px; margin-left: -4px;">{{$product->category}} </div>
				<div style="display: inline-block; border: 1px solid #636363; padding: 5px; margin-left: -4px;">{{$product->price}} </div>
				<div style="display: inline-block; border: 1px solid #636363; padding: 5px; margin-left: -4px;">{{$product->description}} </div>
			</td>
		</tr>
    @endforeach
   
</table>
<a href="{{url('/')}}/products/create">Add Product</a>
@endsection
