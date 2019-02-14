<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('content'); ?>
<div class="container-right banggia1" style="min-height: 400px">
  	<div class="tieude"><h3 class="title">Đặt món thành công</h3></div>
  		
	<div style="padding-top: 20px;padding-bottom: 10px; text-align: center;">
		<?php echo $settingArr['thanks']; ?>

	</div>
	<div class="shareFacebook" style="text-align: center;">
		<div class="fb-share-button" data-href="https://tiecngon.vn" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Ftiecngon.vn%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
	</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>