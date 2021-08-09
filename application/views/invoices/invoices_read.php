<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Invoices <small>-Detail list of Invoices</small></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    Invoice
                </div>
            </div>
        </div>
        <?php
        $user_data = get_user_details($this->session->userdata('id'));

        ?>


        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Invoices</h4>
                        </div>
                        <div class="card-body">


                            <table class="table">

                                <tr>
                                    <td>Order No</td>
                                    <td><?php echo $order_no; ?></td>
                                </tr>
                                <tr>
                                    <td>Customer</td>
                                    <td><?php echo $customer_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td><?php echo $subject; ?></td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td><?php echo $description; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Qty</td>
                                    <td><?php echo $total_qty; ?></td>
                                </tr>
                                <tr>
                                    <td>Total Amt</td>
                                    <td><?php echo $total_amt; ?></td>
                                </tr>
                                <tr>
                                    <td>Paid</td>
                                    <td><?php echo $paid; ?></td>
                                </tr>
                                <tr>
                                    <td>Balance</td>
                                    <td><?php echo $balance; ?></td>
                                </tr>
                                <tr>
                                    <td>Refunded</td>
                                    <td><?php echo $refunded; ?></td>
                                </tr>
                                <tr>
                                    <td>Terms</td>
                                    <td><?php echo $terms; ?></td>
                                </tr>
                                <tr>
                                    <td>Due Date</td>
                                    <td><?php echo $due_date; ?></td>
                                </tr>

                                <tr>
                                    <td>Created At</td>
                                    <td><?php echo $created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td><?php echo $updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?php echo $status; ?></td>
                                </tr>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="form-group">


                                <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('invoices/'); ?>';">Cancel</button>


                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>