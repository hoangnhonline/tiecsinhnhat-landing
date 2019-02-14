<div class="spnoibat">
   <div class="tieude">
      <h3>SỨC KHỎE</h3>
   </div>
  
      @foreach($suckhoeList as $articles)
       <div  class="col-md-3 col-sm-6">
      <div style="background-color: #f5f5f5;min-height: 270px;padding: 5px">
         <div class="cottt ">
            <a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}">
              <img src="{{ Helper::showImage($articles->image_url) }}" alt="{!! $articles->title !!}">
            </a>
            
            <div class="clear"></div>

         </div>
         <div class="clearfix">
               <div class="tentt"><a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></div>                                  
            </div>
      </div>
        </div>
      @endforeach
 
   <div class="clear"></div>
</div>
<div class="spnoibat">
   <div class="tieude">
      <h3>TIN TỨC</h3>
   </div>
   @foreach($articlesListFooter as $articles)
   <div  class="col-md-3 col-sm-6">
      
      <div style="background-color: #f5f5f5;min-height: 270px;padding: 5px">
         <div class="cottt ">
            <a href="{{ route('news-detail', [$articles->slug, $articles->id]) }}">
              <img src="{{ Helper::showImage($articles->image_url) }}" alt="{!! $articles->title !!}" class="img-responsive">
            </a>            

         </div>
         
          
               <p class="tentt" style=""><a style="display: block;" href="{{ route('news-detail', [$articles->slug, $articles->id]) }}" title="{!! $articles->title !!}">{!! $articles->title !!}</a></p>                                  
         
      </div>
    
   </div>
     @endforeach
   <div class="clear"></div>
</div>