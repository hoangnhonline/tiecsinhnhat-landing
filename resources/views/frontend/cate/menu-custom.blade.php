@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container-right banggia1">
  	<div class="tieude"><h3 class="title">menu tự chọn</h3></div>
  	
	<div>
		<div class="table-responsives">
		  <table cellpadding="10" cellspacing="10" width="100%" class="table-food table table-bordered">
		    	@foreach($foodTypeList as $foodType)
		    	<tr>
		    		<td colspan="2"><p class="food-type">{!! $foodType->name !!}</p></td>
		    	</tr>
			    	@if($foodType->foodGroup->count() > 0)
				    	@foreach($foodType->foodGroup as $group)
				    	<tr>
				    		<td colspan="2"><p class="food-group">{!! $group->name !!}</p></td>			    	
				    	</tr>
					    	@foreach($group->food as $food)
					    	<tr>
					    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
					    		<td class="price_food" style="white-space: nowrap;"><p>{!! number_format($food->price) !!}</p></td>
					    	</tr>
					    	@endforeach
				    	@endforeach
			    	@else
			    		@foreach($foodType->food as $food)
				    	<tr>
				    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
				    		<td class="price_food" style="white-space: nowrap;"><p>{!! number_format($food->price) !!}</p></td>
				    	</tr>
				    	@endforeach
			    	@endif
		    	@endforeach
		  </table>
		</div>
	</div>
</div>
<style type="text/css">
	.food-type{
		    color: red;
		    font-size: 18px;
		    text-align: center;
		    padding: 10px;
		    font-weight: bold;
	}
	.food-group{
		    color: blue;
		    font-size: 15px;
		    text-align: center;
		    padding: 10px;
		    font-weight: bold;
	}
</style>
@stop