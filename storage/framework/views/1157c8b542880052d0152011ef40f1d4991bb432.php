<?php if(isset($bannerArr[1])): ?>
<div id="sliders">
	<!-- Place somewhere in the <body> of your page -->
	<div id="slider" class="flexslider">
	  <ul class="slides">
	  	<?php $i = 0; ?>
		<?php foreach($bannerArr[1] as $banner): ?>
		<?php $i++; ?>
	    <li>
    	<?php if($banner->ads_url !=''): ?>
		<a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
		<?php endif; ?>
	      <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner slide <?php echo e($i); ?>">
	      <?php if($banner->ads_url !=''): ?>
			</a>
			<?php endif; ?>
	    </li>
	    <?php endforeach; ?>
	    
	  </ul>
	</div>	
</div>
<?php endif; ?>
	<section class=" bg-color dq-fix-icon" style="background-color: #f5f5f5;margin-top: -5px;">
		<div class="container">			
			<ul class="row product-list">
				<?php foreach($tiecList as $articles): ?>							
				<li class="col-md-2 col-sm-4 col-xs-6">
					<div class="icon">
						<a style="height: 100%" href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
							<img style="height: 100%" src="<?php echo Helper::showImage($articles->image_url); ?>" alt="<?php echo $articles->title; ?>">
						</a>
					</div>
					<h5>
						<a href="<?php echo e(route('news-detail', ['slug' => $articles->slug, 'id' => $articles->id])); ?>" title="<?php echo $articles->title; ?>">
						<?php echo $articles->title; ?>

						</a>
					</h5>				
				</li>						
				<?php endforeach; ?>					
			</ul>
		</div>
	</section>
<div class="container" style="margin-top: 15px">
	
	  <ul class="slides">
	    <?php foreach($menuList as $menu): ?>      
	    		<?php $i = $totalPrice = 0; ?>
                  <?php foreach($menu->foodMenu as $food): ?>
                  <?php $i++;
                  $detailFood = DB::table('food')->where('id', $food->food_id)->first();
                  $totalPrice+= $detailFood->price;
                  ?>                  
                  <?php endforeach; ?>
	    <li class="col-md-4 col-sm-6" style="padding: 10px">  
	      <div class="item-wr3">
	        <div>
	          <div class="item-gia"><?php echo $menu->name; ?>: <span> <?php echo number_format($totalPrice); ?> đồng/bàn</span></div>
	          <div>
	          	<img src="<?php echo e(Helper::showImage($menu->image_url)); ?>" class="img-responsive">
	          </div>
	          <div class="content">
	             <div class="hover3">
	                <div style="padding:5px">
	                <?php $cf = 0; ?>
	                   <?php foreach($menu->foodMenu as $food): ?>
	                   <?php 
	                   $detailFood = DB::table('food')->where('id', $food->food_id)->first();
	                   ?>
	                   <?php $cf++; ?>
	                  	<div class="row">
	                   	<div class="col-xs-7 food-name"><span style="color:red; font-size: 15px;"><?php echo e($cf); ?>. </span><span style="color:#000010;font-size:15px"><?php echo $detailFood->name; ?></span>
	                   	</div>
	                   	<div class="col-xs-3 food-price" style="text-align: right;"><?php echo number_format($detailFood->price); ?></div>
	                   	<div class="col-xs-2" style="text-align: right">
	                   		<label class="item-select-label" for="item-<?php echo e($menu->id); ?>-<?php echo e($detailFood->id); ?>">
                                <input class="item-select-input noselect" id="item-<?php echo e($menu->id); ?>-<?php echo e($detailFood->id); ?>" type="checkbox" data-id="<?php echo e($detailFood->id); ?>"  data-value="<?php echo e($detailFood->price); ?>" data-name="<?php echo $detailFood->name; ?>">
                            </label>
	                   	</div>
	                  	</div>
	                   <?php endforeach; ?>
	                </div>
	             </div>	             
	          </div>
	        </div>
	      </div>    
	  	</li>
	      <?php endforeach; ?>    
	    <!-- items mirrored twice, total of 12 -->
	  </ul>
	
</div>
<section class="awe-section-2">	
	<div class="section section-banner">
		<div class="container">
			<div class="tieude">
      <h3>Danh sách món</h3>
   </div>
			<?php foreach($foodTypeList as $foodType): ?>
			<div class="panel-group">
			    <div class="panel panel-default">
			      <div class="panel-heading" style="background-color: #82bf00; color: #FFF; font-weight: bold">
			        <h4 class="panel-title">
			          <a data-toggle="collapse" href="#collapse<?php echo $foodType->slug; ?>"><?php echo $foodType->name; ?></a>
			        </h4>
			        <?php if($foodType->foodGroup->count() > 0): ?>
			        <ul class="list-group-mon">
					    	<?php foreach($foodType->foodGroup as $group): ?>
					    	
					    		<li style="display: inline;"><a style="color: #FFF" href="#mon<?php echo e($group->slug); ?>"><?php echo $group->name; ?></a> | </li>
					    
					    	<?php endforeach; ?>
					    		</ul>
					 <?php endif; ?>
			      </div>
			      <div id="collapse<?php echo $foodType->slug; ?>" class="panel-collapse">
			        <div class="panel-body" style="max-height: 400px;overflow-y: scroll;">
			        	<table class="table table-bordered">
			        		<?php if($foodType->foodGroup->count() > 0): ?>
					    	<?php foreach($foodType->foodGroup as $group): ?>
					    	<tr id="mon<?php echo e($group->slug); ?>" style="color: #82bf00;font-weight: bold;text-transform: uppercase;">
					    		<td colspan="3"><p class="food-group" style="text-align: center;"><?php echo $group->name; ?></p></td>			    	
					    	</tr>
						    	<?php foreach($group->food as $food): ?>

						    	<tr>
						    		<td class="name_food"><p><?php echo $food->name; ?></p></td>			    	
						    		<td class="price_food food-price" style="width: 1%;white-space: nowrap;">
						    			<?php if($food->price > 0): ?>
		                                    <?php echo number_format($food->price); ?> 
						    			<?php endif; ?>
						    		</td>
						    		<td style="width: 1%">
						    			<?php if($food->price > 0): ?>
						    			<input class="item-select-input noselect" id="items-<?php echo e($group->id); ?>-<?php echo e($food->id); ?>" type="checkbox" data-id="<?php echo e($food->id); ?>"  data-value="<?php echo e($food->price); ?>" data-name="<?php echo $food->name; ?>">
						    			<?php endif; ?>
						    		</td>
						    	</tr>
						    	<?php endforeach; ?>
					    	<?php endforeach; ?>
				    	<?php else: ?>
				    		<?php foreach($foodType->food as $food): ?>
					    	<tr>
					    		<td class="name_food"><p><?php echo $food->name; ?></p></td>			    	
					    		<td class="price_food food-price"  style="width: 1%;white-space: nowrap;">
					    			<?php if($food->price > 0): ?>
					    				
	                                    <?php echo number_format($food->price); ?>         
	                                    
					    			<?php endif; ?>
					    		</td>
					    		<td style="width: 1%">
					    			<?php if($food->price > 0): ?>
						    			<input class="item-select-input noselect" id="items-<?php echo e($food->id); ?>-<?php echo e($food->id); ?>" type="checkbox" data-id="<?php echo e($food->id); ?>"  data-value="<?php echo e($food->price); ?>" data-name="<?php echo $food->name; ?>">
						    			<?php endif; ?>
					    		</td>
					    	</tr>
					    	<?php endforeach; ?>
				    	<?php endif; ?>
			        	</table>
			        </div>	        
			      </div>
			    </div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php if(isset($bannerArr[2])): ?>
<div class="spnoibat" style="margin-bottom: 30px"> 
       <div  class="row">
       	<div class="container">
       	<?php $i = 0; ?>
		<?php foreach($bannerArr[2] as $banner): ?>
		<?php $i++; ?>       	
       	<?php if($banner->ads_url !=''): ?>
		<a href="<?php echo e($banner->ads_url); ?>" title="banner slide <?php echo e($i); ?>">
		<?php endif; ?>
	      <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner quy trinh <?php echo e($i); ?>" style="width: 100%">
	      <?php if($banner->ads_url !=''): ?>
			</a>
			<?php endif; ?>
       	<?php endforeach; ?>
       </div>
        </div>
     
   <div class="clear"></div>
</div>
<?php endif; ?>
<section class="awe-section-2">	
	<div class="section section-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 hidden-xs">
				<div class="box mg_mb mg_l_mb">
					<div class="block-video">
						<iframe width="100%" height="345" src="https://www.youtube.com/embed/<?php echo e($settingArr['video_id_home']); ?>" frameborder="0" allowfullscreen id="load_video"></iframe>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="row">
					<div class="col-md-6 col-xs-6">
						<?php if(isset($bannerArr[3])): ?>
						<div class="box margin-bottom-15">
							<?php $i = 0; ?>
							<?php foreach($bannerArr[3] as $banner): ?>
							<?php $i++; ?>       	
					       	<?php if($banner->ads_url !=''): ?>
							<a href="<?php echo e($banner->ads_url); ?>" title="banner home <?php echo e($i); ?>">
							<?php endif; ?>
						      <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner home <?php echo e($i); ?>" style="width: 100%" class="img-responsive">
						      <?php if($banner->ads_url !=''): ?>
								</a>
								<?php endif; ?>
					       	<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
					<div class="col-md-6 col-xs-6">
						<?php if(isset($bannerArr[4])): ?>
						<div class="box margin-bottom-15">
							<?php $i = 0; ?>
							<?php foreach($bannerArr[4] as $banner): ?>
							<?php $i++; ?>       	
					       	<?php if($banner->ads_url !=''): ?>
							<a href="<?php echo e($banner->ads_url); ?>" title="banner home <?php echo e($i); ?>">
							<?php endif; ?>
						      <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner home <?php echo e($i); ?>" style="width: 100%" class="img-responsive">
						      <?php if($banner->ads_url !=''): ?>
								</a>
								<?php endif; ?>
					       	<?php endforeach; ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="box padding-top-5">
					<?php if(isset($bannerArr[5])): ?>
						<?php $i = 0; ?>
							<?php foreach($bannerArr[5] as $banner): ?>
							<?php $i++; ?>       	
					       	<?php if($banner->ads_url !=''): ?>
							<a href="<?php echo e($banner->ads_url); ?>" title="banner home <?php echo e($i); ?>">
							<?php endif; ?>
						      <img src="<?php echo e(Helper::showImage($banner->image_url)); ?>" alt="banner home <?php echo e($i); ?>" style="width: 100%" class="img-responsive">
						      <?php if($banner->ads_url !=''): ?>
								</a>
								<?php endif; ?>
					   	<?php endforeach; ?>
					  <?php endif; ?>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>