@extends('backend.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
    Menu
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ route('menu.index') }}">Menu</a></li>
      <li class="active">Chỉnh sửa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <a class="btn btn-default" href="{{ route('menu.index') }}" style="margin-bottom:5px">Quay lại</a>
    <form role="form" method="POST" action="{{ route('menu.update') }}">
    <div class="row">
      <!-- left column -->
      <input name="id" value="{{ $detail->id }}" type="hidden">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Chỉnh sửa</h3>
          </div>
          <!-- /.box-header -->               
            {!! csrf_field() !!}

            <div class="box-body">
              @if(Session::has('message'))
              <p class="alert alert-info" >{{ Session::get('message') }}</p>
              @endif
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif                
                                           
                
                <div class="form-group" >
                  
                  <label>Tên menu<span class="red-star">*</span></label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ $detail->name }}">
                </div>
                <div class="form-group" >                  
                  <label>Giá<span class="red-star">*</span></label>
                  <input type="text" class="form-control" readonly="readonly" name="price" id="price" value="{{ $totalPrice }}">
                </div>  
                <div class="form-group" style="margin-top:10px;margin-bottom:10px">  
                  <label class="col-md-3 row">Thumbnail ( 624x468 px)</label>    
                  <div class="col-md-9">
                    <img id="thumbnail_image" src="{{ $detail->image_url ? Helper::showImage($detail->image_url ) : URL::asset('admin/dist/img/img.png') }}" class="img-thumbnail" width="145" height="85">
                 
                    <button class="btn btn-default btn-sm btnSingleUpload" data-set="image_url" data-image="thumbnail_image" type="button"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span> Upload</button>
                  </div>
                  <input type="hidden" name="image_url" id="image_url" value="{{ $detail->image_url }}"/>
                  <div style="clear:both"></div>
                </div>   
                <div>
                  <div class="table-responsive">                    
                        @foreach($foodTypeList as $foodType)
                        <div class="col-md-12">
                          <p class="food-type">{!! $foodType->name !!}</p>
                         
                            @if($foodType->foodGroup->count() > 0)
                              @foreach($foodType->foodGroup as $group)
                              <div class="col-md-3 mon_chinh">
                                <p class="food-group">{!! $group->name !!}</p>           
                                <table class="table-food table table-bordered">
                                  @foreach($group->food as $food)
                                  <tr>
                                    <td class="name_food"><p>{!! $food->name !!}</p></td>           
                                    <td class="price_food"><p>{!! number_format($food->price) !!}</p></td>
                                    <td  class="choose"><input type="checkbox" name="food_id[]" class="food_checkbox" value="{{ $food->id}}" {{ in_array($food->id, $foodIdArr) ? "checked=checked" : ""}}>
                                    @if(!in_array($food->id, $foodIdArr))
                                    <button type="button" class="btn btn-info noselect" data-value="{{ $food->price }}">Chọn</button>          
                                    @else
                                    <button type="button" class="btn btn-danger selected" data-value="{{ $food->price }}">Bỏ chọn</button>          
                                    @endif                                     
                                    </td>
                                  </tr>
                                  @endforeach
                                </table>
                              </div>                                
                              @endforeach
                            @else
                              <table class="table-food table table-bordered">
                              @foreach($foodType->food as $food)
                              <tr>
                                <td class="name_food"><p>{!! $food->name !!}</p></td>           
                                <td class="price_food"><p>{!! number_format($food->price) !!}</p></td>
                                <td class="choose"><input type="checkbox" class="food_checkbox" name="food_id[]" value="{{ $food->id}}" {{ in_array($food->id, $foodIdArr) ? "checked=checked" : ""}} >
                                  @if(!in_array($food->id, $foodIdArr))
                                    <button type="button" class="btn btn-info noselect" data-value="{{ $food->price }}">Chọn</button>          
                                    @else
                                    <button type="button" class="btn btn-danger selected" data-value="{{ $food->price }}">Bỏ chọn</button>          
                                    @endif                          
                                  </td>
                              </tr>
                              @endforeach
                              </table>
                              @endif
                      
                        </div>
                        @endforeach                       
                    
                  </div>
                </div>          
            </div>                      
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Lưu</button>
              <a class="btn btn-default" class="btn btn-primary" href="{{ route('menu.index')}}">Hủy</a>
            </div>
            
        </div>
        <!-- /.box -->     

      </div>         
    </div>
    </form>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div><style type="text/css">
  .food-type{
        
        font-size: 18px;
        text-align: center;
        padding: 10px;
        font-weight: bold;
        margin-top: 20px;
         background-color: red;
    color:#FFF;
  }
  .food-group{
        color: blue;
        font-size: 15px;
        text-align: center;
        padding: 10px;
        font-weight: bold;
  }
  tr:hover{
    background-color: #f5f5f5;
  }
  .mon_chinh {
    height: 600px;
    overflow-y: scroll;
    margin-bottom: 15px;

  }
  .food_checkbox{
    display: none;
  }
  td.choose{
    width: 1%;
  }
</style>
@stop
@section('javascript_page')
<script type="text/javascript">
 
  $(document).on('click', '.noselect', function(){
      $(this).parents('td').find('.food_checkbox').prop('checked', 'checked');
      $(this).removeClass('btn-info noselect').addClass('btn-danger selected').html('Bỏ chọn');
      
      var price = $('#price').val() == '' ? 0 :parseInt($('#price').val()); 
      price = price + parseInt($(this).data('value'));
      $('#price').val(price);
    });
  $(document).on('click', '.selected', function(){
      $(this).parents('td').find('.food_checkbox').removeAttr('checked');
      $(this).removeClass('btn-danger selected').addClass('btn-info noselect').html('Chọn');

      var price = $('#price').val() == '' ? 0 :parseInt($('#price').val()); 
      price = price - parseInt($(this).data('value'));
      $('#price').val(price);      
    });
</script>
@stop