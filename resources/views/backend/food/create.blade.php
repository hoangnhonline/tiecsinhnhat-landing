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
      <li><a href="{{ route('food.index') }}">Món ăn</a></li>
      <li class="active">Tạo mới</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="{{ route('food.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('food.store') }}">
    <div class="row">
      <!-- left column -->

      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tạo mới</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}

            <div class="box-body">
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif                
                <div class="form-group">
                    <label>Loại món ăn <span class="red-star">*</span></label>
                    <select name="food_type_id" id="food_type_id" class="form-control">
                        <option value="">--chọn--</option>
                        @if( $foodTypeList->count() > 0)
                          @foreach( $foodTypeList as $foodType )
                              <option value="{{ $foodType->id }}" {{ old('food_type_id', $food_type_id) == $foodType->id ? "selected" : "" }}>{{ $foodType->name }}</option>
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
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>               
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Tên món</label>
                  <input type="text" class="form-control" name="food[]" value="">
                </div>
                <div class="form-group col-md-6">                  
                  <label>Giá</label>
                  <input type="text" class="form-control" name="price[]" value="">
                </div>   
            </div>              
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('food.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>
    
      <!--/.col (left) -->      
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@stop
@section('javascript_page')
<script type="text/javascript">
  $(document).ready(function(){
    $('#food_type_id').change(function(){
      location.href='{{ route('food.create')}}?food_type_id=' + $(this).val();
    });
  });
</script>
@stop