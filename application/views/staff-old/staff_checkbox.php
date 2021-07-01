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
      <div class="callout callout-info">
        <h4>Tip!</h4>

       
      </div>
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Staff List</h3>
		  

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
      


	  <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Staff List</h2>
				
            </div>
            
			
            
        </div>
        <table class="table table-bordered table-striped" id="mytable1">
            <thead>
                <tr>
                    <th width="39">No</th>
			<th width="81">Check Box</th> 
			<th width="68">Username</th>
		    <th width="38">Email</th>
			
                </tr>
            </thead>
	    <tbody>
           
                <tr>
		    <td>1</td>
		    <td> <label class="checkbox">
                <input type="checkbox" name="islocked" value="1" <?php if ($banned == 1) { ?> checked="" <?php } ?>/>
                Locked            </label></td>
		    <td>test</td>
		    <td>test</td>
		    
	        </tr>
               
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
  
  
  
		
		
		
   
		
		
  