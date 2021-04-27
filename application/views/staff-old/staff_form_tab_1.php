<h3 class="page-header">Account Details</h3>
    <?php if ($this->session->flashdata('error') == TRUE): ?>
    <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
   

    <div class="form-group">
        <label class="col-sm-12" for="text"><img class="avatar" alt="Avatar" src="//www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=80&d=mm" /> </label>       
    </div>

    <div class="form-group">
        <label class="col-sm-2" for="text"><span class="text-danger">*</span> Full Name: </label>	
        <div class="col-sm-4">
            <input type="text" class="form-control" name="firstname" autofocus value="<?php echo $firstname; ?>" placeholder="First Name" />
            <div class="error"><?php echo form_error('firstname') ?></div>

        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" placeholder="Last Name" />	
            <div class="error"><?php echo form_error('lastname') ?></div>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2" for="varchar"><span class="text-danger">*</span> Email Address: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="email" id="email" placeholder="me@mycompany.com" data-existing_email="<?php echo $email; ?>" value="<?php echo $email; ?>" />
            <?php echo form_error('email') ?>
        </div>
        <span class="text-danger" id="email_error"></span>
    </div>


    <div class="form-group">
        <label class="col-sm-2" for="varchar"><span class="text-danger">*</span> User Name: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="username" id="username" data-existing_username="<?php echo $username; ?>" placeholder="vikram" value="<?php echo $username; ?>" />
            <div class="error"><?php echo form_error('username') ?></div><br>
        </div>
        <?php if($button == 'Update'){ ?>
        <div class="col-sm-4">
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#setPass">Set Password</button>

            <div class="error"><?php echo form_error('password') ?></div>
            <div class="text-danger" id="pwd_error"></div>
        </div>
        <?php } ?>
        <span class="text-danger" id="username_error"></span>
    </div>

    <?php if($button != 'Update'){ ?>
    <div class="form-group">
        <label class="col-sm-2" for="varchar"><span class="text-danger">*</span> Password: </label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="passwd" id="passwd" placeholder="Password" value="" />
            <?php echo form_error('passwd') ?></div>                

    </div>
    <div class="form-group">
        <label class="col-sm-2" for="varchar"><span class="text-danger">*</span> Confirm Password: </label>
        <div class="col-sm-4">
            <input type="password" class="form-control" name="confirm_passwd" id="confirm_passwd" placeholder="Confirm Password" value="" />
            <?php echo form_error('confirm_passwd') ?></div>                
    </div>
    <?php } ?>
    <div class="form-group">
        <label class="col-sm-2" for="varchar"><span class="text-danger">*</span> Phone No: </label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="000-0000-0000" value="<?php echo $phone; ?>" />
            <?php echo form_error('phone') ?></div>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="phone_ext" id="phone_ext" placeholder="extn" value="<?php echo $phone_ext; ?>" />
            <?php echo form_error('phone_ext') ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2" for="varchar"><span class="text-danger">*</span> Mobile No: </label>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="1234567890" value="<?php echo $mobile; ?>" />
            <?php echo form_error('mobile') ?>
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