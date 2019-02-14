$(document).on('click', '.noselect', function(){
  var currentHTML = $(this).html();
  var name = $(this).data('name');
  var food_id = $(this).data('id');
  var price = $(this).data('value');
  $('input[data-id='+food_id+']').hide();
      $(this).show();
      //$(this).parents('td').find('.food_checkbox').prop('checked', 'checked');
      $(this).removeClass('btn-info noselect').addClass('btn-danger selected').html('<i class="fa fa-check-circle"></i>' + ' ' + currentHTML);
      $(this).parents('tr').addClass('seleted');
        var str = '<tr data-value="' + food_id + '" class="food">';
      str+='<td style="text-align: center"><span class="order"></span></td>';
      str+='<td style="vertical-align: center">'+ name +'</td>';
      str+='<td style="white-space: nowrap;color:#ca0808;text-align:right">' + addCommas(price);
      str+='<input type="hidden" class="fprice" value="'+price+'">';
      str+='<input type="hidden" class="fprice" name="food_id[]" value="' + food_id + '">';
      str+='</td><td>';
      str+='<button data-value="'+ food_id +'" class="remove btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td></tr>';

    if($('tr.food').length == 0){
      $("tr.header-table").after(str);              

    }else{
      $("tr.food:last").after(str);
    }
    
    setOrder();
    calTotalPrice();
    calTotalFood();
      setFoodId();
  });
$('#btnDatMon').click(function(){
if($.trim($('#phone').val()) == '' || $.trim($('#table_no').val()) == ''){
  alert('Vui lòng nhập đầy đủ thông tin.');
}else{
  $(this).html('<i class="fa fa-spin fa-spinner"></i>').attr('disabled', 'disabled');
  $('#formDatMon').submit();
}
});
$(document).on('click', '.selected', function(){
  if(confirm('Quý khách chắc chắn xóa món này?')){
   var name = $(this).data('name');
  var food_id = $(this).data('id');
  var price = $(this).data('value');
  
    $(this).removeClass('btn-danger selected').addClass('btn-default noselect').html(addCommas(price));
    $(this).parents('tr').removeClass('seleted');
    $('tr.food[data-value='+food_id+']').remove();
    $('input[data-id='+food_id+']').show();
    setOrder();
    calTotalPrice();
    calTotalFood();
    setFoodId();

}
  });
$(document).ready(function(){
  $(document).on('click', 'button.remove', function(){
    var obj = $(this);
    var food_id = obj.data('value');
    var price = obj.parents('tr').find('.fprice').val();
    if(confirm('Quý khách chắc chắn xóa món này?')){
      obj.parents('tr.food').remove();
      var buttonSelect = $('input.selected[data-id='+food_id+']');
      buttonSelect.removeClass('selected btn-danger').addClass('btn-default noselect').removeAttr('checked');
      buttonSelect.parents('tr').removeClass('seleted');
      setOrder();
      calTotalPrice();
      calTotalFood();
      setFoodId();
    }
  });
});
function setOrder(){
  var i = 0;
  $('tr.food').each(function(){
    i++;
    $(this).find('.order').html(i);
  });
}
function setFoodId(){
  var strId = '';
  $('tr.food').each(function(){
    strId = strId + $(this).data('value') + ',';
  });
  $('#str_food_id').val(strId);
}
function calTotalFood(){
  $('.count-item-food, .total-item').html($('tr.food').length);
  if($('tr.food').length > 0){
    $('#nocontent').hide();
    $('#loadModalDat').show();
  }else{
    $('#nocontent').show();
    $('#loadModalDat').hide();
  }
}
function calTotalPrice(){   
  var total = 0;
  $('tr.food').each(function(){
    
    total += parseInt($(this).find('.fprice').val());

  });
  $('#total-price').html(addCommas(total));

}
function addCommas(nStr) {
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
  x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
  }