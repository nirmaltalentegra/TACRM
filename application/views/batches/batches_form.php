
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Batches <small>-Detail list of Batches</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Batches 
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
                <h4>Batches</h4>
              </div>
              <div class="card-body">
	    
	    <div class=" form-group">
			 <label class="control-label " for="int">Category</label>
         
			<select class="form-control" name="category_id" id="category_id" placeholder="Category Id" >
					<option value="0">Select</option>
			  <?php foreach ($row_categories as $row)
				{ ?>
					<option value="<?php echo $row['category_id'];?>" ><?php echo $row['category_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			<!--<input type="text" class="form-control " name="category_id" id="category_id" placeholder="Category Id" value="<?php echo $category_id; ?>" />-->
			<?php echo form_error('category_id') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="int">Course</label>
			  <select class="form-control" name="course_id" id="course_id" placeholder="Course Id" >
			        <option value="0">Select</option>
			  <?php foreach ($row_courses as $row)
				{ ?>
				    <option data-category ="<?php echo $row['category_id'];  ?>" data-fee = "<?php echo $row['course_fees'];  ?>" value="<?php echo $row['course_id'];?>" ><?php echo $row['course_name']; ?></option>
				<?php 
				}
				?>
			  </select>

			<?php echo form_error('course_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Batch Title</label>
         
			<input type="text" class="form-control " name="batch_title" id="batch_title" placeholder="Batch Title" value="<?php echo $batch_title; ?>" />
			<?php echo form_error('batch_title') ?>
		
		</div>
	    <div class=" form-group"> 
					<label class="control-label " for="description">Description</label>
					
					<textarea class="form-control " rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
					<?php echo form_error('description') ?>
				
				</div>
				
	    <div class=" form-group">
			 <label class="control-label " for="int">Faculty</label>
            <select class="form-control" name="faculty_id" id="faculty_id" placeholder="Faculty Id" >
			 		<option value="0">Select</option>
			  <?php foreach ($row_faculty as $row)
				{ 
				if($row['fullname']){?>
					<option value="<?php echo $row['id'];?>" ><?php echo $row['fullname'] ?></option>
				<?php 
				}
				}
				?>
			  </select>
			<?php echo form_error('faculty_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Branch</label>
            <select class="form-control" name="branch_id" id="branch_id" placeholder="Branch Id" >
					<option value="0">Select</option>
			  <?php foreach ($row_branch as $row)
				{ ?>
					<option value="<?php echo $row['branch_id'];?>" ><?php echo $row['branch_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('branch_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch Type</label>
            <select class="form-control" name="batch_type" id="batch_type" placeholder="Batch Type" >
					<option value="0">Select</option>
			  <?php foreach ($row_batch_type as $row)
				{ ?>
					<option value="<?php echo $row['batch_type_id'];?>" ><?php echo $row['batch_type_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('batch_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch Pattern</label>
            <select class="form-control" name="batch_pattern" id="batch_pattern" placeholder="Batch Pattern" >
					<option value="0">Select</option>
			  <?php foreach ($row_batch_pattern as $row)
				{ ?>
					<option value="<?php echo $row['batch_pattern_id'];?>" ><?php echo $row['batch_pattern']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('batch_pattern') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="datetime">Start Date</label>
         
			<input type="date" class="form-control " name="start_date" id="start_date" placeholder="Start Date" value="<?php echo $start_date; ?>" />
			<?php echo form_error('start_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="datetime">End Date</label>
         
			<input type="date" class="form-control " name="end_date" id="end_date" placeholder="End Date" value="<?php echo $end_date; ?>" />
			<?php echo form_error('end_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Week Days</label>
			<select class="form-control select2" multiple name="week_days[]" id="week_days" placeholder="Batch Pattern" >
					<option value="1">Sunday</option>
					<option value="2">Monday</option>
					<option value="3">Tuesday</option>
					<option value="4">Wednesday</option>
					<option value="5">Thursday</option>
					<option value="6">Friday</option>
					<option value="7">Saturday</option>
			</select>
			<?php echo form_error('week_days') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch Capacity</label>
         
			<input type="text" class="form-control " name="batch_capacity" id="batch_capacity" placeholder="Batch Capacity" value="<?php echo $batch_capacity; ?>" />
			<?php echo form_error('batch_capacity') ?>
		
		</div>
		<div class="form-group">
			<label class="d-block">Iscorporate</label>
			<?php 
			if($iscorporate==''){
				$iscorporate = '0';
			}
			
			?>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" <?php echo ($iscorporate== '1')?'checked':''; ?> name="iscorporate" id="iscorporate" placeholder="Iscorporate" value="1">
			  <label class="form-check-label" for="inlineradio1">Yes</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" <?php echo ($iscorporate== '0')?'checked':''; ?> name="iscorporate" id="iscorporate" placeholder="Iscorporate" value="0">
			  <label class="form-check-label" for="inlineradio2">No</label>
			</div>
			
		</div>
	    <div class=" form-group">
			<label class="control-label " for="int">Currency</label>
         
			<select class="form-control" name="currency_id" id="currency_id" placeholder="Currency" value="<?php echo $currency_id; ?>" >
					<option value="">--select--</option>
					<?php
						if ($currrency_list) {
							foreach ($currrency_list as $currrency_data) {
								if($currency_id == $currrency_data->currency_id) {
									$selected = "selected";
								}
								else
								{
									$selected = "";
								}
								echo '<option value="'.$currrency_data->currency_id.'"'.$selected.'>'.$currrency_data->currency_name."</option>";  
							}
						}
						?>
					</select>
			<?php echo form_error('currency_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Batch Fee Type</label>
			 <select class="form-control" name="batch_fee_type" id="batch_fee_type" placeholder="Batch Fee Type" >
			        <option value="0">Select</option>
			  <?php foreach ($row_course_fee_type as $row)
				{ ?>
					<option value="<?php echo $row['course_fee_type_id'];?>" ><?php echo $row['course_fee_type']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('batch_fee_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="decimal">Fees</label>
         
			<input type="text" class="form-control " name="fees" id="fees" placeholder="Fees" value="<?php echo $fees; ?>" />
			<?php echo form_error('fees') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="tinyint">Course Fee Type</label>
			 <select class="form-control" name="course_fee_type" id="course_fee_type" placeholder="Course Fee Type" >
			        <option value="0">Select</option>
			  <?php foreach ($row_course_fee_type as $row)
				{ ?>
					<option value="<?php echo $row['course_fee_type_id'];?>" ><?php echo $row['course_fee_type']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('course_fee_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Course Fee</label>
         
			<input  type="text" class="form-control " name="course_fee" id="course_fee" placeholder="Course Fee" value="<?php //echo $course_fee; ?>" />
			<?php echo form_error('course_fee') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch Status</label>
				<select class="form-control" name="batch_status" id="batch_status" placeholder="Batch Status" >
			        <option value="0">Select</option>
			  <?php foreach ($row_status as $row)
				{ ?>
					<option value="<?php echo $row['status_id'];?>" ><?php echo $row['status']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('batch_status') ?>
		
		</div>
	
	 <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('batches/'); ?>';">Cancel</button>

                              
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
$(document).ready(function(){
var $category = $( '#category_id' ),
	$course = $( '#course_id' ),
    $options = $course.find( 'option' );
    
$category.on( 'change', function() {
	$course.html( $options.filter( '[data-category="' + this.value + '"]' ) );
	var fee = $("#course_id").find(':selected').data('fee');
	$("#course_fee").val(fee);
} ).trigger( 'change' );

$("#course_id").change(function(){	 	
var fee = $(this).find(':selected').data('fee');
$("#course_fee").val(fee);
});
});

/*var form2 = $('#frm_create');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        course_id: {
							required: true
							},
	        category_id: {
							required: true
							},
	        batch_title: {
							required: true
							},
	        description: {
							required: true
							},
	        faculty_id: {
							required: true
							},
	        branch_id: {
							required: true
							},
	        batch_type: {
							required: true
							},
	        batch_pattern: {
							required: true
							},
	        start_date: {
							required: true
							},
	        end_date: {
							required: true
							},
	        week_days: {
							required: true
							},
	        student_enrolled: {
							required: true
							},
	        batch_capacity: {
							required: true
							},
	        iscorporate: {
							required: true
							},
	        currency_id: {
							required: true
							},
	        batch_fee_type: {
							required: true
							},
	        fees: {
							required: true
							},
	        course_fee_type: {
							required: true
							},
	        course_fee: {
							required: true
							},
	        batch_status: {
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
        });*/

</script>