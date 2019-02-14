@extends('frontend.layout')
@include('frontend.partials.meta')
@section('header')
  @include('frontend.partials.header')
  
@endsection

@section('content')
<div class="block_product_detail">
<div class="block block_breadcrumb">
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}" title="Trở về trang chủ">Trang chủ</a></li>
        <li><a href="{{ route('parent-cate', $loaiDetail->slug) }}" title="{!! $loaiDetail->name !!}">{!! $loaiDetail->name !!} </a></li>
        <li><a href="{{ route('child-cate', [$loaiDetail->slug, $cateDetail->slug]) }}" title="{!! $cateDetail->name !!}">{!! $cateDetail->name !!} </a></li>
        <li class="active">{!! $detail->name !!}</li>
    </ol>
</div><!-- /block_breadcrumb -->

    <div class="block_detail_wrap">
        <h1>{!! $detail->name !!}</h1>
        <div class="product_detail_content">
            <div class="row block">
                <div class="col-md-9 col-sm-8 col-xs-12 block_detail_left">
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-xs-12 product_detail_img">
                            <div class="product-image">
                                <div class="bxslider product-img-gallery">
                                    @foreach( $hinhArr as $hinh )
                                    <div class="item">
                                        <a href="{{ Helper::showImage($hinh['image_url']) }}" data-lightbox="roadtrip">
                                            <img src="{{ Helper::showImage($hinh['image_url']) }}" alt=" hinh anh {!! $detail->name !!}" />
                                        </a>
                                    </div>
                                    @endforeach
                                </div><!-- /product-img-gallery -->
                                <div class="product-img-thumb">
                                    <div id="gallery_01" class="pro-thumb-img">
                                        <?php $i = 0; ?>
                                        @foreach( $hinhArr as $hinh )
                                        <div class="item">
                                            <a href="#" data-slide-index="{{ $i }}">
                                                <img src="{{ Helper::showImageThumb($hinh['image_url']) }}" alt="thumb {!! $detail->name !!}" />
                                            </a>
                                        </div>
                                        <?php $i++; ?>
                                        @endforeach
                                    </div>
                                </div><!-- /product-img-thumb -->
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 product_detail_info">
                            <div class="block_price">
                                <strong>{!! $detail->is_sale == 1 ? number_format($detail->price_sale ) : number_format($detail->price)  !!}₫</strong>
                            </div>
                            @if($detail->khuyen_mai)
                            <div class="block_promotion">
                                <strong>KHUYẾN MÃI</strong>
                                {!! $detail->khuyen_mai !!}
                            </div>
                            @endif
                            <a href="javascript:;" title="Mua Ngay" class="block_order" data-id="{!! $detail->id !!}">
                                <i class="pw-icon-gift-2"></i>
                                <span class="desc">
                                    <span class="text-1">Mua hàng ngay</span>
                                    <span class="text-2">Giao hàng toàn quốc</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div><!-- /block_detail_left -->
                <div class="col-md-3 col-sm-4 col-xs-12 block_detail_right">                    
                    <div class="block_support">
                        <h3>Tư vấn &amp; Mua hàng - Gọi</h3>
                        <div class="support_phone">                            
                            <a href="tel:02838888999">38.888.999</a>
                        </div>
                        <div class="support_img">
                            <img src="{{ URL::asset('assets/images/msg_color.jpg') }}" alt="Sopport">
                        </div>
                        <div class="support_content">
                            <ul>
                                <li>Hàng chính hãng, bảo hành toàn quốc</li>
                                <li>Giao hàng ngay (Nội thành TP.HCM)</li>
                                <li>Giao trong vòng 2 đến 3 ngày (Toàn quốc)</li>
                                <li>Gọi lại cho Quý khách trong 5 phút</li>
                                <li>Xem hàng tại nhà, hài lòng thanh toán</li>
                            </ul>
                            <!--<div class="block_pay">
                                <p>MIỄN PHÍ <strong>CHARGE THẺ</strong></p><img src="images/logo-card.jpg" alt="Thanh toán với thẻ visa,...">
                            </div>-->
                        </div>
                        <span class="support-top"></span>
                        <span class="support-bot"></span>
                    </div>
                </div><!-- /block_detail_right -->
            </div>
            <div class="block box_detail clearfix">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 block_detail_left">
                        <div class="block_characteristics">
                            <h2>{!! $detail->name !!}</h2>
                            {!! $detail->chi_tiet !!}
                        </div><!-- /block_characteristics -->
                        <div class="block_show_less">
                            <a class="btn-overflow" href="javascript:void(0);">Xem chi tiết</a>
                        </div><!-- /block_show_less -->
                        <div class="block_bottom_order">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <img src="images/detail/thumb/1.jpg" alt="">
                                    <div class="info_sp">
                                        <h3>{!! $detail->name !!}</h3>
                                        <strong>{!! $detail->is_sale == 1 ? number_format($detail->price_sale ) : number_format($detail->price)  !!}₫</strong>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <a href="javascript:;" title="Mua Ngay" class="block_order" data-id="{!! $detail->id !!}">
                                        <i class="pw-icon-gift-2"></i>
                                        <span class="desc">
                                            <span class="text-1">Mua hàng ngay</span>  
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /block_detail_left -->
                    <div class="col-md-4 col-sm-4 col-xs-12 block_detail_right">                        
                        @if( $detail->loaiSp->is_hover == 1)
                        <?php 
                            $spThuocTinhArr = json_decode( $detail->thuocTinh->thuoc_tinh, true);
                        ?>
                        <div class="block_tableparameter">
                            <h2>Thông số kỹ thuật</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    @foreach($hoverInfo as $info)
                                    <?php $tmpInfo = explode(",", $info->str_thuoctinh_id); ?>
                                    <tr>
                                        <td class="title" style="width:105px;text-align:left">{!! $info->text_hien_thi !!}</td>
                                        <td>
                                            <?php 
                                            $countT = 0; $totalT = count($tmpInfo);
                                            foreach( $tmpInfo as $tinfo){
                                                $countT++;
                                                if(isset($spThuocTinhArr[$tinfo])){
                                                    echo $spThuocTinhArr[$tinfo];
                                                    echo $countT < $totalT ? ", " : "";
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    @endforeach                                
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <button type="button" class="btn btn_tableparameter" data-toggle="modal" data-target="#Modalparameter">Xem cấu hình chi tiết</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @endif
                    </div><!-- /block_detail_right -->
                </div><!-- /box_detaillightbox -->
            </div>
        </div><!-- /product_detail_content -->
    </div><!-- /block_detail_wrap -->
</div><!-- /block_product_detail -->
<div class="modal fade" id="Modalparameter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{!! $detail->name !!}</h4>
            </div>
            <div class="modal-body">
                <div class="text-align:center"><img style="max-width:400px;margin:auto" src="{{ Helper::showImage($hinhArr[0]['image_url']) }}" alt="{!! $detail->name !!}"></div>
                @if( !empty( $thuocTinhArr ))
                <table class="table parameterfull">
                    
                  @foreach($thuocTinhArr as $loaithuoctinh)
                    <tr>
                      <td colspan="2" class="title">{{ $loaithuoctinh['name']}}</td>
                    </tr>
                    @if( !empty($loaithuoctinh['child']))
                      @foreach( $loaithuoctinh['child'] as $thuoctinh)
                      <tr>
                        <td width="150">{{ $thuoctinh['name']}}</td>
                        <td>{{ isset($spThuocTinhArr[$thuoctinh['id']]) ?  $spThuocTinhArr[$thuoctinh['id']] : "" }}</td>
                      </tr>
                      @endforeach
                    @endif
                  @endforeach
                  
              
              </table>
              @endif
            </div>
                  
                
            </div>
        </div>
    </div>
</div><!-- Modal -->
@stop
@section('js')
<script type="text/javascript">
$(document).ready(function () {
        lightbox.option({
            'resizeDuration': 700,
            'wrapAround': true,
            'showImageNumberLabel': false,
            'fadeDuration': 700,
            'positionFromTop': 50,
        });

        $(".bxslider").bxSlider({
            controls: false,
            pagerCustom: '.pro-thumb-img',
            infiniteLoop: false,
            hideControlOnEnd: true,
            mode: 'fade',
        });

        $(".pro-thumb-img").bxSlider({
            slideMargin: 10,
            maxSlides: 5,
            pager: false,
            controls: true,
            slideWidth: 70,
            infiniteLoop: false,
            nextText: '<i class="fa fa-angle-right"></i>',
            prevText: '<i class="fa fa-angle-left"></i>'
        });
        var text = $('.block_characteristics'),
            btn = $('.btn-overflow'),
            h = text[0].scrollHeight;

        if(h > 364) {
            btn.addClass('less');
            btn.css('display', 'block');
        }
        btn.click(function(e) {
            e.stopPropagation();

            if (btn.hasClass('less')) {
                btn.removeClass('less');
                btn.addClass('more');
                btn.parent().addClass("less")
                btn.text('Rút gọn');
                text.animate({'height': h});
            } else {
                btn.addClass('less');
                btn.removeClass('more');
                btn.text('Xem chi tiết');
                btn.parent().removeClass("less")
                text.animate({'height': '364px'});
            }  
        });
        $('.btn_tableparameter').click(function(){
            if ($('body').hasClass('modal-open')) {
                $('body').addClass('.block_fixbody');
            }else{
                $('body').removeClass('.block_fixbody');
            }
        });
    });
$(document).ready(function($){  
  $('a.block_order').click(function() {
        var product_id = $(this).data('id');
        add_product_to_cart(product_id);
      });
});
function add_product_to_cart(product_id) {
  $.ajax({
    url: $('#route-add-to-cart').val(),
    method: "GET",
    data : {
      id: product_id
    },
    success : function(data){
       $('.cart-link').click();
    }
  });
}
</script>
@stop

@include('frontend.partials.footer')
