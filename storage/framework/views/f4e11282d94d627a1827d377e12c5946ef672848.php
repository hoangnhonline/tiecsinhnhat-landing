<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Liên hệ đặt món
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo e(route( 'dat-mon.index' )); ?>">Liên hệ đặt món</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <?php if(Session::has('message')): ?>
      <p class="alert alert-info" ><?php echo e(Session::get('message')); ?></p>
      <?php endif; ?>
     
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <span class="value"><?php echo e($items->total()); ?> liên hệ )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
           <?php echo e($items->links()); ?>

          </div>   
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>                            
              <th>Điện thoại</th>
              <th style="text-align: right">Số bàn</th>
              <th>Món</th>
              <th class="text-right">Ngày đặt</th>
              <th width="1%;white-space:nowrap">Thao tác</th>
            </tr>
            <tbody>
            <?php if( $items->count() > 0 ): ?>
              <?php $i = 0; ?>
              <?php foreach( $items as $item ): ?>
                <?php $i ++; ?>
              <tr id="row-<?php echo e($item->id); ?>">
                <td><span class="order"><?php echo e($i); ?></span></td>      
                     
                <td>                  
                  <?php echo e($item->phone); ?>

                </td>
                <td width="150" class="text-right" style="font-weight:bold">
                  <?php echo e($item->table_no); ?>

                </td>
                
                <td>
                	<?php 
			            $food_id_list = rtrim($item->food_id_list, ',');
			            $foodIdArr = explode(',', $food_id_list);
			            $foodList = \DB::table('food')->whereIn('id', $foodIdArr)->get();
			            $i = 0;
			          ?>
			          <ul>

			            <?php foreach($foodList as $food): ?>
			            <?php $i++; ?>
			            <li style="list-style: none;"><?php echo e($i); ?>. <?php echo e($food->name); ?></li>
			            <?php endforeach; ?>
			          </ul>
                </td>
                <td style="text-align: right">
                	<?php echo e(date('d/m/Y H:i', strtotime($item->created_at))); ?>

                </td>
                <td style="white-space:nowrap">                  
                  
                  <a onclick="return callDelete('<?php echo e($item->phone); ?>','<?php echo e(route( 'dat-mon.destroy', [ 'id' => $item->id ])); ?>');" class="btn btn-danger  btn-sm">Xóa</a>
                  
                </td>
              </tr> 
              <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="3">Không có dữ liệu.</td>
            </tr>
            <?php endif; ?>

          </tbody>
          </table>
          <div style="text-align: center">
            <?php echo e($items->links()); ?>

          </div>
           
        </div>        
      </div>
      <!-- /.box -->     
    </div>
    <!-- /.col -->  
  </div> 
</section>
<!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript_page'); ?>
<script type="text/javascript">
function callDelete(name, url){  
  swal({
    title: 'Bạn muốn xóa "' + name +'"?',
    text: "Dữ liệu sẽ không thể phục hồi.",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes'
  }).then(function() {
    location.href= url;
  })
  return flag;
}
$(document).ready(function(){
  $('#food_type_id, #food_group_id').change(function(){
      $(this).parents('form').submit();
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>