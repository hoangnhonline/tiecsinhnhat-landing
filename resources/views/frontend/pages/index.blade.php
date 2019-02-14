@extends('frontend.layout') 
 @include('frontend.partials.meta')
@section('content')

   <div class="tieude">
      <h3 class="title">{!! $detailPage->title !!}</h3>
   </div>
   <div class="">
      <div class="noidung">
         {!! $detailPage->content !!}
      </div>
      <div class="clear"></div>
   </div>  

@endsection