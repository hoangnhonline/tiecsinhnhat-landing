@extends('backend.layout')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Liên hệ đặt món
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'dat-mon.index' ) }}">Liên hệ đặt món</a></li>
    <li class="active">Danh sách</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('message'))
      <p class="alert alert-info" >{{ Session::get('message') }}</p>
      @endif
     
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <span class="value">{{ $items->total() }} liên hệ )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
           {{ $items->links() }}
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
            @if( $items->count() > 0 )
              <?php $i = 0; ?>
              @foreach( $items as $item )
                <?php $i ++; ?>
              <tr id="row-{{ $item->id }}">
                <td><span class="order">{{ $i }}</span></td>      
                     
                <td>                  
                  {{ $item->phone }}
                </td>
                <td width="150" class="text-right" style="font-weight:bold">
                  {{ $item->table_no }}
                </td>
                
                <td>
                	<?php 
			            $food_id_list = rtrim($item->food_id_list, ',');
			            $foodIdArr = explode(',', $food_id_list);
			            $foodList = \DB::table('food')->whereIn('id', $foodIdArr)->get();
			            $i = 0;
			          ?>
			          <ul>

			            @foreach($foodList as $food)
			            <?php $i++; ?>
			            <li style="list-style: none;">{{ $i }}. {{ $food->name }}</li>
			            @endforeach
			          </ul>
                </td>
                <td style="text-align: right">
                	{{ date('d/m/Y H:i', strtotime($item->created_at)) }}
                </td>
                <td style="white-space:nowrap">                  
                  
                  <a onclick="return callDelete('{{ $item->phone }}','{{ route( 'dat-mon.destroy', [ 'id' => $item->id ]) }}');" class="btn btn-danger  btn-sm">Xóa</a>
                  
                </td>
              </tr> 
              @endforeach
            @else
            <tr>
              <td colspan="3">Không có dữ liệu.</td>
            </tr>
            @endif

          </tbody>
          </table>
          <div style="text-align: center">
            {{ $items->links() }}
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
@stop
@section('javascript_page')
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
@stop