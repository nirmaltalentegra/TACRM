<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customers <small>-Detail list of Customers</small></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="#">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    Users
                </div>
            </div>
        </div>
        <?php
        if($prefix == 0) {
			$prefix = "Mrs.";
		}
		else if($prefix == 1) {
			$prefix = "Mr.";
		}
		else if($prefix == 2) {
			$prefix = "Miss.";
		}

        ?>


        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Customers</h4>
                        </div>
                        <div class="card-body">


                            <table class="table">

                                <tr>
                                    <td>Prefix</td>
                                    <td><?php echo $prefix; ?></td>
                                </tr>
                                <tr>
                                    <td>Firstname</td>
                                    <td><?php echo $firstname; ?></td>
                                </tr>
                                <tr>
                                    <td>Middlename</td>
                                    <td><?php echo $middlename; ?></td>
                                </tr>
                                <tr>
                                    <td>Lastname</td>
                                    <td><?php echo $lastname; ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td><?php echo $address; ?></td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td><?php echo $city; ?></td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td><?php echo $company; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $phone; ?></td>
                                </tr>
								<tr>
                                    <td>Created At</td>
                                    <td><?php echo $created_at; ?></td>
                                </tr>
                                <!--<tr>
                                    <td>Receivables</td>
                                    <td><?php echo $receivables; ?></td>
                                </tr>
                                <tr>
                                    <td>Credits</td>
                                    <td><?php echo $credits; ?></td>
                                </tr>
								<tr>
                                    <td>Updated At</td>
                                    <td><?php echo $updated_at; ?></td>
                                </tr>-->
                                <tr>
                                    <td>Status</td>
                                    <td><?php echo ($status == 1) ? "Active" : "Inactive"; ?></td>
                                </tr>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="form-group">


                                <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('customers/'); ?>';">Cancel</button>


                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>