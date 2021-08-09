<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/siteheader');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Students <small>-Detail list of Students</small></h1>
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
        $user_data = get_user_details($this->session->userdata('id'));

        ?>


        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>Users</h4>
                        </div>
                        <div class="card-body">


                            <table class="table">
                                <tr>
                                    <td>Created At</td>
                                    <td><?php echo $created_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Default Email Id</td>
                                    <td><?php echo $default_email_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Default Mobile No</td>
                                    <td><?php echo $default_mobile_no; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td>Email Verified At</td>
                                    <td><?php echo $email_verified_at; ?></td>
                                </tr>
                                <tr>
                                    <td>Facebook Id</td>
                                    <td><?php echo $facebook_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Google Id</td>
                                    <td><?php echo $google_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Iam Type</td>
                                    <td><?php echo $iam_type; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Login</td>
                                    <td><?php echo $last_login; ?></td>
                                </tr>
                                <tr>
                                    <td>Last Seen</td>
                                    <td><?php echo $last_seen; ?></td>
                                </tr>
                                <tr>
                                    <td>Linkedin</td>
                                    <td><?php echo $linkedin_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><?php echo $name; ?></td>
                                </tr>
                                <tr>
                                    <td>Only Acc</td>
                                    <td><?php echo $only_acc; ?></td>
                                </tr>
                                <tr>
                                    <td>Org Id</td>
                                    <td><?php echo $org_id; ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><?php echo $password; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $phone; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Verified</td>
                                    <td><?php echo $phone_verified; ?></td>
                                </tr>
                                <tr>
                                    <td>Profile Img</td>
                                    <td><?php echo $profile_img; ?></td>
                                </tr>
                                <tr>
                                    <td>Remember Token</td>
                                    <td><?php echo $remember_token; ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><?php echo $status; ?></td>
                                </tr>
                                <tr>
                                    <td>Temp Email</td>
                                    <td><?php echo $temp_email; ?></td>
                                </tr>
                                <tr>
                                    <td>Updated At</td>
                                    <td><?php echo $updated_at; ?></td>
                                </tr>
                                <tr>
                                    <td>User Type</td>
                                    <td><?php echo $user_type; ?></td>
                                </tr>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="form-group">


                                <button class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url('student_registration/'); ?>';">Cancel</button>


                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>