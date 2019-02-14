@include('frontend.partials.meta')
@section('content')
<div>
  @if(isset($bannerArr[6]))
  <?php $i = 0; ?>
    @foreach($bannerArr[6] as $banner)
    <?php $i++; ?>        
        @if($banner->ads_url !='')
    <a href="{{ $banner->ads_url }}" title="banner home {{ $i }}">
    @endif
        <img src="{{ Helper::showImage($banner->image_url) }}" alt="banner blog {{ $i }}" style="width: 100%" class="img-responsive">
        @if($banner->ads_url !='')
      </a>
      @endif
    @endforeach
  @endif  
</div>
<div id="info" class="">
   <div class="col-md-9">
      <div class="tieude">
         <h3>Tin tức</h3>
      </div>
      <div class="box-content ">
        
         @foreach($articlesList as $articles)
        
         <div class="tintuc wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="ttlienquan">
              <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                           <img src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
            </div>
            <div class="ttthongtin">
               <h3><a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></h3>
               <div class="box-news-mota">
               </div>
               <div class="box-news-xct"><a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">Xem thêm</a></div>
            </div>
            <div class="clear"></div>
         </div>
         @endforeach
         <div class="clear"></div>       
      </div>
      <div class="clear"></div>
      <div class="paging">{{ $articlesList->links() }}</div>
   </div>
   @include('frontend.news.sidebar')
</div>
@endsection