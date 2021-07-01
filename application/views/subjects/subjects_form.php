


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Subjects <small>-Detail list of Subjects</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Subjects
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
                <h4>Subjects</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Created At</label>
         
			<input type="text" class="form-control " name="created_at" id="created_at" placeholder="Created At" value="<?php echo $created_at; ?>" />
			<?php echo form_error('created_at') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Subject Name</label>
         
			<input type="text" class="form-control " name="subject_name" id="subject_name" placeholder="Subject Name" value="<?php echo $subject_name; ?>" />
			<?php echo form_error('subject_name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="timestamp">Updated At</label>
         
			<input type="text" class="form-control " name="updated_at" id="updated_at" placeholder="Updated At" value="<?php echo $updated_at; ?>" />
			<?php echo form_error('updated_at') ?>
		
		</div> <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('subjects/'); ?>';">Cancel</button>

                              
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
	        created_at: {
							required: true
							},
	        subject_name: {
							required: true
							},
	        updated_at: {
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