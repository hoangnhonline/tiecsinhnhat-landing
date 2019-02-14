<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Menu
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="<?php echo e(route( 'menu.index' )); ?>">Menu</a></li>
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
      <a href="<?php echo e(route('menu.create')); ?>" class="btn btn-info" style="margin-bottom:5px">Tạo mới</a>
      
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <span class="value"><?php echo e($items->total()); ?> menu )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
            
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>  
               <th width="150">Thumbnail</th>                          
              <th width="150">Tên menu</th>
              
              <th>Các món ăn</th>
              <th width="200" style="text-align:right">Giá</th>
              <th width="1%;white-space:nowrap">Thao tác</th>
            </tr>
            <tbody>
            <?php if( $items->count() > 0 ): ?>
              <?php $k = 0; ?>
              <?php foreach( $items as $item ): ?>
                <?php $k ++; ?>
                
              <tr id="row-<?php echo e($item->id); ?>">
                <td><span class="order"><?php echo e($k); ?></span></td>      
                 <td>                  
                  <img class="img-thumbnail" src="<?php echo e(Helper::showImage($item->image_url)); ?>" width="145">
                </td>       
                <td>                  
                  <a href="<?php echo e(route( 'menu.edit', [ 'id' => $item->id ])); ?>"><?php echo e($item->name); ?></a>
                </td>
               
                <td>
                  <?php $i = $totalPrice = 0; ?>
                  <?php foreach($item->foodMenu as $food): ?>
                  <?php $i++; 
                  $detailFood = DB::table('food')->where('id', $food->food_id)->first();
                  $totalPrice+= $detailFood->price;
                  ?>
                  <?php echo e($i); ?>. <?php echo e($detailFood->name); ?><br>
                  <?php endforeach; ?>
                </td>
                 <td style="text-align:right">                  
                  <?php echo e(number_format($totalPrice)); ?>

                </td>
                <td style="white-space:nowrap">                  
                  <a href="<?php echo e(route( 'menu.edit', [ 'id' => $item->id ])); ?>" class="btn btn-warning  btn-sm">Chỉnh sửa</a>                 
                  
                  <a onclick="return callDelete('<?php echo e($item->title); ?>','<?php echo e(route( 'menu.destroy', [ 'id' => $item->id ])); ?>');" class="btn btn-danger btn-sm">Xóa</a>                
                  
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>