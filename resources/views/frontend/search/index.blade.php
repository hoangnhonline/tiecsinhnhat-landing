@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div class="tieude wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
   <h3>Tìm kiếm</h3>
</div>
<div class="banggia1 row">      
   @foreach($articlesList as $articles)
   <div class="item-wr col-sm-3 col-xs-6">
      <div class="hover2">
         <img src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
         <div class="chitiet_dn">
            <div class="box_chitiet">
               <a href="{{ route('dich-vu', [$articles->slug, $articles->id ]) }}"><img src="{{ URL::asset('assets/images/chitiet_1.png') }}"> <span> Xem thêm</span></a>
            </div>
         </div>
      </div>
      <div class="item-ten1"><a href="{{ route('dich-vu', [$articles->slug, $articles->id ]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></div>
      <div class="item-kt1"></div>
   </div>
   @endforeach
   <div class="clear"></div>
   <div class="paging"></div>
   <div class="red"></div>
   <div class="clear"></div>
</div>
@stop