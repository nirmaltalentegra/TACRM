<h2 style="margin-top:0px">Staff <?php echo $button ?></h2>

<div>
<div class="col-sm-1">

			<div><h3>Error:<?php echo $this->session->flashdata('error'); ?></h3></div>
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
  			   </div>
			   <?php if ($this->session->flashdata('error') == TRUE): ?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
				<?php endif; ?>
            </div>
</div>
<form class="form-horizontal" role="form" action="<?php echo $action; ?>" method="post">
	    
		
	 <ul class="nav nav-tabs">
    <li class="active"><a href="#account">Account</a></li>
    <li><a href="#access">Access</a></li>
    <li><a href="#permission">Permission</a></li>
    <li><a href="#team">Team</a></li>
  </ul>
<div class="tab-content">
    <div id="account" class="tab-pane fade in active">
      	
	  <table class="table two-column" width="940" border="0" cellspacing="0" cellpadding="2">
      <tbody>
        <tr><td colspan="2"><div>
        <div class="avatar pull-left" style="width: 100px; margin: 10px;">
            <img class="avatar" alt="Avatar" src="//www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=80&d=mm" />        </div>
        <table class="table two-column" border="0" cellspacing="2" cellpadding="2" style="width: 760px">
        <tr>
          <td class="required">Name:</td>
          <td>
            <input type="text" size="25" maxlength="64" style="width: 165px" name="firstname"
              autofocus value=""
              placeholder="First Name" />
            <input type="text" size="25" maxlength="64" style="width: 165px" name="lastname"
              value=""
              placeholder="Last Name" />	
			 <div class="error"><?php echo form_error('firstname') ?></div>
			 <div class="error"><?php echo form_error('lastname') ?></div>
            </td>
		</tr>
		
		<tr>
          <td class="required">Email Address:</td>
          <td>
            <input id="email" ="email" size="40" maxlength="64" style="width: 300px" name="email"
              value=""
              placeholder="e.g. me@mycompany.com" />
            <div id="email_error" class="error"><?php echo form_error('email') ?></div>
          </td>
        </tr>
        <tr>
          <td>Phone Number:</td>
          <td>
            <input type="tel" size="18" name="phone" class="auto phone"
              value="" />
            Ext            <input type="text" size="5" name="phone_ext"
              value="">
            <div class="error"><?php echo form_error('phone') ?></div>
            <div class="error"><?php echo form_error('phone_ext') ?></div>
          </td>
        </tr>
        <tr>
          <td>Mobile Number:</td>
          <td>
            <input type="tel" size="18" name="mobile" class="auto phone"
              value="" />
            <div class="error"><?php echo form_error('mobile') ?></div>
          </td>
        </tr>
        </table></div></td></tr>
      </tbody>
		
	   <!-- ================================================ -->
      <tbody>
        <tr class="header">
          <th colspan="2">
            Authentication          </th>
        </tr>
        <tr>
          <td class="required">Username:
            <span class="error">*</span></td>
          <td>
            <input type="text" size="40" style="width:300px"
              class="staff-username typeahead"
              name="username"  id="username" value="" />
            
			
		
			  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Set Pass</button>  
			  
            <i class="offset help-tip icon-question-sign" href="#username"></i>
            <div id="username_error" class="error"><?php echo form_error('username') ?></div>
          </td>
        </tr>
      </tbody>	
	  
	   <!-- ================================================ -->
      <tbody>
        <tr class="header">
          <th colspan="2">
            Status and Settings          </th>
        </tr>
        <tr>
          <td colspan="2">
            <div class="error"></div>
            <div class="error"></div>
            <label class="checkbox">
            <input type="checkbox" name="islocked" value="1"
               />
              Locked            </label>
            <label class="checkbox">
            <input type="checkbox" name="isadmin" value="1"
               />
              Administrator            </label>
            <label class="checkbox">
            <input type="checkbox" name="assigned_only"
               />
              Limit ticket access to ONLY assigned tickets            </label>
            <label class="checkbox">
            <input type="checkbox" name="onvacation"
               />
              Vacation Mode            </label>
			<label class="checkbox">
            <input type="checkbox" name="sms_notify"
               />
              SMS Notification           </label>
			
			  
            <br/>
        </tr>
      </tbody>
    </table>

    <div style="padding:8px 3px; margin-top: 1.6em">
        <strong class="big">Internal Notes: </strong>
        be liberal, they're internal.    </div>

    <textarea name="notes" class="richtext">
          </textarea>
</div>

	   
	
	
	<div id="access" class="tab-pane fade">
		     <h3>Menu 1</h3>
		<div class="form-group">
		<div>
         	<label for="org_id" class="control-label">Organization <?php echo form_error('org_id') ?></label></div>
			<div>
			<select name="org_id" class="form-control">
				<option value="">select org</option>
				<?php 
				foreach($org_data as $org)
				{
					echo '<option value="'.$org->id.'">'.$org->name."</option>";
				} 
				?>
			</select>
			</div>
		</div>
	    <div class="form-group">
            <label for="int">Dept Id <?php echo form_error('dept_id') ?></label>
          	<select name="dept_id" class="form-control">
				<option value="">select Department</option>
				<?php 
				foreach($dept_data as $dept)
				{
					echo '<option value="'.$dept->id.'">'.$dept->name."</option>";
				} 
				?>
			</select>
		</div>
	    <div class="form-group">
            <label for="int">Role Id <?php echo form_error('role_id') ?></label>
          	<select name="role_id" class="form-control">
				<option value="">select Role</option>
				<?php 
				foreach($role_data as $role)
				{
					echo '<option value="'.$role->id.'">'.$role->name."</option>";
				} 
				?>
			</select>
		
		</div>
	   
		
		<div class="form-group">
		<label for="manager_id" class="control-label">Manager Id</label>
		
			<select name="manager_id" class="form-control">
				<option value="">select staff</option>
				<?php 
				foreach($staff_data as $staff)
				{
					echo '<option value="'.$staff['staff_id'].'">'.$staff['staff_name']."</option>";
				} 
				?>
			</select>
		</div>
	
	
		
		
		
		
	    <div class="form-group">
            <label for="int">Designation <?php echo form_error('designation_id') ?></label>
			<select name="designation_id" class="form-control">
				<option value="">select Designation</option>
				<?php 
				foreach($designation_data as $desg)
				{
					echo '<option value="'.$desg->id.'">'.$desg->name."</option>";
				} 
				?>
			</select>
		
		</div>
		
	</div>	
		
	<div id="permission" class="tab-pane fade">
      <h3>Menu 2</h3>
	
	   
	   
	   	    
	</div>

	<div id="team" class="tab-pane fade">
      <h3>Menu 3</h3>
		
		 
	</div>

</div>

	
	
	    <input type="hidden" name="staff_id" value="<?php //echo $staff_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a>
	</form>



 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set Password</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label for="varchar">New password <?php echo form_error('pass') ?></label>
            <input type="text" class="form-control" name="pass" id="pass" placeholder="Password" value="" />
        </div>
	    <div class="form-group">
            <label for="varchar">Confirm Password <?php echo form_error('confirm_pass') ?></label>
            <input type="text" class="form-control" name="confirm_pass" id="confirm_pass" placeholder="Confirm Password" value="" />
        </div>
		
		  <button type="button" class="btn btn-info btn-sm">Set</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>	
	
	
	



<script>
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
    $('.nav-tabs a').on('shown.bs.tab', function(){
        
    });
});
</script>

   <script type="text/javascript">
    $(document).ready(function() {
        /// make loader hidden in start
      $('#email').blur(function(){
        var email_val = $("#email").val();
        var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
        if(filter.test(email_val)){
            // show loader
            $('#loading').show();
            $.post("<?php echo site_url()?>/staff/email_check", {
                email: email_val
            }, function(response){
              
                $('#email_error').html('').html(response.message).show().delay(4000).fadeOut();
            });
            return false;
        }
    });
    
	      $('#username').blur(function(){
        var username_val = $("#username").val();
		    $.post("<?php echo site_url()?>/staff/username_check", {
                username: username_val
            }, function(response){
              
                $('#username_error').html('').html(response.message).show().delay(4000).fadeOut();
            });
            return false;
			}
			
    });
	
    });  
</script>

















