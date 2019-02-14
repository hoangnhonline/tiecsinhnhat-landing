@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container-right banggia1">
  	<div class="tieude"><h3 class="title">Sửa menu : {!! $menuDetail->name !!}</h3></div>
  		
	<div>
		<div id="sticker" style="margin-bottom: 10px;">
	      <a id="xem-menu" href="javascript:void(0)">Xem menu</a>
	    </div>
	<form action="{{  route('luu-menu') }}" method="POST">
		{{ csrf_field() }}
		
		<input type="hidden" name="menu_id" value="{{ $menuDetail->id }}">		
		<input type="hidden" name="name" value="{{ $menuDetail->name }}">
		<table class="table table-bordered"  id="div-content-edit">
			<tr>
				<th width="1%" style="white-space: nowrap;">STT</th>
				<th>Tên món</th>
				<th width="1%" style="text-align: right">Giá</th>
				<th width="1%"></th>				
			</tr>
			<?php $i = $totalPrice = 0; ?>
			@foreach($menuDetail->foodMenu as $food)
			<?php $i++; 
			$detailFood = DB::table('food')->where('id', $food->food_id)->first();
            $totalPrice+= $detailFood->price;
			?>
			<tr data-value="{{ $food->food_id }}" class="food">
				<td style="text-align: center"><span class="order">{{ $i }}</span></td>
				<td style="vertical-align: center">{!! $detailFood->name !!}</td>
				<td style="white-space: nowrap;">{!! number_format($detailFood->price) !!}
					<input type="hidden" class="fprice" value="{{ $detailFood->price}}">
					<input type="hidden" class="fprice" name="food_id[]" value="{{ $food->food_id }}">
				</td>
				<td>
					<button data-value="{{ $food->food_id }}" class="remove btn btn-sm btn-danger">Xóa</button>
				</td>
			</tr>	
			@endforeach
			<tr>
				<td colspan="2" style="text-align: right;font-size: 17px"><strong>Tổng tiền</strong></td>
				<td colspan="2" style="text-align: right"><strong id="total-price">{!! number_format($totalPrice) !!}</strong></td>
			</tr>
		</table>
		<div style="text-align: right">
			<button class="btn btn-info" type="submit">LƯU MENU</button>
			<button class="btn btn-default" type="button" onclick="return window.location.reload();">HỦY</button>
		</div>
	</form>
		
		<div style="text-align: center;margin-top: 20px;margin-bottom: 15px;">
			<h3>DANH SÁCH MÓN</h3>
		</div>
		<div class="">
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

					    	<tr @if(in_array($food->id, $foodIdArr)) class="seleted" @endif>
					    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
					    		<td class="price_food">
					    			@if($food->price > 0)					    			
						    			@if(!in_array($food->id, $foodIdArr))
	                                    <button type="button" class="btn btn-default noselect"  data-id="{{ $food->id }}"  data-value="{{ $food->price }}" data-name="{!! $food->name !!}">{!! number_format($food->price) !!}</button>          
	                                    @else
	                                    <button type="button" class="btn btn-danger selected"  data-id="{{ $food->id }}"  data-value="{{ $food->price }}" data-name="{!! $food->name !!}"><i class="fa fa-check-circle"></i> {!! number_format($food->price) !!}</button>          
	                                    @endif
					    			@endif
					    		</td>
					    	</tr>
					    	@endforeach
				    	@endforeach
			    	@else
			    		@foreach($foodType->food as $food)
				    	<tr @if(in_array($food->id, $foodIdArr)) class="seleted" @endif>
				    		<td class="name_food"><p>{!! $food->name !!}</p></td>			    	
				    		<td class="price_food">
				    			@if($food->price > 0)
				    				@if(!in_array($food->id, $foodIdArr))
                                    <button type="button" class="btn btn-default noselect" data-value="{{ $food->price }}"  data-id="{{ $food->id }}" data-name="{!! $food->name !!}">{!! number_format($food->price) !!}</button>          
                                    @else
                                    <button type="button" class="btn btn-danger selected" data-value="{{ $food->price }}" data-id="{{ $food->id }}" data-name="{!! $food->name !!}"><i class="fa fa-check-circle"></i> {!! number_format($food->price) !!}</button>          
                                    @endif
				    			@endif
				    		</td>
				    	</tr>
				    	@endforeach
			    	@endif
		    	@endforeach
		  </table>
		</div>
	</div>
</div>

<style type="text/css">
 #sticker {
      background: #39b54a;   
      line-height: 1.6em;
      font-weight: bold;
      text-align: center;
      padding: 5px;
      float:right;
      position: absolute;
    }

 #sticker a{ 	
 	text-decoration: none;
 	color:#FFF;
 }
	.food-type{
		    color: #39b54a;
		    font-size: 18px;		
		    padding: 10px;
		    font-weight: bold;
	}
	.food-group{
		    color: blue;
		    font-size: 15px;		   
		    padding: 10px;
		    font-weight: bold;
	}
	.price_food{
		text-align: right;
		width: 1%
	}
	tr.seleted{
		background-color: #ead0d0;
	}
	.price_food button{
		width: 95px;
	}
	#total-price{
		font-size: 17px;	
	}
</style>
@stop
@section('js')
<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.sticky.js') }}"></script>
<script type="text/javascript">
	$(window).load(function(){
      $("#sticker").sticky({ topSpacing: 5 });
    });
    $('#xem-menu').click(function(){
    	$(window).scrollTop($('.banggia1').offset().top);
    });
	$(document).on('click', '.noselect', function(){
		var currentHTML = $(this).html();
		var name = $(this).data('name');
		var food_id = $(this).data('id');
		var price = $(this).data('value');
      //$(this).parents('td').find('.food_checkbox').prop('checked', 'checked');
      $(this).removeClass('btn-info noselect').addClass('btn-danger selected').html('<i class="fa fa-check-circle"></i>' + ' ' + currentHTML);
      $(this).parents('tr').addClass('seleted');
      	var str = '<tr data-value="' + food_id + '" class="food">';
			str+='<td style="text-align: center"><span class="order"></span></td>';
			str+='<td style="vertical-align: center">'+ name +'</td>';
			str+='<td style="white-space: nowrap;">' + addCommas(price);
			str+='<input type="hidden" class="fprice" value="'+price+'">';
			str+='<input type="hidden" class="fprice" name="food_id[]" value="' + food_id + '">';
			str+='</td><td>';
			str+='<button data-value="'+ food_id +'" class="remove btn btn-sm btn-danger">Xóa</button></td></tr>';
				
		$("tr.food:last").after(str);
		setOrder();
		calTotalPrice();
      
    });
  $(document).on('click', '.selected', function(){
  	if(confirm('Quý khách chắc chắn xóa món này?')){
     var name = $(this).data('name');
		var food_id = $(this).data('id');
		var price = $(this).data('value');
		
      $(this).removeClass('btn-danger selected').addClass('btn-default noselect').html(addCommas(price));
      $(this).parents('tr').removeClass('seleted');
      $('tr.food[data-value='+food_id+']').remove();
      setOrder();
      calTotalPrice();
  }
    });
	$(document).ready(function(){
		$(document).on('click', 'button.remove', function(){
			var obj = $(this);
			var food_id = obj.data('value');
			var price = obj.parents('tr').find('.fprice').val();
			if(confirm('Quý khách chắc chắn xóa món này?')){
				obj.parents('tr.food').remove();
				var buttonSelect = $('button.selected[data-id='+food_id+']');
				buttonSelect.removeClass('selected btn-danger').addClass('btn-default noselect').html(addCommas(price));
				buttonSelect.parents('tr').removeClass('seleted');
				setOrder();
				calTotalPrice();
			}
		});
	});
	function setOrder(){
		var i = 0;
		$('tr.food').each(function(){
			i++;
			$(this).find('.order').html(i);
		});
	}
	function calTotalPrice(){		
		var total = 0;
		$('tr.food').each(function(){
			
			total += parseInt($(this).find('.fprice').val());

		});
		$('#total-price').html(addCommas(total));

	}
	function addCommas(nStr) {
	  nStr += '';
	  x = nStr.split('.');
	  x1 = x[0];
	  x2 = x.length > 1 ? '.' + x[1] : '';
	  var rgx = /(\d+)(\d{3})/;
	  while (rgx.test(x1)) {
	  x1 = x1.replace(rgx, '$1' + ',' + '$2');
	  }
	  return x1 + x2;
	  }
</script>
@stop