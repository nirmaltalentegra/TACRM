
<style>
    .nav-tabs-custom {
    margin-bottom: 20px;
    background: #eaebf1;
    box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    border-radius: 3px;
}
</style>
<!-- =============================================== -->
<script src="<?php echo base_url(); ?>themes/adminlte/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>themes/adminlte/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Leads
        <small>Leads List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('leads'); ?>">Leads</a></li>
        <li class="active">Leads List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">        
            <div class="box-body">
<div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#fa-icons" data-toggle="tab" aria-expanded="true">Leads</a></li>
                <li class=""><a href="#glyphicons" data-toggle="tab" aria-expanded="false">Activities</a></li>
                <li class=""><a href="#attachments" data-toggle="tab" aria-expanded="false">Attachments</a></li>
                <li class=""><a href="#email_logs" data-toggle="tab" aria-expanded="false">Email Logs</a></li>
                <li class=""><a href="#sms_logs" data-toggle="tab" aria-expanded="false">SMS Logs</a></li>
                <li class=""><a href="#history" data-toggle="tab" aria-expanded="false">History</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane active" id="fa-icons">                
                  <h4 class="page-header">Lead Info</h4>
                  <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Source</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="source_id" id="source_id" class="form-control">
                    <option value="">Select Source</option>
                    <?php
                    foreach ($source_data as $source) {
                        $source_selected = "";
                        if ($source_id == $source->source_id) {
                            $source_selected = "selected";
                        }


                        echo '<option value="' . $source->source_id . '"' . $source_selected . ' >' . $source->source_details . "</option>";
                    }
                    ?>
                    </select>
                    <?php echo form_error('source_id') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Assigned To</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="staff_id" id="staff_id" class="form-control">
                    <option value="">Select Staff</option>
                    <?php
                    foreach ($staff_data as $staff) {
                        $staff_selected = "";
                        if ($staff_id == $staff['staff_id']) {
                            $staff_selected = "selected";
                        }
                        echo '<option value="' . $staff['staff_id'] . '"' . $staff_selected . '>' . $staff['staff_name'] . "</option>";
                    }
                    ?>
                    </select>
                    <?php echo form_error('staff_id') ?>
                    </div>
            </div>
        </div>
    </div>  
    <h4 class="page-header">Contact Info</h4>
    <input type="hidden" class="form-control col-md-7 col-xs-12" name="hdn_cust_id" id="hdn_cust_id"  value="" />
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden"  name="usr_mobile" id="usr_mobile"  value="" />
                    <input type="text" class="form-control col-md-7 col-xs-12" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
                    <?php echo form_error('mobile') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="hidden"  name="usr_email" id="usr_email"  value="" />
                    <input type="text" class="form-control col-md-7 col-xs-12" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
			<?php echo form_error('email') ?>
                </div>
            </div>
        </div>
    </div>  
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Customer Type</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="cust_type" id="cust_type" class="form-control">
                    <option value="">Select Type</option>
                    <?php
                    
                    foreach ($cust_types as $ctypes) {
                        $ct_selected = "";
                        if ($cust_type == $ctypes->id) {
                            $ct_selected = "selected";
                        }
                        echo '<option value="' . $ctypes->id . '"' . $ct_selected . '>' . $ctypes->name . "</option>";
                    }
                    ?>
                    </select>                   
                    <?php echo form_error('cust_type') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group hide" id="div_comp_name">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Name</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="comp_name" id="comp_name" placeholder="Company Name" value="" />
                    <?php echo form_error('comp_name') ?>
                    </div>
            </div>
        </div>
    </div>
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Alt Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="alt_mobile" id="alt_mobile" placeholder="Alt Mobile" value="<?php echo $alt_mobile; ?>" />
                    <?php echo form_error('alt_mobile') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Address Line 1</label>
                <div class="col-md-6 col-sm-6 col-xs-12">                    
                    <input type="text" class="form-control" id="address_1" name="address_1" value="<?php echo $address_1; ?>" />
                    <?php echo form_error('address_1') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">City</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">Select City</option>
                        <?php
                        foreach ($city_data as $city) {
                            $city_selected = "";
                            if ($city_id == $city['city_id']) {
                                $city_selected = "selected";
                            }
                            echo '<option value="' . $city['city_id'] . '"' . $city_selected . '>' . $city['city_name'] . "</option>";
                        }
                        ?>
                    </select>
                    <?php echo form_error('city_id') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Address Line 2</label>
                <div class="col-md-6 col-sm-6 col-xs-12">                    
                    <input type="text" class="form-control" id="address_2" name="address_2" value="<?php echo $address_2; ?>" />
                    <?php echo form_error('address_2') ?>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Zipcode</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="zipcode" id="zipcode" placeholder="Zipcode" value="<?php echo $zipcode; ?>" />
                    <?php echo form_error('zipcode') ?>
                </div>
            </div>
        </div>
    </div>
    <h4 class="page-header">Vendor</h4>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group" id="div_vendor_name">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Existing Vendor Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="vendor_name" id="vendor_name" placeholder="Existing Vendor Name" value="<?php echo $vendor_name; ?>" />
                    <?php echo form_error('vendor_name') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group" id="div_software_vendor">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Existing Software Vendor </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="software_vendor" id="software_vendor" placeholder="Existing Software Vendor" value="<?php echo $software_vendor; ?>" />
			<?php echo form_error('software_vendor') ?>
                </div>
            </div>
        </div>
    </div>
    <h4 class="page-header">Other Info</h4>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group hide" id="div_ref_name">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Reference Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="ref_name" id="ref_name" placeholder="Ref Name" value="<?php echo $ref_name; ?>" />
                    <?php echo form_error('ref_name') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group hide" id="div_ref_mobile">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Reference Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="ref_mobile" id="ref_mobile" placeholder="Ref Mobile" value="<?php echo $ref_mobile; ?>" />
			<?php echo form_error('ref_mobile') ?>
                </div>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Status</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="status" id="status" class="form-control">
                    <option value="">Select Status</option>
                    <?php
                    foreach ($status_data as $stat) {
                        $status_selected = "";
                        if ($status == $stat['status_id']) {
                            $status_selected = "selected";
                        }
                        echo '<option value="' . $stat['status_id'] . '"' . $status_selected . '>' . $stat['status'] . "</option>";
                    }
                    ?>
                    </select>                   
                    <?php echo form_error('status') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 hide" id="div_lost_reason">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Lost Reason</label>
                <div class="col-md-6 col-sm-6 col-xs-12" >
                    <select name="lost_reason" id="lost_reason" class="form-control">
                    <option value="">Select Reason</option>
                    <?php
                    foreach ($lost_status as $stat) {
                        $status_selected = "";
                        if ($lost_reason == $stat['status_id']) {
                            $status_selected = "selected";
                        }
                        echo '<option value="' . $stat['status_id'] . '"' . $status_selected . '>' . $stat['status'] . "</option>";
                    }
                    ?>
                    </select>                   
                    <?php echo form_error('lost_reason') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 hide" id="div_lost_remark">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Lost Remark</label>
                <div class="col-md-6 col-sm-6 col-xs-12">                      
                    <textarea class="form-control col-md-7 col-xs-12" rows="3" name="lost_remark" id="lost_remark" placeholder=""><?php echo $lost_remark; ?></textarea>
                    <?php echo form_error('lost_remark') ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" id="div_enquiry_type">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Enquiry Type</label>
                <div class="col-md-6 col-sm-6 col-xs-12" >
                    <select name="enquiry_type" id="enquiry_type" class="form-control">
                    <option value="">Select Type</option>
                    <?php
                    foreach ($enquiry_status as $stat) {
                        $status_selected = "";
                        if ($enquiry_type == $stat['status_id']) {
                            $status_selected = "selected";
                        }
                        echo '<option value="' . $stat['status_id'] . '"' . $status_selected . '>' . $stat['status'] . "</option>";
                    }
                    ?>
                    </select>                   
                    <?php echo form_error('enquiry_type') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 hide" id="div_enquiry_note">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Enquiry Remarks</label>
                <div class="col-md-6 col-sm-6 col-xs-12">                      
                    <textarea class="form-control col-md-7 col-xs-12" rows="3" name="enquiry_note" id="enquiry_note" placeholder=""><?php echo $enquiry_note; ?></textarea>
                    <?php echo form_error('enquiry_note') ?>
                </div>
            </div>
        </div>
    </div>
    <h4 class="page-header">Comments</h4>
	    <div class=" form-group">                 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <textarea class="form-control col-md-7 col-xs-12" rows="3" name="comments" id="comments" placeholder="Comments"><?php echo $comments; ?></textarea>
                    <?php echo form_error('comments') ?>
                </div>
            </div> 
            <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-success" type="submit">Submit</button>  
                        <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('leads/'); ?>';">Cancel</button>

                    </div>
                </div>
            </form>
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane" id="glyphicons">

              </div>
              <!-- /#ion-icons -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
                </div></div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	 


<script type="text/javascript">
$( document ).ready(function() {
    
    $("#mobile").keydown(function() {	
        $("#usr_mobile").val('');
        /*
        $("#first_name").val('');
        $("#last_name").val('');
        $("#email").val('');
        $("#zipcode").val('');
        $("#cust_type").val('');
        $("#city_id").val('');
        $("#comp_name").val('');
        $("#address_1").val('');
        $("#address_2").val('');
        $("#hdn_cust_id").val('');
        show_hide_comp();*/
    });    
    
    var mobile_list = new Bloodhound({
        datumTokenizer: function(e) {
            return e.tokens
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: BASE_URL + "leads/get_existing_user_mobile?query=%QUERY",
            wildcard: "%QUERY"
        }
    });
    
    mobile_list.initialize(); 
    
    $("#mobile").typeahead(null, {
        name: "mobileno",
        displayKey: "value",
        source: mobile_list.ttAdapter(),
        hint: !0,
        templates: {
            suggestion: Handlebars.compile(['<div class="media">', '<div class="media-body">', '<h4 class="media-heading">{{value}}</h4>', "<p>{{desc}}</p>", "</div>", "</div>"].join(""))
        }
    }).on("typeahead:selected", function(e, t) {
        console.log(t)
        $("#usr_mobile").val(t.user_mobile_id); 
        /*
        $("#first_name").val(t.first_name);
        $("#last_name").val(t.last_name);
        $("#email").val(t.email);
        $("#zipcode").val(t.zipcode);
        $("#cust_type").val(t.cust_type);
        $("#city_id").val(t.city);
        $("#address_1").val(t.address_1);
        $("#address_2").val(t.address_2);
        $("#comp_name").val(t.cust_name);
        $("#hdn_cust_id").val(t.cust_id);*/
        //show_hide_comp()
    });
    
    $("#email").keydown(function() {	
        $("#usr_email").val('');       
    });    
    var mail_list = new Bloodhound({
        datumTokenizer: function(e) {
            return e.tokens
        },
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: BASE_URL + "leads/get_existing_user_email?query=%QUERY",
            wildcard: "%QUERY"
        }
    });
    
    mail_list.initialize(); 
    
    $("#email").typeahead(null, {
        name: "emailadd",
        displayKey: "value",
        source: mail_list.ttAdapter(),
        hint: !0,
        templates: {
            suggestion: Handlebars.compile(['<div class="media">', '<div class="media-body">', '<h4 class="media-heading">{{value}}</h4>', "<p>{{desc}}</p>", "</div>", "</div>"].join(""))
        }
    }).on("typeahead:selected", function(e, t) {
        console.log(t)     
        $("#usr_email").val(t.user_mail_id);    
    });
    
    
    
    
    $("#cust_type").change(function(){
        show_hide_comp();
    });
    
    $("#status").change(function(){
        show_hide_lost();
    });
    
    $("#enquiry_type").change(function(){
        show_hide_note();
    });
    
    $("#source_id").change(function(){
        var source_id = $("#source_id").val();
        if(source_id == '14'){
            $("#div_ref_name").removeClass('hide');
            $("#div_ref_mobile").removeClass('hide');
            $("#ref_name").rules( "add", {
                required: true
            });
            $("#ref_mobile").rules( "add", {
                required: true
            });
        }
        else
        {
            $("#div_ref_name").addClass('hide');
            $("#div_ref_mobile").addClass('hide');
            $("#ref_name").rules( "remove" );
            $("#ref_mobile").rules( "remove" );
        }
    });    
    
});

function show_hide_comp()
{
    var custtype = $("#cust_type").val();
    if(custtype != '6' && custtype != ''){
        $("#div_comp_name").removeClass('hide');
        $("#comp_name").rules( "add", {
            required: true
        });
    }
    else
    {
        $("#div_comp_name").addClass('hide');
        $("#comp_name").rules( "remove" );
    }
}

function show_hide_lost()
{
    var status = $("#status").val();
    if(status == '6'){
        $("#div_lost_reason").removeClass('hide');
        $("#div_lost_remark").removeClass('hide');
        $("#lost_reason").rules( "add", {
            required: true
        });
        $("#lost_remark").rules( "add", {
            required: true
        });
    }
    else
    {
        $("#div_lost_reason").addClass('hide');
        $("#div_lost_remark").addClass('hide');        
        $("#lost_reason").rules( "remove" );
        $("#lost_remark").rules( "remove" );
    }
}

function show_hide_note()
{
    var enquiry_type = $("#enquiry_type").val();
    if(enquiry_type == ''){        
        $("#div_enquiry_note").addClass('hide');            
        $("#enquiry_note").rules( "remove" );        
    }
    else
    {
        $("#div_enquiry_note").removeClass('hide');        
        $("#enquiry_note").rules( "add", {
            required: true
        });       
    }
}

var form2 = $('#frm_create');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                
                source_id: {
							required: true
							},
	        cust_type: {
							required: true
							},
	        staff_id: {
							required: true
							},
	        first_name: {
							required: true
							},
	        middle_name: {
							required: false
							},
	        last_name: {
							required: true
							},
	        email: {
							email: true
							},
	        mobile: {
							required: true
							},
	        alt_mobile: {
							required: false
							},	        
	        comments: {
							required: true
							},
	        branch_id: {
							required: true
							},
	        city_id: {
							required: true
							},
	        country_id: {
							required: true
							},
                address_1: {
							required: false
							},
	        active: {
							required: true
							},
	        status: {
							required: true
							},
                enquiry_type: {
							required: true
							},
	        },
			messages: {
	        },highlight: function(element) { // hightlight error inputs
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
                    form.submit();
              
            }
        });
</script>
