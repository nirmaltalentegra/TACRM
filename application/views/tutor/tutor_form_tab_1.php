<h4 class="page-header">Tutor Basic Details</h4>
    <?php if ($this->session->flashdata('error') == TRUE): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
   

    <div class="card">
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="<?php echo $action; ?>" method="post">
            <div class="card-body">
	    
		<div class=" form-group">
			 <label class="control-label " for="varchar">Name</label>
         
			<input type="text" class="form-control " name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
			<?php echo form_error('name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Email</label>
         
			<input type="text" class="form-control " name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
			<?php echo form_error('email') ?>
		
		</div>
		
		
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Mobile</label>
         
			<input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Skills</label>
         
			<textarea class="form-control " rows="3" name="skills" id="skills" placeholder="Skills"><?php echo $skills; ?></textarea>			
			<?php echo form_error('skills') ?>
		
		</div>

		<div class=" form-group">
			  <label class="control-label " for="varchar">Expert Level</label>
         
			<select name="expert_level" id="expert_level" class="form-control">
			<option value="Beginners">Beginners</option>
			<option value="intermediate">intermediate</option>
			<option value="SME">SME</option>
			</select>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Certification</label>
         
			<textarea class="form-control " rows="3" name="certification" id="certification" placeholder="Certification"><?php echo $certification; ?></textarea>
			<?php echo form_error('certification') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Cost per hour</label>
         
			<textarea class="form-control " rows="3" name="cost_per_hour" id="cost_per_hour" placeholder="Cost per hour"><?php echo $cost_per_hour; ?></textarea>
			<?php echo form_error('cost_per_hour') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Availablity</label>
         
			<input type="text" class="form-control " name="availablity" id="availablity" placeholder="availablity" value="<?php echo $availablity; ?>" />
			<?php echo form_error('availablity') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Document Type</label>
         
			<select name="document_type" id="document_type" class="form-control">
			<option value="Pan card">PAN Card</option>
			<option value="Aadhar Card">Aadhar Card</option>
			<option value="Driving License">Driving License</option>
			</select>
			<?php echo form_error('document_type') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Photo id proof</label>
         
			<input type="text" class="form-control " name="document_file_name" id="document_file_name" placeholder="Photo id proof" value="<?php echo $document_file_name; ?>" />
			<?php echo form_error('document_file_name') ?>
		
		</div>

		<div class=" form-group">
			 <label class="control-label " for="varchar">Bank account details</label>
         
			<textarea class="form-control " rows="3" name="bank_details" id="bank_details" placeholder="Bank account details"><?php echo $bank_details; ?></textarea>
			<?php echo form_error('bank_details') ?>
		
		</div>


		
		<div class=" form-group">
			 <label class="control-label " for="varchar">I am Type</label>
         
			<select name="iam_type" id="iam_type" class="form-control">
			<option value="Individual Teacher">Individual Teacher</option>
			<option value="Tutoring Company">Tutoring Company</option>
			</select>
			<?php echo form_error('iam_type') ?>
		
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