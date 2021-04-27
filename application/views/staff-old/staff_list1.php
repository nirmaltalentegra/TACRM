<style>
.xcrud-list {
    min-width: 100%;
    width: auto;
    display: table !important;
    margin: 0 0 3px;
    border-spacing: 0;
}
</style>
<!-- =============================================== -->
<link rel="stylesheet" href="<?php echo base_url(); ?>themes/adminlte/plugins/datatables/dataTables.bootstrap.css">
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
      <!-- Default box -->
      <div class="box">
        
        <div class="box-body table-responsive">
            <div class="page-header clearfix">
                <div class="pull-left"><h2 style="margin-top:0px">Staff List</h2></div>
                <div class="pull-right">
                     <?php echo anchor(site_url('staff/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
                    <a href="#" class="btn btn-danger"><i class="fa fa-print"></i> PDF</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center">
                    <?php if($this->session->userdata('message')!='') { $msg = $this->session->userdata('message');$hide=''; }else {$msg = '';$hide='hide'; }; ?>
                    <div class="alert alert-success <?php echo $hide; ?>" id="message">                    
                        <i class="icon fa fa-check"></i> <?php echo $msg; ?>                     
                    </div>
                </div>
                <div class="col-md-4 text-right"></div>
            </div>
        <table class="table table-bordered table-striped" id="mytable1"">
            <thead>
                <tr>
                    <th width="39">No</th>
			<th width="81">Name</th> 
			<th width="68">Username</th>
		    <th width="38">Email</th>
			<th width="106">Manager Name</th>
		    <th width="80">Designation</th>
		   
		    <th width="48">Mobile</th>
			<th width="80">Department</th>
			<th width="42">Status</th> 
			<th width="72">Last Login</th> 
			<th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($staff_data as $staff)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $staff->sname ?></td>
		    <td><?php echo $staff->username ?></td>
		    <td><?php echo $staff->email ?></td>
		    <td><?php echo $staff->manager ?></td>
		    <td><?php echo $staff->designation ?></td>
		    <td><?php echo $staff->mobile ?></td>
		    <td><?php echo $staff->department ?></td>
		    <td><?php echo (!$staff->banned)?'Active':'Locked'; ?></td>
		    <td><?php echo $staff->last_login ?></td>
		    <td style="text-align:center" width="200">
			<?php 
                        echo '<a href="'.site_url('staff/update/'.$staff->id).'" title="Edit">';
			echo '<i class="fa fa-fw fa-pencil text-success"></i>'; 
                        echo '</a>';
                        echo '<a href="'.site_url('staff/read/'.$staff->id).'" title="Details">';
			echo '<i class="fa fa-fw fa-eye text-warning"></i>'; 
                        echo '</a>';                                              
                        echo '<a href="'.site_url('staff/delete/'.$staff->id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
			echo '<i class="fa fa-fw fa-times text-danger"></i>'; 
                        echo '</a>';			
			?>
                    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
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
  
  
  
		
		
		
   
		
		
  