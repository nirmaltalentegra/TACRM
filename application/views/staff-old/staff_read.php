

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Details
        <small>Details of Staff</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('staff'); ?>">Staff</a></li>
        <li class="active">Staff Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Staff Details</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive no-padding">



<h2 style="margin-top:0px">Staff Read</h2>
        <table class="table">
		<tr><th>Staff Name</th><td><?php echo $staff_name; ?></td></tr>
	    <tr><th>Organization</th><td><?php echo $org_name; ?></td></tr>
	    <tr><th>Department</th><td><?php echo $dept_name; ?></td></tr>
	    <tr><th>Primary Role</th><td><?php echo $staff_role; ?></td></tr>
	    <tr><th>Designation</th><td><?php echo $staff_desgn; ?></td></tr>
	    <tr><th>Reporting Manager </th><td><?php echo $staff_manager; ?></td></tr>
	    
	    <tr><td>Mobile</td><td><?php echo $mobile; ?></td></tr>
	    <tr><td>Signature</td><td><?php echo $signature; ?></td></tr>
	    <tr><td>Lang</td><td><?php echo $lang; ?></td></tr>
	    <tr><td>Timezone</td><td><?php echo $timezone; ?></td></tr>
	    <tr><td>Locale</td><td><?php echo $locale; ?></td></tr>
	    <tr><td>Notes</td><td><?php echo $notes; ?></td></tr>
	    <tr><td>Sms Notification</td><td><?php echo $sms_notification; ?></td></tr>
	   
	    <tr><td></td><td><a href="#" class="btn btn-danger"><i class="fa fa-print"></i> PDF</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
                        <a href="<?php echo site_url('staff') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>

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



