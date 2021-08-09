<?php
defined('BASEPATH') or exit('No direct script access allowed');
//$this->load->view('_layout/siteheader');

?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        
		
		<div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
			<?php foreach($invoices as $nt) { ?>
            <div class="col-lg-12">
			  <div class="row">
					<div class="col-md-6">
						<address>
							<strong>Invoice From:</strong><br>
							<?php echo $nt->invoice_from; ?>
						</address>
						<address>
							<strong><?php echo $nt->invoice_to_label; ?>:</strong><br>
							<?php echo $nt->invoice_to; ?>
						</address>
						<div class="row">
							<div class="col-md-6">
								<strong><?php echo $nt->invoice_notes_label; ?>:</strong><br>
								<?php echo $nt->invoice_notes; ?>
							</div>
							<div class="col-md-6">
								<strong><?php echo $nt->invoice_terms_label; ?>:</strong><br>
								<?php echo $nt->invoice_terms; ?>
							</div>
						</div><br/><br/>
					</div>
					<div class="col-md-6 text-md-right">
						<address>
							<strong><?php echo $nt->invoice_ship_label; ?>:</strong><br>
							<?php echo $nt->invoice_ship; ?>
						</address>
						<address>
							<strong><?php echo $nt->invoice_payment_terms_label; ?>:</strong><br>
							<?php echo $nt->invoice_payment_terms; ?>
						</address>
						<address>
							<strong>Status:</strong><br>
							<?php if($nt->invoice_status=='1'){ echo "Active"; } else { echo "Inactive"; } ?>
						</address>
					</div>
				</div>
              <div class="row">
                <div class="col-md-6 text-md-right">
					<address>
						<strong><?php echo $nt->invoice_date_label; ?>:</strong><br>
						<?php echo date('d/m/Y',strtotime($nt->invoice_date)); ?><br>
					</address>
					<address>
						<strong><?php echo $nt->invoice_due_date_label; ?>:</strong><br>
						<?php echo date('d/m/Y',strtotime($nt->invoice_due_date)); ?>
					</address>
                </div>
              </div>
            </div>
			<?php } ?>
          </div>

			<div class="row mt-4">
				<div class="col-md-12">
					<div class="section-title">Order Summary</div>
					<p class="section-lead">All items here cannot be deleted.</p>
					<div class="table-responsive">
						<table class="table table-striped table-hover table-md">
							<tbody>
								<tr>
									<th data-width="40" style="width: 40px;">#</th>
									<th>Item</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Price</th>
									<th class="text-right">Total</th>
								</tr>
								<?php
									$i=1;
									foreach($invoices_items as $row)
									{
										echo '<tr>';
											echo '<td>'.$i.'</td>';
											echo '<td>'.$row->invoice_item.'</td>';
											echo '<td class="text-right">'.$row->invoice_qty.'</td>';
											echo '<td class="text-right">$'.$row->invoice_rate.'</td>';
											echo '<td class="text-right">$'.($row->invoice_qty*$row->invoice_rate).'</td>';
										echo '</tr>';
										$i++;
									}
								?>
							</tbody>
						</table>
					</div>
              <div class="row mt-4">
                <div class="col-lg-4 text-right">
					<?php
						foreach($invoices as $nt)
						{
							echo '<div class="invoice-detail-item">';
								echo '<div class="invoice-detail-name">'.$nt->invoice_subtotal_label.'</div>';
								echo '<div class="invoice-detail-value">$'.$nt->invoice_subtotal.'</div>';
							echo '</div>';
							
							echo '<div class="row">';
							if($nt->invoice_tax>0)
							{
								echo '<div class="col-md-4">';
									echo '<div class="invoice-detail-item">';
										echo '<div class="invoice-detail-name">'.$nt->invoice_tax_label.'</div>';
										echo '<div class="invoice-detail-value">$'.$nt->invoice_tax.'</div>';
									echo '</div>';
								echo '</div>';
							}
							
							if($nt->invoice_discount>0)
							{
								echo '<div class="col-md-4">';
									echo '<div class="invoice-detail-item">';
										echo '<div class="invoice-detail-name">'.$nt->invoice_discount_label.'</div>';
										echo '<div class="invoice-detail-value">$'.$nt->invoice_discount.'</div>';
									echo '</div>';
								echo '</div>';
							}
							
							if($nt->invoice_shipping>0)
							{
								echo '<div class="col-md-4">';
									echo '<div class="invoice-detail-item">';
										echo '<div class="invoice-detail-name">'.$nt->invoice_shipping_label.'</div>';
										echo '<div class="invoice-detail-value">$'.$nt->invoice_tax.'</div>';
									echo '</div>';
								echo '</div>';
							}
							echo '</div>';
							
							echo '<hr class="mt-2 mb-2">';
							echo '<div class="invoice-detail-item">';
								echo '<div class="invoice-detail-name">'.$nt->invoice_total_label.'</div>';
								echo '<div class="invoice-detail-value">$'.$nt->invoice_total.'</div>';
							echo '</div>';
							
							if($nt->invoice_amountpaid>0)
							{
								echo '<div class="invoice-detail-item">';
									echo '<div class="invoice-detail-name">'.$nt->invoice_amountpaid_label.'</div>';
									echo '<div class="invoice-detail-value">$'.$nt->invoice_amountpaid.'</div>';
								echo '</div>';
							}
							
							echo '<div class="invoice-detail-item">';
								echo '<div class="invoice-detail-name">'.$nt->invoice_balance_due_label.'</div>';
								echo '<div class="invoice-detail-value">$'.$nt->invoice_balance_due.'</div>';
							echo '</div>';
						}
					?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </section>
</div> <!-- Main content -->
<?php //$this->load->view('_layout/footer'); ?>