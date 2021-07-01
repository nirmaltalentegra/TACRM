<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Leads
        <small>Convert Email to Lead</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('leads'); ?>">Leads</a></li>
        <li class="active">Convert Email to Lead</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        
        <div class="box-body table-responsive">

<div role="main" class="right_col" >
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Convert Email to Lead</h3>
            </div>            
        </div>

	<div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                    <?php
                        if(!empty($email_info))
                        {
                            $phone  = $email_info[0][2];
                            $email  = $email_info[1][2];
                            $city   = $email_info[2][2];
                        }
                    ?>
                    <br>
        <table class="table">	    
            <tr><td>Phone</td>         <td><input type="text" class="form-control" style="width:300px;" value="<?php echo $phone; ?>" /></td>  </tr>
	    <tr><td>Email </td>   <td><input type="text" class="form-control" style="width:300px;" value="<?php echo $email; ?>" /></td>   </tr>
            <tr><td>City </td>  <td><input type="text" class="form-control" style="width:300px;" value="<?php echo $city; ?>" /></td>   </tr>            
	</table>
        <a href="<?php echo site_url('leads/email_leads') ?>" class="btn btn-default">Return</a> </td></tr>
        
			
					</div>
				</div> 
			</div>
		</div> 
	</div>
</div>

</div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->