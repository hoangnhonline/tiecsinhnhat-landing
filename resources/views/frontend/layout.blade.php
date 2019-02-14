<!DOCTYPE html>
<html lang="vi">

<head>
    <title>@yield('title')</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="robots" content="index,follow" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="@yield('site_description')" />
    <meta name="keywords" content="@yield('site_keywords')" />
    <link rel="shortcut icon" href="@yield('favicon')" type="image/x-icon" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('site_description')" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="tiecngon.vn" />
    <?php $socialImage = isset($socialImage) ? $socialImage : $settingArr['banner']; ?>
    <meta property="og:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="@yield('site_description')" />
    <meta name="twitter:title" content="@yield('title')" />
    <meta name="twitter:image" content="{{ Helper::showImage($socialImage) }}" />
    <meta name="robots" content="index,follow" />
    <link href="{{ URL::asset('assets/js/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/plugin/font-awesome/font-awesome.min.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,greek-ext,cyrillic-ext,vietnamese,greek' rel='stylesheet' type='text/css'>
    <script language="javascript" type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ URL::asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/plugins.min.css') }}" />
</head>

<body>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 hidden-sm hidden-xs">
                    <div class="header-top-left">
                        <i class="fa fa-shopping-cart"></i>
                        <span>TỔ CHỨC TIỆC LƯU ĐỘNG CHUYÊN NGHIỆP TẠI VIỆT NAM</span>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 text-right">
                    <div class="header-top-right">
                        <a href="tel:0902425068" class="margin-right-10 item-contact">
                            <i class="fa phone-square" title="Điện thoại liên hệ"></i> 090 2425 068
                        </a>
                        <a href="mailto:cskh@tiecngon.vn" target="_top" class="item-contact">
                            <i class="fa fa-envelope" aria-hidden="true" title="Email liên hệ"></i> cskh@tiecngon.vn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="menu">
        <div class="wrapper container">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ URL::asset('assets/upload/hinhanh/logo-tiecngonvn.png') }}" alt="logo tiecngon.vn" />
                </a>
            </div>
            
        </div>
        <div class="clear"></div>
    </div>
    @yield('slider')
    <div id="content">
        <div class="container">
            <div class="row">
                <div id="content_right" class="col-sm-12 col-xs-12">
                    <div class="content-right">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="bottom">
    </div>
    @include('frontend.partials.footer')
    <div class="ppocta-ft-fix">
	<div id="messengerButton"> 
		<a href="http://fb.com/msg/tiecngon.vn" target="_blank" onclick="_gaq.push(['_trackEvent', 'Call To Action', 'Messenger Button', 'Mobile']);"><i></i></a>
	</div>
	<div id="zaloButton"> 
		<a href="http://zalo.me/0902425068" target="_blank" onclick="_gaq.push(['_trackEvent', 'Call To Action', 'Zalo Button', 'Mobile']);"><i></i></a>
	</div>
	<div id="callNowButton"> 
		<a href="tel:0902425068" onclick="_gaq.push(['_trackEvent', 'Call To Action', 'Call Button', 'Mobile']);"><i></i></a>
	</div>
    </div>
    <a id="return-to-top" class="td-scroll-up" href="javascript:void(0)">
        <i class="fa fa-angle-up" aria-hidden="true"></i>
    </a>
    <!-- Return To Top -->
    @if($routeName != 'tao-menu')
    <div class="menu-select">
        <div class="wrapper-menu-select">
            <div class="wrapper-form">
                <div class="form-header"> <span> <span class="icon-item"><i class="fa fa-align-justify"></i></span> MENU TỰ CHỌN </span> &nbsp;
                    <button id="close-all-menu" class="btn btn-sm">Bỏ chọn</button> <span class="action-right"> <span class="total-item">0</span> </span>
                    <a class="form-close" href="javascript:void(0);"> <i class="fa fa-times"></i> </a>
                </div>
                <div class="form-body">
                    <ul class="wrapper-body" id="nocontent">
                        <li>
                            <div class="alert alert-warning"> <strong> <i class="icofont icofont-mega-phone"></i> </strong> Vui lòng chọn món từ danh sách các thực đơn.</div>
                        </li>
                    </ul>
                    <table class="table" id="div-content-edit">
                        <tr class="header-table">

                        </tr>
                    </table>
                </div>
                <div class="form-footer"> <span> <button id="loadModalDat" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm">Đặt món</button> </span> <span class="footer-label">Tổng:</span> <span class="total-price" id="total-price">0</span> <span class="footer-label">đ</span></div>
            </div>
        </div>
        <a class="toggle-menu-select" href="javascript:void(0);"> <span class="count-item-food">0</span> <i class="fa fa-align-justify"></i> Chọn </a>
    </div>
    @endif
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Đặt món</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dat-mon') }}" method="POST" id="formDatMon">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control number" id="phone" name="phone" maxlength="12">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Số bàn</label>
                            <input type="text" class="form-control number" id="table_no" name="table_no" maxlength="2">
                        </div>
                        <div class="text-center">
                            <button type="button" id="btnDatMon" class="btn btn-success">Gửi</button>
                        </div>
                        <input type="hidden" name="str_food_id" value="" id="str_food_id">
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('assets/js/FlexSlider/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.mmenu.min.all.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/sweetalert2.min.js') }}"></script>
    @yield('js')
    <script type="text/javascript" src="{{ URL::asset('assets/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/general.js') }}"></script>
    @if($routeName != 'tao-menu')
    <script type="text/javascript" src="{{ URL::asset('assets/js/order.js') }}"></script>
    @endif
    <input type="hidden" id="route-newsletter" value="{{ route('register.newsletter') }}">
    <input type="hidden" id="fb_redirect_url" value="{{ route('home') }}">
    <input type="hidden" id="route-ajax-login-fb" value="{{route('ajax-login-by-fb')}}">
    <input type="hidden" id="fb-app-id" value="{{ env('FACEBOOK_APP_ID') }}">
    <input type="hidden" id="url_fb_redirect" value="{{ route('home') }}">
</body>

</html>