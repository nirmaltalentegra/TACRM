<style>
.clear{
 clear:both;
 margin-top: 20px;
}

#searchResult{
 list-style: none;
 padding: 0px;
 width: 250px;
 position: absolute;
 margin: 0;
}

#searchResult li{
 background: lavender;
 padding: 4px;
 margin-bottom: 1px;
}

#searchResult li:nth-child(even){
 background: cadetblue;
 color: white;
}

#searchResult li:hover{
 cursor: pointer;
}

input[type=text]{
 padding: 5px;
 width: 250px;
 letter-spacing: 1px;
}

</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/certheader');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
       <h1>Students <small>-Cerificate Verification</small></h1>
    </div>
	
	<div class="section-body">
	 <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <form method="post" class="needs-validation" novalidate="" action="verify_certificate" id="myform">
          <div class="card">
            <div class="card-body pb-0">
              <div class="form-group form-inline">
                <label>Certificate ID : </label>
                <input type="text" name="certifcation_id" id="certifcation_id" class="form-control" required="">
                <div class="invalid-feedback">
                  Please Enter Valid Certificate ID. 
                </div>
              </div>
              
            </div>
            <div class="card-footer pt-0">
              <!--<button class="btn btn-primary">Get Details</button>--->
			  <input type="submit" value="Get Details" class="btn btn-primary"/>
            </div>
          </div>
		  <?php if($exists == 'failure'): ?>
				<div class="alert alert-danger" id="successMessage">Certificate ID not found</div>
			<?php endif ?>
		
        </form>
			
      </div>
      
    </div>
	</div>
	<?php
	if(count($certificate_detail) > 0) {
	?>	
	<div class="section-body" >
	 <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
          <div class="card">
		  <div class="card-header">
					<h4>Certificate</h4>
				</div>
            <div class="card-body pb-0">
				<div class="media-body">
					  <!--<div class="float-right text-primary">
						Status : Reviewed
					  </div>-->
					  <div class="media-title">
						Certificate ID : <?php echo $certifcation_id;?>
					  </div>
					</div>
			</div>
<!--
				<div class="card-header">
					<h4>Institution Details</h4>
				</div>
				<div class="card-body pb-0">			
						<div class="table-responsive">
				  <table class="table table-striped mb-0">
					<tbody>
					  <tr>
						<td>
						  Institute Type :
						</td>
						<td>
						  Private Institute
						</td>
					  </tr>
					  <tr>
						<td>
						  Institute ID : 
						</td>
						<td>
						  IBI
						</td>
					  </tr>
					  <tr>
						<td>
						  Institute Name:
						</td>
						<td>
						  Indian Block Chain Institute
						</td>
					  </tr>
					</tbody>
				  </table>
				</div>
				</div>	-->		
			
			<div class="card-header">
					<h4>Certificate Details</h4>
				</div>
				<div class="card-body pb-0">			
					<div class="table-responsive">
              <table class="table table-striped mb-0">
                <tbody>
				<?php foreach($certificate_detail as $row) {?>
                  <tr>
                    <td>
                      Course Name: 
                    </td>
                    <td>
                      <?php echo $row->course_name;?>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Student DID :
                    </td>
                    <td>
                      <?php echo $row->student_did;?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                      Student Name:
                    </td>
                    <td>
                      <?php  echo $row->name;?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                      CompletionDate:
                    </td>
                    <td>
                      <?php echo $row->completion_date;?>
                    </td>
                  </tr>
				  <tr>
                    <td>
                      Enrolment ID:
                    </td>
                    <td>
                      <?php echo $row->student_enrollment_id;?>
                    </td>
                  </tr>
				<?php }?>
                </tbody>
              </table>
            </div>
			</div>
			
			
			<!--<div class="card-header">
					<h4>History</h4>
				</div>
			<div class="card-body pb-0">			
					<div class="table-responsive">
              <table class="table table-striped mb-0">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>User</th>
					<th>Status</th>
					<th>Role</th>
					<th>Comments</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      July 2, 2021
                    </td>
					<td>
                      2:56:53 PM
                    </td>
					<td>
                      Admin
                    </td>
					<td>
                     Certified
                    </td>
					<td>
                      Ceritifer
                    </td>
					<td>
                      Verified & Valid
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
			</div>
			
			<br>
			<br>
			<div class="card-footer pt-0">
              <button class="btn btn-danger">Reject</button>
			  <button class="btn btn-warning">Back</button>
            </div>
-->			
            </div>
          </div>
      </div>
      
    </div>
	<?php } ?>
	</div>
  </section>
</div> <!-- Main content -->
<?php $this->load->view('_layout/footer'); ?>
<script>
$(document).ready(function() {
    $("#successMessage").delay(3000).slideUp(300);
});
</script>