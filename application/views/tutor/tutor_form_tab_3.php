<h3 class="page-header">Education and Certifications</h3>	

<div class="card">
            <form id="frm_create" name="frm_create" class="form-horizontal form-label-left" data-parsley-validate="" action="add_education" method="post">
            <div class="card-body">
	    
		<div class=" form-group">
			 <label class="control-label " for="varchar">Instituion Name with City</label>
         
			<input type="text" class="form-control " name="institute_name" id="institute_name" placeholder="Name" value="<?php echo $name; ?>" />
			<?php echo form_error('name') ?>
		
		</div>
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Degree Type</label>
			
			<select name="degree_type" id="degree_type" class="form-control">
			
			<?php foreach($degree_type as $types){?>
			<option value="<?php $types['id'];?>"><?php echo $types['degree_type'];?></option>
			<?Php }?>
			</select>
			
			<?php echo form_error('email') ?>
		
		</div>
		
		
	    <div class=" form-group">
			 <label class="control-label " for="varchar">Degree Name</label>
         
			<input type="text" class="form-control " name="degree_name" id="degree_name" placeholder="Degree Name" value="<?php echo $name; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Start Date</label>
         
			<input type="date" class="form-control " name="start_date" id="start_date" placeholder="Start Date" value="<?php echo $name; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">End Date</label>
         
			<input type="date" class="form-control " name="end_date" id="end_date" placeholder="End Date" value="<?php echo $name; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		
		<div class=" form-group">
			 <label class="control-label " for="varchar">Association</label>
         
			<select name="association" id="association" class="form-control">
			<option value="Beginners">Beginners</option>
			<option value="intermediate">intermediate</option>
			<option value="SME">SME</option>
			</select>
		
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Speciality(Optional)</label>
         
			<input type="text" class="form-control " name="speciality" id="speciality" placeholder="Speciality" value="<?php echo $name; ?>" />
			<?php echo form_error('phone') ?>
		
		</div>
		<div class=" form-group">
			 <label class="control-label " for="varchar">Score(Optional)</label>
         
			<input type="text" class="form-control " name="score" id="score" placeholder="Score" value="<?php echo $name; ?>" />
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
