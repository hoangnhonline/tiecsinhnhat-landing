<?php echo $__env->make('frontend.partials.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
<?php $__env->startSection('slider'); ?>
	<?php echo $__env->make('frontend.home.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>  
 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>