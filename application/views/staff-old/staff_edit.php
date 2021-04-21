
<!-- =============================================== -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff
        <small>Detail list of Staff</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Staff</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-info">
        <h4>Tip!</h4>

       
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Staff Edit</h3>
		  

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">
      


<h2 style="margin-top:0px">Staff <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Org Id <?php echo form_error('org_id') ?></label>
            <input type="text" class="form-control" name="org_id" id="org_id" placeholder="Org Id" value="<?php echo $org_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Dept Id <?php echo form_error('dept_id') ?></label>
            <input type="text" class="form-control" name="dept_id" id="dept_id" placeholder="Dept Id" value="<?php echo $dept_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
            <input type="text" class="form-control" name="role_id" id="role_id" placeholder="Role Id" value="<?php echo $role_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Manager Id <?php echo form_error('manager_id') ?></label>
            <input type="text" class="form-control" name="manager_id" id="manager_id" placeholder="Manager Id" value="<?php echo $manager_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Designation Id <?php echo form_error('designation_id') ?></label>
            <input type="text" class="form-control" name="designation_id" id="designation_id" placeholder="Designation Id" value="<?php echo $designation_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Firstname <?php echo form_error('firstname') ?></label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo $firstname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lastname <?php echo form_error('lastname') ?></label>
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo $lastname; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone Ext <?php echo form_error('phone_ext') ?></label>
            <input type="text" class="form-control" name="phone_ext" id="phone_ext" placeholder="Phone Ext" value="<?php echo $phone_ext; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mobile <?php echo form_error('mobile') ?></label>
            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $mobile; ?>" />
        </div>
	    <div class="form-group">
            <label for="signature">Signature <?php echo form_error('signature') ?></label>
            <textarea class="form-control" rows="3" name="signature" id="signature" placeholder="Signature"><?php echo $signature; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Lang <?php echo form_error('lang') ?></label>
            <input type="text" class="form-control" name="lang" id="lang" placeholder="Lang" value="<?php echo $lang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Timezone <?php echo form_error('timezone') ?></label>
            <input type="text" class="form-control" name="timezone" id="timezone" placeholder="Timezone" value="<?php echo $timezone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Locale <?php echo form_error('locale') ?></label>
            <input type="text" class="form-control" name="locale" id="locale" placeholder="Locale" value="<?php echo $locale; ?>" />
        </div>
	    <div class="form-group">
            <label for="notes">Notes <?php echo form_error('notes') ?></label>
            <textarea class="form-control" rows="3" name="notes" id="notes" placeholder="Notes"><?php echo $notes; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="tinyint">Sms Notification <?php echo form_error('sms_notification') ?></label>
            <input type="text" class="form-control" name="sms_notification" id="sms_notification" placeholder="Sms Notification" value="<?php echo $sms_notification; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Isadmin <?php echo form_error('isadmin') ?></label>
            <input type="text" class="form-control" name="isadmin" id="isadmin" placeholder="Isadmin" value="<?php echo $isadmin; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Isvisible <?php echo form_error('isvisible') ?></label>
            <input type="text" class="form-control" name="isvisible" id="isvisible" placeholder="Isvisible" value="<?php echo $isvisible; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Onvacation <?php echo form_error('onvacation') ?></label>
            <input type="text" class="form-control" name="onvacation" id="onvacation" placeholder="Onvacation" value="<?php echo $onvacation; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Assigned Only <?php echo form_error('assigned_only') ?></label>
            <input type="text" class="form-control" name="assigned_only" id="assigned_only" placeholder="Assigned Only" value="<?php echo $assigned_only; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Show Assigned Tickets <?php echo form_error('show_assigned_tickets') ?></label>
            <input type="text" class="form-control" name="show_assigned_tickets" id="show_assigned_tickets" placeholder="Show Assigned Tickets" value="<?php echo $show_assigned_tickets; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Change Passwd <?php echo form_error('change_passwd') ?></label>
            <input type="text" class="form-control" name="change_passwd" id="change_passwd" placeholder="Change Passwd" value="<?php echo $change_passwd; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Max Page Size <?php echo form_error('max_page_size') ?></label>
            <input type="text" class="form-control" name="max_page_size" id="max_page_size" placeholder="Max Page Size" value="<?php echo $max_page_size; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Auto Refresh Rate <?php echo form_error('auto_refresh_rate') ?></label>
            <input type="text" class="form-control" name="auto_refresh_rate" id="auto_refresh_rate" placeholder="Auto Refresh Rate" value="<?php echo $auto_refresh_rate; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Default Signature Type <?php echo form_error('default_signature_type') ?></label>
            <input type="text" class="form-control" name="default_signature_type" id="default_signature_type" placeholder="Default Signature Type" value="<?php echo $default_signature_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Default Paper Size <?php echo form_error('default_paper_size') ?></label>
            <input type="text" class="form-control" name="default_paper_size" id="default_paper_size" placeholder="Default Paper Size" value="<?php echo $default_paper_size; ?>" />
        </div>
	    <div class="form-group">
            <label for="extra">Extra <?php echo form_error('extra') ?></label>
            <textarea class="form-control" rows="3" name="extra" id="extra" placeholder="Extra"><?php echo $extra; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="permissions">Permissions <?php echo form_error('permissions') ?></label>
            <textarea class="form-control" rows="3" name="permissions" id="permissions" placeholder="Permissions"><?php echo $permissions; ?></textarea>
        </div>
	
	    <input type="hidden" name="staff_id" value="<?php echo $staff_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a>
	</form>
	
	
	
	</div>
        <!-- /.box-body -->
		
		
    <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  