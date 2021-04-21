	
<form id="frm_profile" name="frm_profile" class="form-horizontal form-label-left" enctype="multipart/form-data" action="<?php echo base_url('profile/update_tab_1'); ?>" method="post">
   
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">First Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $first_name; ?>" />
                    <?php echo form_error('first_name') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Last Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $last_name; ?>" />
                    <?php echo form_error('last_name') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Email Address</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" autocomplete="off" name="email_id" id="email_id" data-existing_email="<?php echo $email_id; ?>" placeholder="Email Address" value="<?php echo $email_id; ?>" />
                    <?php echo form_error('email_id') ?>
                </div>
                <span class="text-danger" id="email_error"></span>
            </div>
            
        </div> 
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
                    <?php echo form_error('mobile') ?>
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

<script type="text/javascript">
$( document ).ready(function() {  
        
        $('#email_id').blur(function() {
            var email_val = $("#email_id").val();
            var existing_email = $("#email_id").data('existing_email');

            var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
            if (filter.test(email_val)) {
                // show loader
                $('#loading').show();
                $.post("<?php echo site_url() ?>/staff/email_check", {
                    email: email_val, existing_email: existing_email
                }, function(response) {
                    //alert(response.message);
                    $('#email_error').html(response.message);
                });
                return false;
            }
        });

        var form1 = $('#frm_profile');        
       validator1= form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                
                first_name: {
							required: true
							},
	        last_name: {
							required: true
							},
                mobile: {
							required: true,digits:true,
							},
                email_id: {
							required: true,email:true,
							}
	        },
            messages: {
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
                    form.submit();
              
            }
        });
});
</script>