<!-- =============================================== -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Leads
        <small>Leads List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('leads'); ?>">Leads</a></li>
        <li class="active">Leads List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">        
        <div class="box-body table-responsive">
        <div class="page-header clearfix">
            <div class="pull-left"><h2 style="margin-top:0px">Leads List</h2></div>
            <div class="pull-right">
                <?php echo anchor(site_url('leads/create'), 'Create', 'class="btn btn-primary"'); ?>
                <?php echo anchor('leads#', '<i class="fa fa-print"></i> PDF', 'class="btn btn-danger"'); ?>
                <?php echo anchor('leads/download_list_excel', '<i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-success"'); ?>
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
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>		    
                    <th>Lead Details</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Assigned to</th>
		    <th>Source</th>		    
		    <th>Status</th>
                    <th>Created On</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $date_format                =   $this->arbac->get_system_var("date_format");
            $time_format                =   $this->arbac->get_system_var("time_format");
            $currency                   =   $this->arbac->get_system_var("default_currency");
            $position                   =   $this->arbac->get_system_var("currency_position");
            
            $start = 0;
            foreach ($leads_data as $leads)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>		    
                    <td><?php echo $leads->comments ?></td>
                    <td><?php echo $leads->first_name.' '.$leads->last_name ?></td>
                    <td><?php echo $leads->email ?></td>
                    <td><?php echo $leads->mobile ?></td>
                    <td><?php echo $leads->assigned_staff ?></td>                    
		    <td><?php echo $leads->source_details ?></td>
		    <td><?php echo $leads->status_name ?></td>
                    <td><?php echo date($date_format.' '.$time_format,strtotime($leads->created)) ?></td>
		    <td style="text-align:center" width="200px">
                    <?php 
                        echo '<a href="'.site_url('leads/update/'.$leads->lead_id).'" title="Edit">';
			echo '<i class="fa fa-fw fa-pencil text-success"></i>'; 
                        echo '</a>';
                        echo '<a href="'.site_url('leads/read/'.$leads->lead_id).'" title="Details">';
			echo '<i class="fa fa-fw fa-eye text-warning"></i>'; 
                        echo '</a>';                                               
                        echo '<a href="'.site_url('leads/delete/'.$leads->lead_id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
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
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	 
	<style>
	.table-responsive{min-height:.01%;overflow-x:auto}
	</style> 