<!-- =============================================== -->
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Leads
        <small>Email Leads List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('leads'); ?>">Leads</a></li>
        <li class="active">Email Leads List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">        
        <div class="box-body table-responsive">
        <div class="page-header clearfix">
            <div class="pull-left"><h2 style="margin-top:0px">Email Leads List</h2></div>
            <div class="pull-right">
                <?php echo anchor('leads/refresh_emails', '<i class="fa fa-refresh"></i> Refresh', 'class="btn btn-primary"'); ?>
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
        <table class="table table-bordered table-striped" id="mytable1">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th style="width:15%;">Subject </th>
                    <th style="width:10%;">From</th>                    
                    <th style="width:15%;">Email</th>
                    <th style="width:15%;">Date</th>
                    <th style="width:30%;">Message</th>
		    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
                $date_format                =   $this->arbac->get_system_var("date_format");
                $start = 0;
                foreach ($leads_data as $leads)
                {
                    $body = htmlspecialchars_decode($leads->message); 
                    $body = strip_tags($body);
                    $body = substr($body,0,155);
                    ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $leads->subject ?></td>
                        <td><?php echo $leads->from_name ?></td>                    
                        <td><?php echo $leads->email ?></td>
                        <td><?php echo $leads->date ?></td>
                        <td><?php echo $body ?></td>                    
                        <td><?php echo date($date_format,strtotime($leads->created_dts)) ?></td> 
                        <td> <a href="<?php echo base_url('leads/conv_email/'.$leads->id);?>" class="btn btn-xs btn-danger"><i class="fa fa-check"></i> Convert</a></td>
                    </tr>
                    <?php
                    //echo htmlspecialchars_decode($leads->message).'<br/>';break;
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