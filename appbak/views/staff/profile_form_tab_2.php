<form id="frm_pwd" name="frm_pwd" class="form-horizontal form-label-left" data-parsley-validate="" action="#" method="post"> 
    <div class="alert hide" id="msg-pass"> </div>
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            
			<div class="form-group floating-addon">
                        <label>New Password</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                          <input type="password" class="form-control col-md-7 col-xs-12" name="new_password" id="new_password" placeholder="New Password" value="" />      
                        </div>
                      </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="form-group floating-addon">
                        <label>Confirm New Password</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                           <input type="password" class="form-control col-md-7 col-xs-12" name="confirm_password" id="confirm_password" placeholder="Confirm New Password" value="" />  
                        </div>
                      </div>  
        </div>        
    </div>
<h3 class="page-header">&nbsp;</h3>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <div class="control-label col-md-3 col-sm-3 col-xs-12" ><button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Update</button></div>            
        </div>
    </div>    
</div>    
</form>
<!-- General JS Scripts -->
<style>
.error {
	width: 100%;
	margin-top: .25rem;
	font-size: 80%;
	color: #dc3545;
}
</style>
<script type="text/javascript">
$( document ).ready(function() {
        $('#frm_pwd').submit(function(){
            event.preventDefault();
        });
        var form2 = $('#frm_pwd');        
        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {    
				new_password: {
					required: true,
					minlength: 5,
					maxlength: 13
				},
				confirm_password: {
					required: true,
					equalTo: "#new_password"
				},
	        },
            messages: {
				new_password: "Please enter New Password",
				confirm_password: "Please enter the same password as New Password",
	        },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                        error.insertAfter("#form_gender_error");
                    } 
                    else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    }
                    else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
            },
            unhighlight: function(element) { // revert the change done by hightlight
                $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group

            },
            success: function(label) {
                label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },
            submitHandler: function(form) {
                    var form        =   $('#frm_pwd')[0];
                    var formData    =   new FormData(form);                   
                    
                    $.ajax({
                                url: "<?php echo site_url() ?>/staff/reset_password",
                                type: 'POST',
                                data: formData,
                                async: false,
                                success: function (data) {
                                    $('#msg-pass').removeClass('hide');
                                    $('#msg-pass').addClass('alert-success');
                                    $('#msg-pass').html('Password changed successfully');
                                    $('#frm_pwd')[0].reset();
                                    //$('#setPass').modal('hide');
                                    setTimeout(function(){  $('#msg-pass').addClass('hide');
                                    $('#msg-pass').removeClass('alert-success');
                                    $('#msg-pass').html(''); }, 3000);                                                                   
                                },
                                cache: false,
                                contentType: false,
                                processData: false  
                            });              
            }
        });
});
</script>