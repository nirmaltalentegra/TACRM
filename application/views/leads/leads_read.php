<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Leads
        <small>Leads Details</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('leads'); ?>">Leads</a></li>
        <li class="active">Leads Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
          
          <div class="row">
        <div class="col-xs-12">
            <div class="row">
              <div class="col-md-4">                  
                  
              </div>  
              <div class="col-md-3">                  
                  <a href="<?php echo base_url('leads'); ?>" class="btn btn-default pull-right" style="margin-top:1em;margin-left:5px;"><i class="fa fa-long-arrow-left" style="font-size: large;"></i> Go Back</a>
                  <a href="<?php echo base_url('leads/update/'.$lead_id); ?>" class="btn btn-default pull-right" style="margin-top:1em;margin-right:5px;"><i class="fa fa-pencil" style="font-size: large;"></i> Edit</a> 
              </div> 
                <div class="col-md-2">                  
                  
              </div> 
              <div class="col-md-3">
                  <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Last Viewed Date</b> <a class="pull-right"><?php echo $last_viewed_date; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Last Viewed Name</b> <a class="pull-right"><?php echo $last_viewed_user; ?></a>
                </li>                
              </ul>
                  <span class="pull-right hide">Last Viewed Date : <?php echo $last_viewed_date; ?><br/> Last Viewed Name : <?php echo $last_viewed_user; ?></span>  
              </div>
          </div>
          <div class="clearfix"><br/></div>
            
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#lead-info" data-toggle="tab" aria-expanded="true">Leads</a></li>
                <li class=""><a href="#activities" data-toggle="tab" aria-expanded="false">Activities</a></li>
                <li class=""><a href="#attachments" data-toggle="tab" aria-expanded="false">Attachments</a></li>
                <li class=""><a href="#email_logs" data-toggle="tab" aria-expanded="false">Email Logs</a></li>
                <li class=""><a href="#sms_logs" data-toggle="tab" aria-expanded="false">SMS Logs</a></li>
                <li class=""><a href="#history" data-toggle="tab" aria-expanded="false">History</a></li>
            </ul>
            <div class="tab-content">
              
              <div class="tab-pane active" id="lead-info">
                  <div class="row">
                        <div class="col-md-12">   
                            <button type="button" class="btn btn-danger pull-right" style="margin-left:5px;" ><i class="fa fa-print"></i> PDF</button>
                            <button type="button" class="btn btn-success pull-right" style="margin-left:5px;" ><i class="fa fa-file-excel-o"></i> Excel</button>
                            <button type="button" class="btn btn-warning pull-right" style="margin-left:5px;" id="btn_conv_oppty"> Convert Opportunity</button>
                        </div>                      
                  </div>
                  <h4 class="page-header">Lead Info</h4>
                 
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Source</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo $source; ?>           
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Assigned To</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                      <?php echo $assigned; ?>            
                </div>
            </div>
        </div>
    </div> 
    <div class="clearfix"><br/></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Customer Type</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $cust_type; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group hide" id="div_comp_name">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="varchar">Company Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                     <?php echo $comp_name; ?>            
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <h4 class="page-header">Contact Info</h4>		
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">First Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $first_name; ?>                    
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Last Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $last_name; ?>
                </div>
            </div>
        </div>
    </div> 
    <div class="clearfix"><br/></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $mobile; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Email</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <?php echo $email; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Alt Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $alt_mobile; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Address Line 1</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $address_1; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">City</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $city; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Address Line 2</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $address_2; ?>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Zipcode</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $zipcode; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <h4 class="page-header">Other Info</h4>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Reference Name</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $ref_name; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Reference Mobile</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $ref_mobile; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Status</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $status; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">            
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo (($status_id == 6)?'':'hide')?>">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Lost Reason</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $lost_status; ?>
                </div>                
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo (($status_id == 6)?'':'hide')?>">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Lost Remark</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?php echo $lost_remark; ?>
                </div>                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" id="div_enquiry_type">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Enquiry Type</label>
                <div class="col-md-6 col-sm-6 col-xs-12" >                    
                    <?php echo $enquiry_status; ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 <?php echo (($enquiry_type > 0)?'':'hide')?>" id="div_enquiry_note">
            <div class=" form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="int">Enquiry Remarks</label>
                <div class="col-md-6 col-sm-6 col-xs-12">                      
                    <?php echo $enquiry_note; ?>                    
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"><br/></div>
    <h4 class="page-header">Details</h4>
    <div class=" form-group">                 
        <div class="col-md-12 col-sm-12 col-xs-12">
           <?php echo $comments; ?>
        </div>
    </div>  
    <div class="clearfix"><br/></div>
</div>
<div class="tab-pane" id="activities">

<div class="row">
                        <div class="col-md-12">   
                            <button type="button" class="btn btn-submit" style="margin-left:5px;" id="btn_add_task"><i class="fa fa-print"></i> Add Task</button>
                            <button type="button" class="btn btn-submit" style="margin-left:5px;" id="btn_add_note"><i class="fa fa-file-excel-o"></i> Add Note</button>
                            
							
                        </div>                      
                  </div>
                
	
	  <!-- Default box -->
      <div class="box">        
        <div class="box-body table-responsive">
     
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                 <?php if($this->session->userdata('task_message')!='') { $msg = $this->session->userdata('task_message');$hide=''; }else {$msg = '';$hide='hide'; }; ?>
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
		    <th>Created Date</th>
                    <th>Task Type</th>
                    <th>Details</th>
                    <th>Task Cateogory</th>
                    <th>Staff</th>
                    <th>Remarks</th>
                   	<th>Status</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php 
            $date_format                =   $this->arbac->get_system_var("date_format");
            $time_format                =   $this->arbac->get_system_var("time_format");
            if(!empty($tasks_list))
            {
                foreach($tasks_list as $key=> $task)
                {
                    echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.date($date_format,strtotime($task->created)).'</td>
                        <td>'.get_status_name($task->task_type).'</td>
                        <td>'.$task->task_description.'</td>
                        <td>'.get_status_name($task->task_category_id).'</td>
                        <td>'.$task->assigned_staff.'</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';
                }
            }
            if(!empty($note_list))
            {
                foreach($note_list as $key=> $note)
                {
                    echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.date($date_format,strtotime($note->created)).'</td>
                        <td>'.get_status_name($note->task_type).'</td>
                        <td>'.$note->task_description.'</td>
                        <td>'.get_status_name($note->task_category_id).'</td>
                        <td>'.$note->assigned_staff.'</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>';
                }
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
	
	

	
	
		  <!-- Default box -->
      <div class="box">        
        <div class="box-body table-responsive">
      <button type="button" class="btn btn-warning pull-right" style="margin-left:5px;" id="btn_add_followup">Add Followup</button>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                 <?php if($this->session->userdata('fup_message')!='') { $msg = $this->session->userdata('fup_message');$hide=''; }else {$msg = '';$hide='hide'; }; ?>
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
		    <th>Date</th>
                    <th>Next Followup Date</th>
                    <th>Followup By</th>
                    <th>Comments</th>
                    <th>Cusomter Response</th>
                    <th>Interest Level </th>
		    <th>Followup Action</th>		    
		    <th>Followup Mode</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
                <?php 
            if(!empty($fup_list))
            {
                foreach($fup_list as $key=> $fup)
                {
                    echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.date($date_format,strtotime($fup->created)).'</td>
                        <td>'.date($date_format.' '.$time_format,strtotime($fup->followup_date)).'</td>
                        <td>'.$fup->assigned_staff.'</td>
                        <td>'.$fup->followup_comments.'</td>
                        <td>'.get_status_name($fup->customer_response).'</td>
                        <td>'.get_status_name($fup->interest_level).'</td>
                        <td>'.get_status_name($fup->followup_action).'</td>
                        <td>'.get_status_name($fup->followup_mode).'</td>
                        <td></td>
                    </tr>';
                }
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
	
	
		  <!-- Default box -->
      <div class="box">        
        <div class="box-body table-responsive">
       <button type="button" class="btn btn-warning pull-right" style="margin-left:5px;" id="btn_add_visit">Add Visit</button>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4"></div>
            <div class="col-md-4 text-center">
                 <?php if($this->session->userdata('visit_message')!='') { $msg = $this->session->userdata('visit_message');$hide=''; }else {$msg = '';$hide='hide'; }; ?>
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
		    <th>Date</th>
                    <th>Staff</th>
                    <th>Comments</th>
                    <th>Purpose</th>
                    <th>Status</th>        
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
                <?php 
                if(!empty($visit_list))
                {
                    foreach($visit_list as $key=> $visit)
                    {
                        echo '<tr>
                            <td>'.($key+1).'</td>
                            <td>'.date($date_format.' '.$time_format,strtotime($visit->remind_time.' '.$visit->visit_time)).'</td>
                            <td>'.$visit->staff_name.'</td>
                            <td>'.$visit->task_description.'</td>
                            <td>'.get_status_name($visit->task_category_id).'</td>
                            <td> '.get_status_name($visit->status_id).' </td>
                            <td>
                            <button type="button" class="btn btn-default btn-xs" title="Edit"><i class="fa fa-fw fa-pencil text-success"></i></button>
                            <button type="button" class="btn btn-default btn-xs" title="Status Change" onclick="update_status('.$visit->task_id.')" ><i class="fa fa-fw fa-check text-warning"></i></button>
                            <button type="button" class="btn btn-default btn-xs" title="Delete" onclick="javasciprt: return confirm("Are You Sure ?")"><i class="fa fa-fw fa-times text-danger"></i></button></td>                            
                        </tr>';
                    }
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

</div> 
<div class="tab-pane" id="attachments">
</div>
<div class="tab-pane" id="email_logs">
</div>
<div class="tab-pane" id="sms_logs">
</div>
<div class="tab-pane" id="history">
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
                    <th>Logged On</th>		    
                </tr>
            </thead>
            <tbody>
            <?php
                $date_format                =   $this->arbac->get_system_var("date_format");
                $time_format                =   $this->arbac->get_system_var("time_format");
                $currency                   =   $this->arbac->get_system_var("default_currency");
                $position                   =   $this->arbac->get_system_var("currency_position");

                $start = 0;
                foreach ($history as $leads)
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
                        <td><?php echo date($date_format.' '.$time_format,strtotime($leads->revised_dts)) ?></td>                        
                    </tr>
                    <?php
                }
            ?>
            </tbody> 
    </table>
</div>

              
              
              

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  
  
  
  
  
  
  
  
  <!-- Modal -->
<div class="modal fade" id="new_task_modal" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Task</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="<?php echo base_url().'leads/add_task'; ?>" method="post" id="frm_add_task">
                    <input type="hidden" class="form-control" name="task_lead_id" id="task_lead_id" value="<?php echo $lead_id; ?>"  />                  
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Details<span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                               <textarea class="form-control col-md-7 col-xs-12" rows="3" name="task_details" id="task_detail" placeholder="Details"><?php echo ''; ?></textarea>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Task Type <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="task_type" id="task_type" class="form-control">
                                <option value="">Select Task Type</option>
                                <?php
                                foreach ($task_type as $ttype) {
                                    
                                    echo '<option value="' . $ttype['status_id'] . '" >' . $ttype['status'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Task Category <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="task_category" id="task_category" class="form-control">
                                <option value="">Select Task Category</option>
                                <?php
                                foreach ($task_category as $tcat) {
                                    
                                    echo '<option value="' . $tcat['status_id'] . '" >' . $tcat['status'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Assigned to <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="task_staff_id" id="task_staff_id" class="form-control">
                                <option value="">Select Staff</option>
                                <?php
                                foreach ($staff_data as $staff) {                                    
                                    echo '<option value="' . $staff['staff_id'] . '" >' . $staff['staff_name'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>					
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Due Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control pull-right choosedate" name="due_date" id="due_date" readonly value="" data-date-format="dd-mm-yyyy" data-error-containers="#due_date_error" />                           
                        </div>
                        <span id="due_date_error"></span>
                    </div> 
                    <div class="form-group">
                    <label class="col-sm-4" for="varchar"> Due Time <span class="text-danger">*</span> </label>
                    <div class="col-sm-6">
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="due_time" name="due_time" type="text" class="form-control input-small"  value="<?php echo date('h:i A');?>" data-error-containers="#due_time_error">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                    <span id="due_time_error"></span>
                </div>
                    <button type="submit" class="btn btn-info" id="btn_create_task">Add Task</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  
   <!-- Add task Modal end -->
  
  
   <!--Add Visit Modal -->
  
  
  
<div class="modal fade" id="new_visit_modal" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Visit</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="<?php echo base_url().'leads/add_visit'; ?>" method="post" id="frm_add_visit">
                    <input type="hidden" class="form-control" name="visit_lead_id" id="visit_lead_id" value="<?php echo $lead_id; ?>"  />
                    
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar">Visit Details<span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <textarea class="form-control col-md-7 col-xs-12" rows="3" name="visit_details" id="visit_details" placeholder="Details"><?php echo ''; ?></textarea>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Purpose of Visit <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="visit_purpose" id="visit_purpose" class="form-control">
                                <option value="">Select Purpose</option>
                                <?php
                                foreach ($task_category as $tcat) {
                                    
                                    echo '<option value="' . $tcat['status_id'] . '" >' . $tcat['status'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>
                   
                <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Visit Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                                <input type="text" class="form-control pull-right choosedate" name="visit_date" id="visit_date" readonly value="" data-date-format="dd-mm-yyyy" data-error-containers="#visit_date_error" />                           
                        </div>
                        
                        <span id="exp_date_error"></span>
                </div>
                <div class="form-group">
                    <label class="col-sm-4" for="varchar"> Visit Time <span class="text-danger">*</span> </label>
                    <div class="col-sm-6">
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="visit_time" name="visit_time" type="text" class="form-control input-small"  value="<?php echo date('h:i A');?>" data-error-containers="#visit_time_error">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                    <span id="visit_time_error"></span>
                </div>                  
                <button type="submit" class="btn btn-info" id="btn_create_visit">Save</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  


<!-- add visit modal end -->  
  
  <!--add note modal -->
  
  <div class="modal fade" id="new_note_modal" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Note</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="<?php echo base_url().'leads/add_note'; ?>" method="post" id="frm_add_note">
                    <input type="hidden" class="form-control" name="note_lead_id" id="note_lead_id" value="<?php echo $lead_id; ?>"  />                    
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Note<span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <textarea class="form-control col-md-7 col-xs-12" rows="3" name="note_details" id="notedetail" placeholder="Details"><?php echo ''; ?></textarea>                        
                        </div>
                    </div>            
                    <button type="submit" class="btn btn-info" id="btn_create_note">Save</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  

<!-- Add note modal end -->
  
  
  
  
  
  
  
   <!--add followup modal -->
  
  <div class="modal fade" id="new_followup_modal" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Followup</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="<?php echo base_url().'leads/add_followup'; ?>" method="post" id="frm_add_followup">
                    <input type="hidden" class="form-control" name="fup_lead_id" id="fup_lead_id" value="<?php echo $lead_id; ?>"  />
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Interest Level <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="interest_level" id="interest_level" class="form-control">
                                <option value="">Select Interest</option>
                                <?php
                                foreach ($int_level as $level) {
                                    
                                    echo '<option value="' . $level['status_id'] . '" >' . $level['status'] . "</option>";
                                }
                                ?>                                
                            </select>                           
                        </div>
                    </div>	  
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Customer Response <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="cust_response" id="cust_response" class="form-control">
                                <option value="">Select Response</option>
                                <?php
                                foreach ($response_list as $resp) {
                                    
                                    echo '<option value="' . $resp['status_id'] . '" >' . $resp['status'] . "</option>";
                                }
                                ?>  
                            </select>                           
                        </div>
                    </div>	
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Followup Action <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="fup_action" id="fup_action" class="form-control">
                                <option value="">Select Followup Action</option>
                                <?php
                                foreach ($fup_action_list as $actionlist) {
                                    
                                    echo '<option value="' . $actionlist['status_id'] . '" >' . $actionlist['status'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>		
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar">Followup Mode <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="fup_mode" id="fup_mode" class="form-control">
                                <option value="">Select Mode</option>
                                <?php
                                foreach ($fup_mode_list as $modelist) {
                                    
                                    echo '<option value="' . $modelist['status_id'] . '" >' . $modelist['status'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>					
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Followup Details<span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <textarea class="form-control col-md-7 col-xs-12" rows="3" name="followup_details" id="followup_details" placeholder="Details"><?php echo ''; ?></textarea>                        
                        </div>
                    </div>					
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Next Followup Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control pull-right choosedate" name="next_fup_date" id="next_fup_date" readonly value="" data-date-format="dd-mm-yyyy" data-error-containers="#next_fup_date_error" />                           
                        </div>
                        <span id="next_fup_date_error"></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Next Followup Date Time <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="next_fup_time" name="next_fup_time" type="text" class="form-control input-small"  value="<?php echo date('h:i A');?>" data-error-containers="#next_fup_time_error">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            </div>
                        </div>
                        <span id="next_fup_time_error"></span>
                    </div>                                        
                    <button type="submit" class="btn btn-info" id="btn_create_fup">Save</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  

<!-- add follow up end->
  
<!--add visit status modal -->  
  <div class="modal fade" id="new_visitstatus_modal" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Visit Status</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="<?php echo base_url().'leads/update_visit'; ?>" method="post" id="frm_upd_visit">
                    <input type="hidden" class="form-control" name="upd_visit_id" id="upd_visit_id" value=""  />
                    <input type="hidden" class="form-control" name="upd_visit_lead_id" id="upd_visit_lead_id" value="<?php echo $lead_id; ?>"  />
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar">Status <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="upd_visit_status" id="upd_visit_status" class="form-control" >
                                <option value="">Select Status </option>
                                <?php
                                    foreach ($task_status as $status) {
                                        $selected = (($status['status_id'] == 81)?'selected':'');
                                        echo '<option value="' . $status['status_id'] . '" '.$selected.' >' . $status['status'] . "</option>";
                                    }
                                ?>
                            </select>                           
                        </div>
                    </div>				
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Remarks <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <textarea class="form-control col-md-7 col-xs-12" rows="3" name="upd_visit_remarks" id="upd_visit_remarks" placeholder="comments"></textarea>                        
                        </div>
                    </div>					
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar">  Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control pull-right choosedate" name="upd_status_date" id="upd_status_date" readonly value="" data-date-format="dd-mm-yyyy" data-error-containers="#upd_status_date_error" />                           
                        </div>
                        <span id="upd_status_date_error"></span>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar">  Time <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="upd_status_time" name="upd_status_time" type="text" class="form-control input-small"  value="<?php echo date('h:i A');?>" data-error-containers="#upd_status_time_error">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            </div>
                        </div>
                        <span id="upd_status_time_error"></span>
                    </div>                                        
                    <button type="submit" class="btn btn-info" id="btn_update_visit">Save</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>  

<!-- add visit status end->
  

  <!-- Modal -->
<div class="modal fade" id="new_cust_modal" role="dialog">
    <div class="modal-dialog">        
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Convert Opportunity</h4>
            </div>
            <div class="modal-body">
                <div class="alert hide" id="msg-pass"> </div>
                <form class="form-horizontal" action="<?php echo base_url().'leads/convert_opportunity'; ?>" method="post" id="frm_conv_oppty">
                    <input type="hidden" class="form-control" name="lead_id" id="lead_id" value="<?php echo $lead_id; ?>"  />
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Opportunity Name <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="opportunity" id="opportunity" placeholder="Opportunity Name"  />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Expected Revenue Amount<span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="expected_revenue" id="expected_revenue" placeholder="Expected Revenue"  />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Stage <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <select name="stages_id" id="stages_id" class="form-control">
                                <option value="">Select Stage</option>
                                <?php
                                foreach ($stages_data as $stage) {
                                    $stage_selected = "";
                                    if ($stages_id == $stage['stages_id']) {
                                        $stage_selected = "selected";
                                    }
                                    echo '<option value="' . $stage['stages_id'] . '"' . $stage_selected . ' >' . $stage['name'] . "</option>";
                                }
                                ?>
                            </select>                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Next Action <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="next_action_title" id="next_action_title" placeholder="Next Action Title"  />                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4" for="varchar"> Closing Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control pull-right choosedate" name="expected_closing" id="expected_closing" readonly value="" data-date-format="dd-mm-yyyy" data-error-containers="#exp_date_error" />                           
                        </div>
                        <span id="exp_date_error"></span>
                    </div>
                                        
                    <button type="submit" class="btn btn-info" id="btn_create_cust">Convert</button>
                </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
$( document ).ready(function() {  
    
    $('#visit_time,#due_time,#next_fup_time,#upd_status_time').timepicker();  
    
    // Javascript to enable link to tab
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    } 

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })

     //Date picker
    $('.choosedate').datepicker({        
        todayHighlight: true, 
        autoclose: true
    })    
    
    var form1 = $('#frm_conv_oppty');  
    var validator = form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            opportunity: {
                                                    required: true
                                                    },
            expected_revenue: {
                                                    required: true
                                                    },
            stages_id: {
                                                    required: true
                                                    },
            next_action_title: {
                                                    required: true
                                                    },
            expected_closing: {
                                                    required: true
                                                    }	        
            },
            messages: {
            },
            highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                error.insertAfter("#form_gender_error");
            } 
            else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            }
            else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
                form.submit();              
        }
    });
    
    var form2 = $('#frm_add_task');  
    var validator2 = form2.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            task_details: {
                                    required: true
                                    },
            task_type: {
                                    required: true
                                    },
            task_staff_id: {
                                    required: true
                                    },
            task_category: {
                                    required: true
                                    },
            due_date: {
                                    required: true
                                    },
            due_time: {
                                    required: true
                                    }
            },
            messages: {
            },
            highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                error.insertAfter("#form_gender_error");
            } 
            else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            }
            else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
                form.submit();              
        }
    });
    
    var form3 = $('#frm_add_followup');  
    var validator3 = form3.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            interest_level: {
                                    required: true
                                    },
            cust_response: {
                                    required: true
                                    },
            fup_action: {
                                    required: true
                                    },
            fup_mode: {
                                    required: true
                                    },
            followup_details: {
                                    required: true
                                    },
            next_fup_date: {
                                    required: true
                                    }
            },
            messages: {
            },
            highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                error.insertAfter("#form_gender_error");
            } 
            else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            }
            else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
                form.submit();              
        }
    });
    
    var form4 = $('#frm_add_visit');  
    var validator4 = form4.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            visit_details: {
                                    required: true
                                    },
            visit_purpose: {
                                    required: true
                                    },
            visit_date: {
                                    required: true
                                    },
            visit_time: {
                                    required: true
                                    }                   
            },
            messages: {
            },
            highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                error.insertAfter("#form_gender_error");
            } 
            else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            }
            else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
                form.submit();              
        }
    });
    
    var form5 = $('#frm_add_note');  
    var validator5 = form5.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            note_details: {
                            required: true
                            }           
            },
            messages: {
            },
            highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                error.insertAfter("#form_gender_error");
            } 
            else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            }
            else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
                form.submit();              
        }
    });
    
    var form6 = $('#frm_upd_visit');  
    var validator6 = form6.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            upd_visit_status: {
                            required: true
                            },
            upd_status_date: {
                            required: true
                            } 
            },
            messages: {
            },
            highlight: function(element) { // hightlight error inputs
            $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
        },
        errorPlacement: function (error, element) { // render error placement for each input type
            if (element.attr("name") == "gender") { // for uniform radio buttons, insert the after the given container
                error.insertAfter("#form_gender_error");
            } 
            else if (element.attr("data-error-container")) { 
                error.appendTo(element.attr("data-error-container"));
            }
            else {
                error.insertAfter(element); // for other inputs, just perform default behavior
            }
        },
        unhighlight: function(element) { // revert the change done by hightlight
            $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group

        },
        success: function(label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function(form) {
                form.submit();              
        }
    });
    
    
    
    $( "#visit_date" ).change(function() {
        $( "#visit_date" ).valid();
    });
        
    $('#btn_conv_oppty').click(function (e)  
    {
        $('#frm_conv_oppty')[0].reset();
        $('#new_cust_modal').modal('show');
        $('#frm_conv_oppty .form-group').removeClass('has-error');
        validator.resetForm();
    });	
	
    $('#btn_add_task').click(function (e)  
    {
        $('#frm_add_task')[0].reset();
        $('#new_task_modal').modal('show');
        $('#frm_add_task .form-group').removeClass('has-error');
        validator2.resetForm();
    });	
	
    $('#btn_add_note').click(function (e)  
    {
        $('#frm_add_note')[0].reset();
        $('#new_note_modal').modal('show');
        $('#frm_add_note .form-group').removeClass('has-error');
        validator5.resetForm();
    });	
	
    $('#btn_add_visit').click(function (e)  
    {
        $('#frm_add_visit')[0].reset();
        $('#new_visit_modal').modal('show');
        $('#frm_add_visit .form-group').removeClass('has-error');
        validator4.resetForm();
    });	
	
    $('#btn_add_followup').click(function (e)  
    {
        $('#frm_add_followup')[0].reset();
        $('#new_followup_modal').modal('show');
        $('#frm_add_followup .form-group').removeClass('has-error');
        validator3.resetForm();
    });
}); 

function update_status(visit_id)
{
    $('#upd_visit_id').val(visit_id)
    $('#new_visitstatus_modal').modal('show');
}
</script>