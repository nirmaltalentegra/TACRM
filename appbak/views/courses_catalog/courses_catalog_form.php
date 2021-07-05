


<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Courses_catalog <small>-Detail list of Courses_catalog</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Courses_catalog
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
                <h4>Courses_catalog</h4>
              </div>
              <div class="card-body">
	    <div class=" form-group">
			 <label class="control-label " for="int">Category Id</label>
         
			<input type="text" class="form-control " name="category_id" id="category_id" placeholder="Category Id" value="<?php echo $category_id; ?>" />
			<?php echo form_error('category_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Course Code</label>
         
			<input type="text" class="form-control " name="course_code" id="course_code" placeholder="Course Code" value="<?php echo $course_code; ?>" />
			<?php echo form_error('course_code') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Course Name</label>
         
			<input type="text" class="form-control " name="course_name" id="course_name" placeholder="Course Name" value="<?php echo $course_name; ?>" />
			<?php echo form_error('course_name') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="course_summary">Course Summary</label>
					
					<textarea class="form-control " rows="3" name="course_summary" id="course_summary" placeholder="Course Summary"><?php echo $course_summary; ?></textarea>
					<?php echo form_error('course_summary') ?>
				
				</div>
	    <div class=" form-group"> 
					<label class="control-label " for="course_contents">Course Contents</label>
					
					<textarea class="form-control " rows="3" name="course_contents" id="course_contents" placeholder="Course Contents"><?php echo $course_contents; ?></textarea>
					<?php echo form_error('course_contents') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Course Duration</label>
         
			<input type="text" class="form-control " name="course_duration" id="course_duration" placeholder="Course Duration" value="<?php echo $course_duration; ?>" />
			<?php echo form_error('course_duration') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Course Fee Type</label>
         
			<input type="text" class="form-control " name="course_fee_type" id="course_fee_type" placeholder="Course Fee Type" value="<?php echo $course_fee_type; ?>" />
			<?php echo form_error('course_fee_type') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="notes">Notes</label>
					
					<textarea class="form-control " rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
					<?php echo form_error('notes') ?>
				
				</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Active</label>
         
			<input type="text" class="form-control " name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
			<?php echo form_error('active') ?>
		
		</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('courses_catalog/'); ?>';">Cancel</button>

                              
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
	        category_id: {
							required: true
							},
	        course_code: {
							required: true
							},
	        course_name: {
							required: true
							},
	        course_summary: {
							required: true
							},
	        course_contents: {
							required: true
							},
	        course_duration: {
							required: true
							},
	        course_fee_type: {
							required: true
							},
	        notes: {
							required: true
							},
	        active: {
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