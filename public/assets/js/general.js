$(document).on('keypress', '#txtSearch',  function (e) {
	var obj = $(this);	
    if (e.which == 13) {    	
        if($.trim(obj.val()) == ''){        	
        	return false;
        }
    }    
 });
$(document).on('keypress', '#txtNewsletter', function(e){
	if(e.keyCode==13){
	    $('#btnNewsletter').click();
	}
});
$('#btnNewsletter').click(function() {
    var email = $.trim($('#txtNewsletter').val());        
    if(validateEmail(email)) {
        $.ajax({
          url: $('#route-newsletter').val(),
          method: "POST",
          data : {
            email: email,
          },
          success : function(data){
            if(+data){
              swal('', 'Đăng ký nhận bản tin thành công.', 'success');
            }
            else {
              swal('', 'Địa chỉ email đã được đăng ký trước đó.', 'error');
            }
            $('#txtNewsletter').val("");
          }
        });
    } else {
        swal({ title: '', text: 'Vui lòng nhập địa chỉ email hợp lệ.', type: 'error' });
    }
});
function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}