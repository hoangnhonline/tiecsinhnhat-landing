@extends('frontend.layout')
@include('frontend.partials.meta')
@section('content')
<div id="info">
   <div id="sanpham" class="">
      <div class="">
         <div class="tieude">
            <h3>Liên hệ <span></span></h3>
         </div>
         <div class="banggia1">
            <div class="form_contact text-center" style="font-size:18px" >
               `  
               <h3 class="fadeInLeft" style="font-size:24px;color : #4E7547; margin-bottom:20px;font-weight:bold">EKIP TIỆC NGON</h3>
               <p><i class="fa fa-map-marker"></i> 146 Kênh Tân Hóa - P Phú Trung- Q.Tân Phú </p>
               <p><i class="fa fa-map-marker"></i> 2/13/22 đường Thạnh Lộc 13 KP 1. P.Thạnh Lộc. Q12. TP HCM </p>
               <p style="color:red"><i class="fa fa-mobile"></i> 090 2425 068 ( A.Duy ) </p>
               <p style="color:red"><i class="fa fa-mobile"></i> 0981 498 043 ( A.Dũng ) </p>
               <p>Website: <a href="http://tiecngon.vn">http://tiecngon.vn/</a></p>
            </div>
            <div class="form_lh">
                  @if(Session::has('message'))                    
                  <p class="alert alert-info" >{{ Session::get('message') }}</p>                   
                  @endif
                  @if (count($errors) > 0)
                  <p class="alert alert-danger" >Vui lòng nhập đầy đủ thông tin.</p>                   
                  @endif  
                  <form method="POST" action="{{ route('send-contact') }}">
                    {{ csrf_field() }}          
                  <p><label>Họ tên : </label><b style="color:#990000;">*</b><input name="full_name" type="text" class="tflienhe" id="full_name" value="{{ old('full_name') }}"></p>                 
                  <p><label>Điện Thoại  : </label> <b style="color:#990000;">*</b><input name="phone" type="tel" class="tflienhe" id="phone" value="{{ old('phone') }}"></p>
                  <p><label>Email : </label><b style="color:#990000;">*</b><input name="email" type="email" class="tflienhe" id="email" value="{{ old('email') }}"></p>               
                  <p><label>Nội dung : </label><b style="color:#990000;">*</b>
                     <textarea name="content" cols="50" rows="5" class="ta_noidung" id="content" style="background-color:#FFFFFF; color:#666666;">{{ old('content') }}</textarea>
                  </p>
                  <p><label>&nbsp; </label>
                     <button type="submit" class="btn btn-primary"> Gửi liên hệ</button>
                     <button type="reset" class="btn btn-default">Reset</button>   
                  </p>
               </form>
            </div>
         </div>
         <div class="clear"></div>
      </div>
   </div>
</div>
<div class="map_contact">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5301976598976!2d106.63353281422613!3d10.770644392325421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752e98b0231741%3A0x85e64da5d9d8b2ec!2zMTQ2IEvDqm5oIFTDom4gSMOzYSwgVMOibiBQaMO6LCBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1502443102096" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="clear"></div>
@endsection