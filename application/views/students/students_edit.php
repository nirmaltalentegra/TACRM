
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Students <small>-Detail list of Students</small></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active">
          <a href="#">Dashboard</a>
        </div>
        <div class="breadcrumb-item">
          Students
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
		  
<form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
<input type="hidden"  name="student_id" id="student_id" value="<?php echo $student_id; ?>" />
      <div class="card-header">
                <h4>Students</h4>
              </div>
              <div class="card-body">
	    <!--<div class=" form-group">
			 <label class="control-label " for="tinyint">Active</label>
           
			<input type="text" class="form-control " name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
			<?php //echo form_error('active') ?>
		
		</div>-->
		
		<div class=" form-group">
			 <label class="control-label " for="int">Course</label>
			<select class="form-control" name="course_id" id="course_id" placeholder="Course Id" >
			        <option value="0">Select</option>
			  <?php foreach ($row_courses as $row) 
				{ ?>
				<option <?php echo ($course_id == $row['course_id'])?'selected':''; ?> value="<?php  echo $row['course_id'];?>" ><?php echo $row['course_name']; ?></option>
				
				<?php 
				}
				?>
			  </select>
			  <!--<input type="hidden" class="form-control " name="course_id" id="course_id" placeholder="course_id" value="<?php // echo $course_id; ?>" />
			  <input type="text" disabled class="form-control " name="course_name" id="course_name" placeholder="Course Name" value="<?php //echo $course_name; ?>" />-->
			
			  <div id="err_msg"></div>
			<?php echo form_error('course_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch</label>
			 <input type="hidden"  name="hid_batch_id" id="hid_batch_id" value="<?php echo $batch_id; ?>" />
             <select class="form-control" name="batch_id" id="batch_id" placeholder="Batch Id" >
			        <option value="0">Select</option>
			  <?php foreach ($row_batch as $row)
				{ ?>
					<option data-course = "<?php echo $row['course_id'];  ?>" data-fees = "<?php echo $row['fees'];  ?>" <?=($batch_id == $row['batch_id'])?'selected':''; ?> value="<?php echo $row['batch_id'];?>" ><?php echo $row['batch_title']; ?></option>
				<?php 
				}
				?>
			  </select>
			  <div id="err_batch_msg"></div>
			<?php echo form_error('batch_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Course Completed</label>
             <select class="form-control" name="course_completed" id="course_completed" placeholder="" >
					<option <?=($course_completed == '1')?'selected':''; ?> value="1">Yes</option>
					<option <?=($course_completed == '0')?'selected':''; ?> value="0">No</option>
			 
			  </select>
			<?php echo form_error('course_completed') ?>
		
		</div> 
		
	    <div style = "<?=($course_completed == '0')?'display:none;':''?>" class="div_completion_date form-group">
			 <label class="control-label " for="timestamp">Completion Date</label>
           
			<input type="date" class="form-control " name="completion_date" id="completion_date" placeholder="Completion Date" value="<?php echo isset($completion_date) ? set_value('completion_date', date('Y-m-d', strtotime($completion_date))) : set_value('completion_date'); ?>" />
			<?php echo form_error('completion_date') ?>
		
		</div>
	    <div style = "<?=($course_completed == '0')?'display:none;':''?>" class="div_completion_date form-group">
			 <label class="control-label " for="timestamp">Student Did</label>
           
			<input type="text" class="form-control " name="student_did" id="student_did" placeholder="Student Did" value="<?php echo $student_did; ?>" />
			<?php echo form_error('student_did') ?>
		
		</div>
		<div style = "<?=($course_completed == '0')?'display:none;':''?>" class="div_completion_date form-group">
			 <label class="control-label " for="timestamp">Certificate Id</label>
           
			<input type="text" class="form-control " name="certificate_id" id="certificate_id" placeholder="Certificate Id" value="<?php echo $certificate_id; ?>" />
			<?php echo form_error('certificate_id') ?>
		
		</div>
	
	    <div class=" form-group">
			 <label class="control-label " for="float">Fees Paid</label>
           
			<input type="text" class="form-control " name="fees_paid" id="fees_paid" placeholder="Fees Paid" value="<?php echo $fees_paid; ?>" />
			<?php echo form_error('fees_paid') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Fees Payable</label>
           
			<input type="text" class="form-control " name="fees_payable" id="fees_payable" placeholder="Fees Payable" value="<?php echo $fees_payable; ?>" />
			<?php echo form_error('fees_payable') ?>
		
		</div>
	
	    <!--<div class=" form-group">
			 <label class="control-label " for="int">User Id</label>-->
           
			<input type="hidden" class="form-control " name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
			<?php //echo form_error('user_id') ?>
		
		<!--</div>-->
	     <div class="ln_solid"></div>
                            <div class="form-group">
                              
                                    <button class="btn btn-success" type="submit">Submit</button>  
                                    <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('students/'); ?>';">Cancel</button>

                              
                            </div>
			</form>

			     
     
          </div>
         </div>
      </div>
    </div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
	 


<script type="text/javascript">

/*var form2 = $('#frm_edit');
        var error1 = $('.alert-danger', form2);
        var success1 = $('.alert-success', form2);

        form2.validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
	        active: {
							required: true
							},
	        added_by: {
							required: true
							},
	        address: {
							required: true
							},
	        batch_id: {
							required: true
							},
	        completion_date: {
							required: true
							},
	        course_completed: {
							required: true
							},
	        course_id: {
							required: true
							},
	        deleted_at: {
							required: true
							},
	        fees_paid: {
							required: true
							},
	        fees_payable: {
							required: true
							},
	        first_name: {
							required: true
							},
	        is_deleted: {
							required: true
							},
	        user_id: {
							required: true
							},
	        zipcode: {
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
		
/*$(document).ready(function(){
     $("#course_id").change(function(){
        var course_id = $(this).val();
		var batch_id = $("#batch_id").val();
		var user_id = $("#user_id").val();
        if(user_id != ""){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Students/check_student_batch_course',
                type: 'post',
                data: {user_id:user_id, course_id: course_id, batch_id: batch_id},
               // dataType: 'json',
                success:function(response){
					//alert(response);
					if(response!='failure'){
						$("#err_msg").html("Record already present");
						$("#course_id").val('0');
					}
					else
					{
						$("#err_msg").html("");
					} 
					 

                }
            });
        }

    });

});*/

$(document).ready(function(){
$("#course_completed").change(function(){
	course_completed = $("#course_completed").val()
	if(course_completed == '1'){
	    $('.div_completion_date').show();
	}
	else {
		$('.div_completion_date').hide();
		$("#completion_date").val('');
		$("#student_did").val('');
		$("#certificate_id").val('');
	}
});
});
$(document).ready(function(){
$("#course_id").change(function(){
	$('#batch_id').html( $batch.find('option').filter( '[data-course="' + this.value + '"]' ) );
	var fee = $("#batch_id").find(':selected').data('fees');
	$("#fees_paid").val(fee);
} ).trigger( 'change' );
});
$(document).ready(function(){
     $("#batch_id").change(function(){
		 $("#course_name").val('');
		 $("#course_id").val('');
		 $("#fees_paid").val('');
		 
		var course_id = $(this).find(':selected').data('course');
		var fees_paid = $(this).find(':selected').data('fees');
		
		var batch_id = $("#batch_id").val();
		var user_id = $("#user_id").val();
		var hid_batch_id = $("#hid_batch_id").val();
		
		$("#err_batch_msg").html(""); 
        if($("#hid_batch_id").val() != batch_id){
			
            $.ajax({
                url: '<?php echo base_url(); ?>Students/check_student_batch',
                type: 'post',
                data: {user_id:user_id, batch_id: batch_id, course_id:course_id},
               dataType: 'json',
                success:function(response){
					//alert(response);
					if(response['result']!='failure'){
						$("#err_batch_msg").html("This batch already selected for this student");
						$("#batch_id").val('0');
					}
					else
					{
						$("#err_batch_msg").html(""); 
						//$("#course_name").val(response['course_name']);
						$("#fees_paid").val(fees_paid);
						//$("#course_id").val(course_id);
					} 
					 

                }
            });
        }

    });

});
</script>