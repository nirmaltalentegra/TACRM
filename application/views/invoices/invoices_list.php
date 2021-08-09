<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoices List</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="dashboard">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href=Invoices>Invoices</a>
                </div>
                <div class="breadcrumb-item">
                    Invoices List
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Invoices List</h4>
                    </div>
                    <div class="pull-right">
                        <?php echo anchor(site_url('invoices/create'), '<i class="fa fa-plus"></i> Create', 'class="btn btn-primary"'); ?>
                        <a href="\#" class="btn btn-danger"><i class="fa fa-print"></i> PDF</a>
                        <a href="#" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Excel</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <!--<th>Created At</th>-->
                                        <!--<th>Default Email Id</th>-->
                                        <!--<th>Default Mobile No</th>-->
                                        <th>Order No</th>
                                        <th>Customer</th>
                                        <th>Ship</th>
                                        <th>Description</th>
                                        <th>Sub Total</th>
                                        <th>Total Amt</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                        <th>Terms</th>
                                        <th>Due Date</th>
                                        <th>Created At</th>
                                        <!-- <th>Updated At</th> -->
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start = 0;
                                    foreach ($data as $invoices) {
                                    ?>
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                    <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <!-- <td><?php //echo $c->name 
                                                        ?></td> -->
                                            <td><?php echo $invoices->id ?></td>
                                            <td><?php echo $invoices->invoice_to ?></td>
                                            <td><?php echo $invoices->invoice_ship ?></td>
                                            <td><?php echo $invoices->invoice_notes ?></td>
                                            <td><?php echo $invoices->invoice_subtotal ?></td>
                                            <td><?php echo $invoices->invoice_total ?></td>
                                            <td><?php echo $invoices->invoice_amountpaid ?></td>
                                            <td><?php echo $invoices->invoice_balance_due ?></td>
                                            <td><?php echo $invoices->invoice_terms ?></td>
                                            <td><?php echo date('d/m/Y',strtotime($invoices->invoice_due_date)) ?></td>
                                            <td><?php echo date('d/m/Y',strtotime($invoices->invoice_date)) ?></td>

                                            <!--<td><?php echo $invoices->updated_at ?></td>-->
                                            <td><?php if ($invoices->invoice_status == 1) echo "Active";
                                                else echo "Inactive"; ?></td>

                                            <td style="text-align:center" width="200px">
											<div class="dropdown d-inline">
								<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  Actions
								</button>
								<div class="dropdown-menu">
								<?php 
								 echo '<a class="dropdown-item has-icon"  href="'.site_url('invoices/read/' . $invoices->id).'" title="Details">';
									echo '<i class="fas fa-info-circle"></i>Read</i>'; 
												echo '</a>';    
												echo '<a class="dropdown-item has-icon"  href="'.site_url('invoices/update/' . $invoices->id).'" title="Update">';
									echo '<i class="far fa-edit"></i> Update'; 
												echo '</a>';
												echo '<a class="dropdown-item has-icon"  href="'.site_url('invoices/delete/' . $invoices->id).'" title="Delete" onclick="javasciprt: return confirm(\'Are You Sure ?\')">';
									echo ' <i class="fas fa-times"></i> Delete'; 
												echo '</a>';			
										echo '<a class="dropdown-item has-icon"  href="'.site_url('invoices/send_email_verification/' . $invoices->id).'" title="Send Verification Email">';
									echo '  <i class="fas fa-envelope-square"></i> Send Verification Email'; 
												echo '</a>';			
										echo '<a class="dropdown-item has-icon"  href="'.site_url('invoices/invoice_view/' . $invoices->id).'" title="print">';
									echo ' <i class="fas fa-print"></i>Print'; 
												echo '</a>';			
											?>
								</div>
						  </div> 
						  
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
<?php $this->load->view('_layout/sitefooter'); ?>