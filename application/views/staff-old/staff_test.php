<h2 style="margin-top:0px">Staff Read</h2>
        <table class="table">
	    <tr><td>Organization</td><td><?php echo $org_name; ?></td></tr>
		<tr><td>Name</td><td><?php echo $staff_name; ?></td></tr>
		<tr><td>Email</td><td><?php echo $staff_email; ?></td></tr>
		<tr><td>Primary Dept</td><td><?php echo $dept_name; ?></td></tr>
		<tr><td>Primary Role</td><td><?php echo $staff_role; ?></td></tr>
		<tr><td>Reporting Manager</td><td><?php echo $staff_manager; ?></td></tr>
		<tr><td>Designation</td><td><?php echo $staff_desgn; ?></td></tr>
		
	    
	    <tr><td></td><td><a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        