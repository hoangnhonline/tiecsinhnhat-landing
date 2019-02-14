<div id="header">
    <div class="header">
        <div class="container">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ URL::asset('assets/upload/hinhanh/nguyenhadasdamsau1095468130x113-9243_130x115.png') }}" alt="logo" />
                </a>
            </div>
            <div class="banner">
                <img class="left" src="{{ URL::asset('assets/upload/hinhanh/nguyenhadasdamsau1062970420x160sssss-7997_420x160.png') }}" alt=" ">
                <div class="clear"></div>
            </div>
            <div class="address">
                <ul id="user_info_header" class="navbar-right">
                    @if(!Session::get('username'))
                    <li>
                        <a data-url="javascript:;" title="Đăng nhập bằng Facebook" class="user-name-loginfb login-by-facebook-popup"><i class="fa fa-facebook-square"></i>Đăng nhập bằng Facebook</a>
                    </li>
                    @else
                    <li class="dropdown dropdown-arrow" style="margin-top:10px">
                        <a href="/thong-tin-tai-khoan.html" class="info-user-name dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-user-circle"></i> {{ Session::get('username') }} <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="show-in-checkout">
                                <a href="{{ route('danh-sach-menu') }}" title="Menu đã lưu"> Menu đã lưu</a>
                            </li>                           
                            <li class="show-in-checkout"><a href="{{ route('logout') }}" rel="nofollow" class="underlined">Đăng xuất</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>