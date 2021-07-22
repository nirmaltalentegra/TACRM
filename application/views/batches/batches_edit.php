
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
		  
	<form id="frm_edit" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
	<input type="hidden"  id="hdn_category_id" name="hdn_category_id" value="<?php echo $category_id; ?>" />
	<input type="hidden"  id="hdn_course_id" name="hdn_course_id" value="<?php echo $course_id; ?>" />
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
					<option <?=($row['category_id']==$category_id)?'selected':'' ?> value="<?php echo $row['category_id'];?>" ><?php echo $row['category_name']; ?></option>
				<?php 
				}
				?>
			  </select>
			<?php echo form_error('category_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Course</label>
           <select class="form-control" name="course_id" id="course_id" placeholder="Course Id" required="">
			        <option value="0">Select</option>
			  <?php foreach ($row_courses as $row)
			  {
			  $course_fee_type_name = '';
			  foreach ($row_course_fee_type as $row_type)
				{ 
				if($row_type['course_fee_type_id'] == $row['course_fee_type'])
				{
					$course_fee_type_name = $row_type['course_fee_type'];
				}
				} 
				 ?>
					<option data-category ="<?php echo $row['category_id'];  ?>" data-feetype ="<?php echo $row['course_fee_type'];  ?>" data-feetypename = "<?php echo $course_fee_type_name;  ?>" data-fee = "<?php echo $row['course_fees'];  ?>" <?=($row['course_id']==$course_id)?'selected':'' ?> value="<?php echo $row['course_id'];?>" ><?php echo $row['course_name']; ?></option>
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
					<option <?=($row['id']==$faculty_id)?'selected':'' ?>  value="<?php echo $row['id'];?>" ><?php echo $row['fullname']; ?></option>
				<?php 
				}
				}
				?>
			  </select>
			<?php echo form_error('faculty_id') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Branch</label><select class="form-control" name="branch_id" id="branch_id" placeholder="Branch Id" >
					<option value="0">Select</option>
			  <?php foreach ($row_branch as $row)
				{ ?>
					<option <?=($row['branch_id']==$branch_id)?'selected':'' ?> value="<?php echo $row['branch_id'];?>" ><?php echo $row['branch_name']; ?></option>
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
					<option <?=($row['batch_type_id']==$batch_type)?'selected':'' ?> value="<?php echo $row['batch_type_id'];?>" ><?php echo $row['batch_type_name']; ?></option>
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
					<option <?=($row['batch_pattern_id']==$batch_pattern)?'selected':'' ?> value="<?php echo $row['batch_pattern_id'];?>" ><?php echo $row['batch_pattern']; ?></option>
				<?php 
				}
				?>
			  </select>
			  <?php echo form_error('batch_pattern') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Week Days</label>
			<select class="form-control select2" multiple name="week_days[]" id="week_days" placeholder="Batch Pattern" >
					<?php $week_days = explode(",",$week_days); ?>
					<option <?=in_array("1", $week_days)?'selected' : '';?> value="1">Sunday</option>
					<option <?=in_array("2", $week_days)?'selected' : '';?> value="2">Monday</option>
					<option <?=in_array("3", $week_days)?'selected' : '';?> value="3">Tuesday</option>
					<option <?=in_array("4", $week_days)?'selected' : '';?> value="4">Wednesday</option>
					<option <?=in_array("5", $week_days)?'selected' : '';?> value="5">Thursday</option>
					<option <?=in_array("6", $week_days)?'selected' : '';?> value="6">Friday</option>
					<option <?=in_array("7", $week_days)?'selected' : '';?> value="7">Saturday</option>
			</select>
			<?php echo form_error('week_days') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="datetime">Start Date</label>
           
			<input type="date" class="form-control " name="start_date" id="start_date" placeholder="Start Date"  value="<?php echo isset($start_date) ? set_value('start_date', date('Y-m-d', strtotime($start_date))) : set_value('start_date'); ?>" />
			<?php echo form_error('start_date') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="datetime">End Date</label>
           
			<input type="date" class="form-control " name="end_date" id="end_date" placeholder="End Date" 
			 value="<?php echo isset($end_date) ? set_value('end_date', date('Y-m-d', strtotime($end_date))) : set_value('end_date'); ?>"  ></input>
			<?php echo form_error('end_date') ?>
		
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
					<option <?=($row['course_fee_type_id']==$batch_fee_type)?'selected':'' ?> value="<?php echo $row['course_fee_type_id'];?>" ><?php echo $row['course_fee_type']; ?></option>
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
			 <?php
			 foreach ($row_course_fee_type as $row){
				 $course_fee_type_name ='';
				 if(($row['course_fee_type_id']==$course_fee_type)){
					 $course_fee_type_name= $row['course_fee_type'];
					 break;
				 }
			 }
			 ?>
			 <input type="hidden" class="form-control " name="course_fee_type" id="course_fee_type" placeholder="Course Fee Type" value="<?php echo $course_fee_type; ?>" />
			<input readonly type="text" class="form-control " name="course_fee_type_name" id="course_fee_type_name" placeholder="Course Fee Type name" value="<?php echo $course_fee_type_name; ?>" />
			
           <!--<select readonly class="form-control" name="course_fee_type" id="course_fee_type" placeholder="Course Fee Type" >
			        <option value="0">Select</option>
			  <?php //foreach ($row_course_fee_type as $row)
				//{ ?>
					<option <? //= ($row['course_fee_type_id']==$course_fee_type)?'selected':'' ?> value="<?php //echo $row['course_fee_type_id'];?>" ><?php //echo $row['course_fee_type']; ?></option>
				<?php 
				//}
				?> 
			  </select>-->
			  <?php echo form_error('course_fee_type') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="float">Course Fee</label>
           
			<input readonly type="text" class="form-control " name="course_fee" id="course_fee" placeholder="Course Fee" value="<?php echo $course_fee; ?>" />
			<?php echo form_error('course_fee') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="int">Batch Status</label>
            <select class="form-control" name="batch_status" id="batch_status" placeholder="Batch Status" >
			        <option value="0">Select</option>
			  <?php foreach ($row_status as $row)
				{ ?>
					<option <?=($row['status_id']==$batch_status)?'selected':'' ?> value="<?php echo $row['status_id'];?>" ><?php echo $row['status']; ?></option>
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

<script type="text/javascript">
$(document).ready(function(){
	var $category = $( '#category_id' ),
		$course = $( '#course_id' ),
		$options = $course.find( 'option' );
    
	$category.on( 'change', function() {
		var category_id = $("#hdn_category_id").val();
		var course_id = $("#hdn_course_id").val();
		
		$course.html( $options.filter( '[data-category="' + this.value + '"]' ) );
		$course.prepend("<option value='0' selected='selected'>Please Select</option>");
		//console.log('category_id '+category_id+' value '+this.value);
		if(this.value == category_id) {
			$("#course_id").val(course_id);
		}
		else {
			$("#course_id").val(0);
		}
		
		var fee = $("#course_id").find(':selected').data('fee');
		var fee_type = $("#course_id").find(':selected').data('feetype');
		var fee_type_name = $("#course_id").find(':selected').data('feetypename');
		$("#course_fee").val(fee);
		$("#course_fee_type").val(fee_type);
		$("#course_fee_type_name").val(fee_type_name);
	} ).trigger( 'change' );

	$("#course_id").change(function(){	 	
		var fee = $(this).find(':selected').data('fee');
		var fee_type = $("#course_id").find(':selected').data('feetype');
		var fee_type_name = $("#course_id").find(':selected').data('feetypename');
		$("#course_fee").val(fee);
		$("#course_fee_type").val(fee_type);
		$("#course_fee_type_name").val(fee_type_name);
	});
});

</script>
<?php $this->load->view('_layout/footer'); ?>