@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="container-right banggia1">
  	<div class="tieude"><h3 class="title">Menu đã lưu</h3></div>
  		
	<div>
		@if(Session::has('message'))
	      <p class="alert alert-info" >{{ Session::get('message') }}</p>
	      @endif
		<ul>
		@foreach($menuLuuList as $menu)
		<?php $i = $totalPrice = 0; ?>
          @foreach($menu->foodMenu as $food)
          <?php $i++;
          $detailFood = DB::table('food')->where('id', $food->food_id)->first();
          $totalPrice+= $detailFood->price;
          ?>                  
          @endforeach
		<li class="col-md-4">  
	      <div class="item-wr3">
	        <div>
	          <div class="item-gia">{!! $menu->name !!}: <span> {!! number_format($totalPrice) !!} đồng/bàn</span></div>
	          <div class="clear"></div>
	          <div class="content">
	             <div class="hover3">
	                <div style="padding:5px">
	                <?php $cf = 0; ?>
	                   @foreach($menu->foodMenu as $food)
	                   <?php 
	                   $detailFood = DB::table('food')->where('id', $food->food_id)->first();
	                   ?>
	                   <?php $cf++; ?>
	                   <p><span style="color:red; font-size: 15px;font-weight: bold;">{{ $cf }}. </span><span style="color:#000010;font-weight:bold;font-size:15px">{!! $detailFood->name !!}</span><span style="float:right">{{ number_format($detailFood->price) }}</span></p>
	                   @endforeach
	                </div>
	             </div>
	              @if(!Session::get('username'))
	             <button class="btn btn-sm btn-info login-by-facebook-popup edit-menu">Sửa menu</button>
	             @else
	             <a href="{{ route('sua-menu', $menu->id)}}" class="btn btn-info btn-sm edit-menu">Sửa menu</a>
	             @endif
	          </div>
	        </div>
	      </div>    
	  	</li>
	    
		@endforeach
		<ul>
	</div>
</div>

<style type="text/css">
	.edit-menu{
		position: absolute;
	    right: 5px;
	    bottom: 5px;
	}
</style>
@stop
@section('js')

@stop