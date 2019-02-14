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
<div class="content-right banggia1">
    <div class="col-md-9">
        <div class="tieude">
            <h3>Tin tức</h3>
        </div>
        <div id="tieude">
          <div><h2> {!! $detail->title !!}</h2></div>
        </div>
        <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i> {!! date('d/m/Y H:i', strtotime($detail->created_at)) !!} - <i class="fa fa-eye" aria-hidden="true"> </i> 89</div>
        <div class="news-content">
            {!! $detail->content !!}
        </div>
        <div class="tieude"><h3>Các tin khác</h3></div>
        <div class="box-content">
          <ul>
          @foreach( $otherArr as $articles)
          <li class="col-sm-6" style="margin-bottom: 10px">                
              <div class="col-sm-5">
                <img src="{{ Helper::showImage($articles->image_url) }}" class="img-responsive img-thumbnail">
              </div>
              <div class="col-sm-7" style="padding-left: 0px;">
                  <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}" style="text-decoration:none;"><span style="font-size:14px; color:#666;">{!! $articles->title !!}</span></a>
                  <p>
                    {!! $articles->description !!}
                  </p>
            </div>    
          </li>
                            
          @endforeach
        </ul>
        <div class="clearfix"></div>
        </div>
    </div>
    @include('frontend.news.sidebar')
</div>
<style type="text/css">

</style>
@endsection