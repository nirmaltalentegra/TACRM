<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Staff
      <small>Detail list of Staff</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Staff</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box">
      <div class="box-body">
        <h2 style="margin-top:0px">Staff <?php echo $button ?></h2>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#account" data-toggle="tab">Account</a></li>
                <li><a href="#access" data-toggle="tab">Access</a></li>
                <li><a href="#permission" data-toggle="tab">Permission</a></li>
                <li><a href="#team" data-toggle="tab">Team</a></li>
            </ul>
    <form class="form-horizontal" action="<?php echo $action; ?>" method="post" id="frm_create">
        <input type="hidden" name="password" id="password" value="" /> 
        <input type="hidden" name="staff_id" id="staff_id" value="<?php echo $staff_id; ?>" />
        <div class="tab-content" style="padding:20px;">
        <div id="account" class="tab-pane fade in active">
            <?php $this->load->view('staff/staff_form_tab_1');?>
        </div>
        <div id="access" class="tab-pane fade">
            <?php $this->load->view('staff/staff_form_tab_2');?>
        </div>	

        <div id="permission" class="tab-pane fade">
            <?php $this->load->view('staff/staff_form_tab_3');?>
        </div>	
        <div id="team" class="tab-pane fade">
            <?php $this->load->view('staff/staff_form_tab_4');?>
        </div>
        </div>
    
    </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> <?php echo $button ?></button>&nbsp;
          <a href="<?php echo site_url('staff') ?>" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
        </div>
      </div>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="setPass" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Set Password</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="" method="post" id="frm_password">
                    <input type="hidden" id="hdn_staff_id" name="hdn_staff_id" value="" />
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"><span class="text-danger">*</span> Password: </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="upd_passwd" id="upd_passwd" placeholder="Password"  />
                            <?php echo form_error('passwd') ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"><span class="text-danger">*</span>Confirm Password: </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="confirm_upd_passwd" id="confirm_upd_passwd" placeholder="Confirm Password"  />
                            <?php echo form_error('confirm_passwd') ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info" id="set_password">Set</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
    $dept_opt = '<option value=""> --Select Department-- </option>';
    if(!empty($dept_data)){
        foreach ($dept_data as $dept) {
            $dept_opt .= '<option value="'.$dept->id.'">'.$dept->name.'</option>';
        } 
    }    
    $role_opt = '<option value=""> --Select Role-- </option>';
    if(!empty($role_data)){
        foreach ($role_data as $role) {
            $role_opt .= '<option value="'.$role->id.'">'.$role->name.'</option>';            
        } 
    }                   
?>
<script type="text/javascript">    
    var form1 = $('#frm_password');
        var error1 = $('.alert-danger', form1);
        var success1 = $('.alert-success', form1);

        form1.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                upd_passwd: {
                    required: true,
                    minlength: 5,
                    maxlength: 13
                },
                confirm_upd_passwd: {
                    required: true,
                    equalTo: "#upd_passwd"
                },
            },
            invalidHandler: function(event, validator) { //display error alert on form submit              

                var errors = validator.numberOfInvalids();
                if (errors) {
                    validator.errorList[0].element.focus();
                }
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
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
                //Check if the user id exists                
                $('#hdn_staff_id').val($("#staff_id").val());
                var form        =   $('#frm_password')[0];
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
                                    $('#frm_password')[0].reset();
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
        
        var form2 = $('#frm_create');
        var error2 = $('.alert-danger', form2);
        var success2 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true,
                },
                username: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                },
                passwd: {
                    required: true,
                    minlength: 5,
                    maxlength: 13
                },
                confirm_passwd: {
                    required: true,
                    equalTo: "#passwd"
                },
                phone: {
                    required: true,
                    digits: true
                },
                phone_ext: {
                    required: true,
                    digits: true
                },
                mobile: {
                    required: true,
                    digits: true
                },
                signature: {
                    required: true
                },
                org_id: {
                    required: true
                },
                dept_id: {
                    required: true
                },
                role_id: {
                    required: true
                },
                manager_id: {
                    required: true
                },
                designation_id: {
                    required: true
                }


            },
            invalidHandler: function(event, validator) {
                $(".tab-content").find("div.tab-pane:hidden:has(div.has-error)").each(function(index, tab) {
                    var id = $(tab).attr("id");
                    //console.log('total errors '+validator.numberOfInvalids()+' tab id '+id);
                    $('a[href="#' + id + '"]').tab('show');
                });

                $(".tab-content").find("div.tab-pane").each(function(index, tab) {
                    var id = $(tab).attr("id");
                    //console.log(' index '+index);
                    //console.log(' tab id '+$(tab).attr("id"));
                    $('a[href="#' + id + '"]').removeClass('alert-danger');

                });
            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group

                $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                    var id = $(tab).attr("id");
                    //console.log(' index '+index);
                    //console.log(' tab id '+$(tab).attr("id"));
                    $('a[href="#' + id + '"]').addClass('alert-danger');

                });

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
                //Check if the user id exists
                //alert('pwd '+$("#password").val()+' staff id '+$("#staff_id").val());
                
                form.submit();
                /*
                if ($("#password").val() == "" && $("#staff_id").val() == "") {
                    $("#pwd_error").text("Please set password");
                    $('a[href="#account"]').tab('show');
                    $('a[href="#account"]').addClass('alert-danger');
                    $('a[href="#access"]').removeClass('alert-danger');
                }
                else {
                    $("#pwd_error").text("");
                    $('a[href="#account"]').removeClass('alert-danger');
                    form.submit();
                }*/
            }
        });
        
        
    $(document).ready(function() {
        $(".nav-tabs a").click(function() {
            $(this).tab('show');
        });
        $('.nav-tabs a').on('shown.bs.tab', function() {

        });   
    });   
    
    extnd_dept  = [];
    extnd_role  = [];
    dept_opt    = '<?php echo $dept_opt; ?>';
    role_opt    = '<?php echo $role_opt; ?>';
    
    $(document).ready(function() {        
        update_dept();  
        update_role(); 
        /// make loader hidden in start
        $('#email').blur(function() {
            var email_val = $("#email").val();
            var existing_email = $("#email").data('existing_email');

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
        
        $('#username').blur(function() {
            var username_val = $("#username").val();
            var existing_username = $("#username").data('existing_username');
            $.post("<?php echo site_url() ?>/staff/username_check", {
                username: username_val, existing_username: existing_username
            }, function(response) {

                $('#username_error').html(response.message);
            });
            return false;
        }); 
        
        $("#dept_id").on('focus', function () {            
            previous = this.value;
        }).change(function() {            
            if(previous!='')
            {
                var index = extnd_dept.indexOf(parseInt(previous));            
                if (index > -1) {
                   extnd_dept.splice(index,1); 
                }  
            }                       
            var prim_dept = this.value;
            extnd_dept.push(parseInt(prim_dept)); 
            update_dept();
        });
        
        $("#role_id").on('focus', function () {            
            roleprevious = this.value;
        }).change(function() {            
            if(roleprevious!='')
            {
                var index = extnd_role.indexOf(parseInt(roleprevious));            
                if (index > -1) {
                   extnd_role.splice(index,1); 
                }  
            }                       
            var prim_role = this.value;
            extnd_role.push(parseInt(prim_role)); 
            update_role();
        }); 
        
        
    });
    
    var div_length = $('#dvDept > div').size();

        if (div_length == 1) {
            var rowNum = 0;
        }
        else {
            var rowNum = div_length - 1;
        }
    function addRow(frm) {
            var dept_name = $('#ext_dept_id option:selected').text();
            var role_name = $('#ext_role_id option:selected').text();
            
            var dept_id = $('#ext_dept_id option:selected').val();
            var role_id = $('#ext_role_id option:selected').val();           
            
            
            if(dept_id != "" && role_id != "") {
                
                var selected_dept = frm.ext_dept_id.value;
                var selected_role = frm.ext_role_id.value;
                
                extnd_dept.push(parseInt(selected_dept));
                extnd_role.push(parseInt(selected_role));
                update_dept();
                update_role();
                
                var textValues = new Array();
                
                rowNum++;
                
                var row = '<div class="col-sm-12" id="rowNum' + rowNum + '">\n\
                            <span class="text-danger">*</span><input type="hidden" name="add_data[]" value="' + frm.ext_dept_id.value + frm.ext_role_id.value+ '"><input type="hidden" name="add_dept_id[]" value="' + frm.ext_dept_id.value + '"> <input type="text" placeholder="Department Name" name="add_dept_name[]" value="' + dept_name + '" readonly="">\n\
                                <span class="text-danger">*</span><input type="hidden" name="add_role_id[]" value="' + frm.ext_role_id.value + '"><input type="text" placeholder="Role" name="add_role[]" value="' + role_name + '" readonly="">\n\
                                <input type="button" value="Remove" onclick="removeRow(' + rowNum + ',' + selected_dept + ',' + selected_role + ');"></div>';
                jQuery('#dvDept').append(row);
                /*
                $('input[name="add_data[]"]').each(function() {

                    var doesExisit = ($.inArray($(this).val(), textValues) == -1) ? false : true;
                    //console.log('val '+$(this).val()+' textValues '+textValues+' doesExisit '+doesExisit);
                    if (!doesExisit) {
                        textValues.push($(this).val());                        
                    } else {
                        jQuery('#rowNum' + rowNum).remove();
                        rowNum--;
                        alert('Data already added');                        
                    }
                });
                */
                
                frm.ext_dept_id.value = '';
                frm.ext_role_id.value = '';
            }
            else {
                alert("Please select both Department and Role");
            }    
        }
        
        function removeRow(rnum,dept,role) { 
            var index = extnd_dept.indexOf(parseInt(dept));            
            if (index > -1) {
               extnd_dept.splice(index,1); 
            }  
            var index = extnd_role.indexOf(parseInt(role));            
            if (index > -1) {
               extnd_role.splice(index,1); 
            } 
            jQuery('#rowNum' + rnum).remove();
            update_dept();
            update_role()
        }
        
        function update_dept()
        {
            $("#ext_dept_id").html(dept_opt);
            $.each(extnd_dept, function (i, item) {
                $("#ext_dept_id option[value='"+item+"']").remove();
            });            
        }
        
        function update_role()
        {
            $("#ext_role_id").html(role_opt);
            $.each(extnd_role, function (i, item) {
                $("#ext_role_id option[value='"+item+"']").remove();
            });            
        }
</script>



