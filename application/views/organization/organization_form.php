


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Organization <small>-Detail list of Organization</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Organization
        </div>
      </div>
    </div>
	 <?php 
	$user_data = get_user_details($this->session->userdata('id')); 

?>  
 

     <div class="section-body">
	  <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
              <div class="card-header">
                <h4>Organization</h4>
              </div>
              <div class="card-body">
	
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Domain</label>
         
			<input type="text" class="form-control " name="domain" id="domain" placeholder="Domain" value="<?php echo $domain; ?>" />
			<?php echo form_error('domain') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="extra">Extra</label>
					
					<textarea class="form-control " rows="3" name="extra" id="extra" placeholder="Extra"><?php echo $extra; ?></textarea>
					<?php echo form_error('extra') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Manager</label>
         
			<input type="text" class="form-control " name="manager" id="manager" placeholder="Manager" value="<?php echo $manager; ?>" />
			<?php echo form_error('manager') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Name</label>
         
			<input type="text" class="form-control " name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
			<?php echo form_error('name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Status</label>
         
			<input type="text" class="form-control " name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
			<?php echo form_error('status') ?>
		
		</div>
	 <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('organization/'); ?>';">Cancel</button>

                              
                            </div>
			</form>

			     
     
          </div>
         </div>
      </div>
    </div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 


<!---- This is not end -->

<script type="text/javascript">

var form2 = $('#frm_create');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        domain: {
							required: true
							},
	        extra: {
							required: true
							},
	        manager: {
							required: true
							},
	        name: {
							required: true
							},
	        status: {
							required: true
							},
	        },
			messages: {
	        },highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group

                $(".tab-content").find("div.tab-pane:has(div.has-error)").each(function(index, tab) {
                    var id = $(tab).attr("id");
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
                    form.submit();
              
            }
        });
</script>