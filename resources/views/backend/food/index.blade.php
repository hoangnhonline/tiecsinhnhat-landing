@extends('backend.layout')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Món ăn
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="{{ route( 'food.index' ) }}">Món ăn</a></li>
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
      <a href="{{ route('food.create', ['food_type_id' => $food_type_id]) }}" class="btn btn-info" style="margin-bottom:5px">Tạo mới</a>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Bộ lọc</h3>
        </div>
        <div class="panel-body">
          <form class="form-inline" role="form" method="GET" action="{{ route('food.index') }}">            
            <div class="form-group">
              <label for="email">Loại món ăn </label>
              <select class="form-control" name="food_type_id" id="food_type_id">
                <option value="">--Tất cả--</option>
                @if( $foodTypeList->count() > 0)
                  @foreach( $foodTypeList as $value )
                  <option value="{{ $value->id }}" {{ $value->id == $food_type_id ? "selected" : "" }}>{{ $value->name }}</option>
                  @endforeach
                @endif
              </select>
            </div> 
            <div class="form-group">
              <label>Nhóm món ăn</label>
              <select name="food_group_id" id="food_group_id" class="form-control">
                  <option value="">--chọn--</option>
                  @if( $foodGroupList->count() > 0)
                    @foreach( $foodGroupList as $group )
                        <option value="{{ $group->id }}" {{ old('food_group_id', $food_group_id) == $group->id ? "selected" : "" }}>{{ $group->name }}</option>
                    @endforeach
                  @endif
              </select>
          </div>                    
            <button type="submit" class="btn btn-default btn-sm">Lọc</button>
          </form>         
        </div>
      </div>
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Danh sách ( <span class="value">{{ $items->total() }} món )</span></h3>
        </div>
        
        <!-- /.box-header -->
        <div class="box-body">
          <div style="text-align:center">
           {{ $items->appends(['food_type_id' => $food_type_id, 'food_group_id' => $food_group_id])->links() }}
          </div>   
          <table class="table table-bordered" id="table-list-data">
            <tr>
              <th style="width: 1%">#</th>                            
              <th>Tên món ăn</th>
              <th class="text-right">Giá</th>
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
                  <a href="{{ route( 'food.edit', [ 'id' => $item->id ]) }}">{{ $item->name }}</a>
                </td>
                <td width="150" class="text-right" style="font-weight:bold">
                  {{ $item->price > 0 ? number_format($item->price) : "Theo thời giá"}}
                </td>
                <td style="white-space:nowrap">                  
                  <a href="{{ route( 'food.edit', [ 'id' => $item->id ]) }}" class="btn btn-warning btn-sm">Chỉnh sửa</a>                                   
                  @if($item->foodMenu->count() == 0)
                  <a onclick="return callDelete('{{ $item->name }}','{{ route( 'food.destroy', [ 'id' => $item->id ]) }}');" class="btn btn-danger  btn-sm">Xóa</a>                
                  @endif
                  
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
            {{ $items->appends(['food_type_id' => $food_type_id, 'food_group_id' => $food_group_id])->links() }}
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