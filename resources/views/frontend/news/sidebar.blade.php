<div class="col-md-3 sidebar">
      <div class="block-sidebar block-news-sb">
        <div class="block-title">
          <p class="title">HOTLINE</p>
        </div>
        <div class="block-content hotline">
            <div class="wrap-news-list" style="padding-top: 15px;">
                <p class="hotl"> 090 2425 068 ( A.Duy )</p>
                <p class="hotl">0981 498 043 ( A.Dũng )</p>
            </div>
        </div>
      </div>

      <div class="block-sidebar block-news-sb">
        <div class="block-title">
          <p class="title">DANH MỤC</p>
        </div>
        <div class="block-content danhmuc">
            <div class="wrap-news-list">
                <ul class="row product-list">
                  @foreach($tiecList as $articles)              
                  <li class="col-md-6 col-sm-6 col-xs-12">
                    <div class="icons">
                      <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                        <img style="width: 100%" src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}" class="img-responsive img-thumbnail">
                      </a>
                    </div>
                    <h5>
                      <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                      {!! $articles->title !!}
                      </a>
                    </h5>       
                  </li>           
                  @endforeach         
                </ul>
            </div>
        </div>
      </div>
      <div class="block-sidebar block-news-sb">
        <div class="block-title">
          <p class="title">TIN MỚI NHẤT</p>
        </div>
        <div class="block-content danhmuc">
            <div class="wrap-news-list">
                <ul class="row product-list">
                  @foreach($lastestArr as $articles)              
                  <li class="col-xs-12">
                    <div class="icons">
                      <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                        <img style="width: 100%" src="{!! Helper::showImage($articles->image_url) !!}" alt="{!! $articles->title !!}">
                      </a>
                    </div>
                    <p class="lastest-title">
                      <a href="{{ route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id]) }}" title="{!! $articles->title !!}">
                      {!! $articles->title !!}
                      </a>
                    </p>       
                  </li>           
                  @endforeach         
                </ul>
            </div>
        </div>
      </div>
</div>