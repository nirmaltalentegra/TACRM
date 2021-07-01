<h4 class="page-header">Account Details</h4>
    <?php if ($this->session->flashdata('error') == TRUE): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
   

    
	<div class="form-group">
        <label class="col-sm-12" for="text"><img class="avatar" alt="Avatar" src="//www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=80&d=mm" /> </label>       
    </div>
	
	<div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group floating-addon">
                        <label>Full Name<span class="text-danger">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                           <input type="text" class="form-control col-md-7 col-xs-12" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $firstname; ?>" />
                    <?php echo form_error('firstname') ?>
                        </div>
                      </div>
            
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
		<div class="form-group floating-addon">
                        <label>&nbsp;</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                           <input type="text" class="form-control col-md-7 col-xs-12" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" />
                    <?php echo form_error('lastname') ?>
                        </div>
                      </div>
        </div>
    </div>
	
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group floating-addon">
							<label>Email Address: <span class="text-danger">*</span></label>
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
								  <i class="far fa-envelope"></i>
								</div>
							  </div>
							   <input type="text" class="form-control col-md-7 col-xs-12" name="email" id="email" placeholder="me@mycompany.com" data-existing_email="<?php echo $email; ?>" value="<?php echo $email; ?>" />
						<?php echo form_error('email_error') ?>
							</div>
						  </div>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group floating-addon">
							<label> User Name: <span class="text-danger">*</span></label>
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
								  <i class="far fa-user"></i>
								</div>
							  </div>
							  <input type="text" class="form-control col-md-7 col-xs-12" name="username" id="username" data-existing_username="<?php echo $username; ?>" placeholder="vikram" value="<?php echo $username; ?>" />
							  <?php echo form_error('username') ?>
							</div>
							
						  </div>
						  <?php if($button == 'Update'){ ?>
        <div class="col-sm-4">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#setPass">Set Password</button>

            <div class="error"><?php echo form_error('password') ?></div>
            <div class="text-danger" id="pwd_error"></div>
        </div>
        <?php } ?>
			</div>
    </div>
	
	<div class="row">
	<?php if($button != 'Update'){ ?>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="form-group floating-addon">
							<label>Password<span class="text-danger">*</span></label>
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
								  <i class="fas fa-lock"></i>
								</div>
							  </div>
							    <input type="password" class="form-control col-md-7 col-xs-12" name="password" id="password" placeholder="Password" />
						<?php echo form_error('passwd') ?>
							</div>
						  </div>
		</div>
			
		<div class="col-md-6 col-sm-6 col-xs-12">	
			<div class="form-group floating-addon">
							<label>Confirm Password:<span class="text-danger">*</span></label>
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
								  <i class="fas fa-lock"></i>
								</div>
							  </div>
							   <input type="password" class="form-control col-md-7 col-xs-12" name="confirm_passwd" id="confirm_passwd" placeholder="Confirm Pasword" />
						<?php echo form_error('confirm_passwd') ?>
							</div>
						  </div>	
			</div>			  
		<?php } ?>				  
			
	</div>

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">	
			<div class="form-group floating-addon">
							<label>Phone No: <span class="text-danger">*</span></label>
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
								  <i class="fas fa-phone"></i>
								</div>
							  </div>
							   <input type="text" class="form-control col-md-4 col-xs-12" name="phone" id="phone" placeholder="000-0000-0000" value="<?php echo $phone; ?>"  />
						<?php echo form_error('phone') ?>
						 <input type="text" class="form-control col-md-3 col-xs-12" name="phone_ext" id="phone_ext" placeholder="extn" value="<?php echo $phone_ext; ?>"  style="width:25px" />
						<?php echo form_error('phone_ext') ?>
							</div>
						  </div>
								
			</div>
</div>		

<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">	
			<div class="form-group floating-addon">
							<label>Mobile No: <span class="text-danger">*</span></label>
							<div class="input-group">
							  <div class="input-group-prepend">
								<div class="input-group-text">
								  <i class="fas fa-mobile"></i>
								</div>
							  </div>
							   <input type="text" class="form-control col-md-7 col-xs-12" name="mobile" id="mobile" placeholder="1234567890" value="<?php echo $mobile; ?>"  />
						<?php echo form_error('mobile') ?>
						 
							</div>
						  </div>
								
			</div>
</div>			

    <hr/>
    <h4 class="page-header">Status and Settings</h4>
    
    <div class="form-group">
        <div class="col-sm-12">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="islocked" value="1" <?php if ($banned == 1) { ?> checked="" <?php } ?>/> Locked
              </label>
            </div>                
        </div>
        <div class="col-sm-12">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="isadmin" value="1" <?php if ($isadmin == 1) { ?> checked="" <?php } ?>/> Administrator
              </label>
            </div>                
        </div>
        <div class="col-sm-12">
            <div class="checkbox">
              <label >
                  <input type="checkbox" name="assigned_only" value="1" <?php if ($assigned_only == 1) { ?> checked="" <?php } ?>/><span class="">Limit ticket access to ONLY assigned tickets</span>
              </label>
            </div>                
        </div>
        <div class="col-sm-12">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="onvacation" value="1" <?php if ($onvacation == 1) { ?> checked="" <?php } ?>/>Vacation Mode
              </label>
            </div>                
        </div>
        <div class="col-sm-12">
            <div class="checkbox">
              <label>
                <input type="checkbox" name="sms_notification" value="1" <?php if ($sms_notification == 1) { ?> checked="" <?php } ?>/> SMS Notification
              </label>
            </div>                
        </div>
    </div>
    <hr />
    <div class="form-group">
        <label class="col-sm-2" for="text"><span class="text-danger">*</span>Signature : </label>	
        <div class="col-sm-6">
            <textarea class="form-control" name="signature" id="signature" /><?php echo $signature; ?></textarea>
            <?php echo form_error('signature') ?>
        </div>
    </div>