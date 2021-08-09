<h3 class="page-header">Teaching and Professional Experience</h3>	
	

<div class="card">
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="add_professional" method="post">
            <div class="card-body">
	    
		<div class=" form-group">
			 <label class="control-label " for="varchar">Organisation Name with City</label>
         
			<input type="text" class="form-control " name="organisation_name" id="organisation_name" placeholder="Name" value="<?php echo $name; ?>" />
			<?php echo form_error('name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Designation</label>
         
			<select name="designation" id="designation" class="form-control">
			<option value="Beginners">Beginners</option>
			<option value="intermediate">intermediate</option>
			<option value="SME">SME</option>
			</select>
		
			<?php echo form_error('email') ?>
		
		</div>
		
		
	    
		<div class=" form-group">
			 <label class="control-label " for="varchar">From Date</label>
         
			<input type="date" class="form-control " name="from_date" id="from_date" placeholder="From Date" value="<?php echo $name; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">To Date</label>
         
			<input type="date" class="form-control " name="to_date" id="to_date" placeholder="To Date" value="<?php echo $name; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Association</label>
         
			<select name="prof_association" id="prof_association" class="form-control">
			<option value="Beginners">Beginners</option>
			<option value="intermediate">intermediate</option>
			<option value="SME">SME</option>
			</select>
		
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Job Description</label>
         
			<textarea name="job_description" id="job_description" class="form-control"></textarea>
			<?php echo form_error('phone') ?>
		
		</div>
		    	    
		<div class="ln_solid"></div>
            <div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> <?php echo $button ?></button>&nbsp;
				  <a href="<?php echo site_url('tutor') ?>" class="btn btn-danger"><i class="fa fa-times"></i> Cancel</a>
				</div>
			  </div>
                
			</form>
</div>
</div>
