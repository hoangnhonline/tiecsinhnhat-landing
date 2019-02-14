<footer class="footer">
   <div class="site-footer">
     
   <div class="mid-footer">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
               <div class="widget-ft first">
                  <h4 class="title-menu">
                     <a role="button">
                        Về chúng tôi</i>
                     </a>
                  </h4>
                  <div  id="collapseListMenu01">
                     <?php foreach($tiec2List as $articles): ?>                   
                     <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="icons">
                           <a href="<?php echo e($articles->url); ?>" title="<?php echo $articles->title; ?>">
                              <img class="img-thumbnail" src="<?php echo Helper::showImage($articles->image_url); ?>" alt="<?php echo $articles->title; ?>">
                           </a>
                        </div>
                        <h5 style="padding-top: 5px;">
                           <a style="color: #FFF" href="<?php echo e($articles->url); ?>" title="<?php echo $articles->title; ?>">
                           <?php echo $articles->title; ?>

                           </a>
                        </h5>          
                     </div>                
                     <?php endforeach; ?> 
                  </div>
               </div>
            </div>
            
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
               <div class="widget-ft">
                  <h4 class="title-menu title-db">
                     <a role="button">
                        EKIP TIỆC NGON</i>
                     </a>
                  </h4>
                  <div id="collapseListMenu03">
                     <ul class="list-menu">
                        <li class="li_menu"><i class="fa fa-map-marker"></i> 236 Nguyễn Thái Bình - P.12 - Q.Tân Bình </li>

                        <li class="li_menu"><i class="fa fa-map-marker"></i> 9 Tân Thành - P.Hòa Thạnh - Q.Tân Phú  </li>
                        
                        <li class="li_menu"><i class="fa fa-map-marker"></i> 2 Thạnh Lộc 13 KP 1. P.Thạnh Lộc. Q12. TP HCM </li>
                        
                        <li class="li_menu"><i class="fa fa-mobile"></i> 090 2425 068 Mr. Duy</li>
                        
                        <li class="li_menu"><i class="fa fa-mobile"></i> 0981 498 043 Mr. Dũng</li>
                        
                        <li class="li_menu">Website: <a href="http://tiecngon.vn" style="color:#FFF">Tiecngon.vn</a></li>
                        <p> </p>
                  <p> </p>
                  <p></p>
                        
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
               <div class="widget-ft last social_footer">

                  <div class="social_footer">
                     <h4 class="title-menu icon_none_first icon_title_last">
                        <a>Kết nối với chúng tôi</a>
                     </h4>
                     <ul class="follow_option"> 
                        
                        <li>
                           <a href="#" title="Theo dõi Facebook MetaSport"><i class="fa fa-facebook"></i></a>
                        </li>
                        
                        
                        <li>
                           <a href="#" title="Theo dõi Twitter MetaSport"><i class="fa fa-twitter"></i></a>
                        </li>
                        
                        
                        <li>
                           <a href="#" title="Theo dõi Google Plus MetaSport"><i class="fa fa-google-plus"></i></a>
                        </li>
                        
                        
                        <li>
                           <a href="#" title="Theo dõi Instagam MetaSport"><i class="fa fa-instagram"></i></a>
                        </li>
                        
                        
                        <li>
                           <a href="#" title="Theo dõi Youtube MetaSport"><i class="fa fa-youtube-play"></i></a>
                        </li>
                        
                     </ul>
                  </div>
                  <div class="mail_footer">
                     <h4 class="title-menu icon_none_first">
                        <a>Nhận tin khuyến mãi</a>
                     </h4>
                     <ul class="contact contact_mail">
                        <li>                           
                           <form class="margin-bottom-0" action="//dkt.us13.list-manage.com/subscribe/post?u=0bafe4be7e17843051883e746&amp;id=3bdd6e9e3b" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                              <input type="email" value="" placeholder="Nhập email của bạn" name="EMAIL" id="mail">
                              <button class="btn btn-primary subscribe" name="subscribe" id="subscribe">Đăng ký</button>
                           </form>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
               <div class="fixed-ft">
                  <div class="box_footer">
                     <div class="ft-ds">
                        2018 Copyright © <span style="color:#ff0; font-weight: bold;"> </span> .All rights reserved.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>   
   </div>
</footer>