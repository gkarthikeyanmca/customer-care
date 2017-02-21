<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 col-sm-8 col-xs-12">
			<?php
				$obj=new CustomerCare();
				$response=$obj->connect();
				if($response!='success'){
					?>
					<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo $response; ?></div>
					<?php
					die();
				}
				$rows=$obj->getServices();
				?>
				<h3>All Services <a href="javascript:void(0);" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addNewServiceModal">Add New</a></h3>
				<?php
				if($rows){
					?>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Service Id</th>
								<th>Service Name</th>
								<th>Service Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Service Id</th>
								<th>Service Name</th>
								<th>Service Description</th>
								<th>Action</th>
							</tr>
						</tfoot>
						<tbody>
							<?php
								while($row = mysqli_fetch_assoc($rows)) {
									?>
									<tr id="<?php echo $row['id']; ?>">
										<td><?php echo $row['id']; ?></td>
										<td><?php echo $row['service_title']; ?></td>
										<td><?php echo $row['service_description']; ?></td>
										<td>
											<center>
												<a href="#" class="edit-service" data-toggle="modal" data-target="#editServiceModal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;
												<a href="#" class="delete-service" data-toggle="modal" data-target="#deleteConfirmModal"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</center>
										</td>
									</tr>
									<?php
								}
							?>
						</tbody>
					</table>
					<?php
				}
			?>
		</div>
		<div class="col-md-3 col-sm-4 col-xs-12">
			<h3>Quick Links</h3>
			<div class="list-group">
  				<a href="#" class="list-group-item active">Services</a>
  				<a href="#" class="list-group-item">Staff</a>
  				<a href="#" class="list-group-item">Appointments</a>
  			</div>  			  			
		</div>
	</div>	
</div>
<!-- Add new service Modal -->
<div class="modal fade" id="addNewServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Service</h4>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="addServiceForm">
        	<input type="hidden" name="formName" value="addService" />
			<div class="form-group">
				<input type="text" class="form-control" name="serviceName" placeholder="Enter Service Name">
			</div>
			<div class="form-group">
				<textarea class="form-control" name="serviceDesc" placeholder="Enter Service Description" rows="7"></textarea>
			</div>  
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add-service">Add</button>
      </div>
      <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> Service added successfully</div>
      <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
    </div>
  </div>
</div>

<!-- Edit service Modal -->
<div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Service</h4>
      </div>
      <div class="modal-body edit-service-body">
      	Loading...        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary save-service">Save Changes</button>
      </div>
      <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> Service saved successfully</div>
      <div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></div>
    </div>
  </div>
</div>

<!-- Delete confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
      </div>
      <div class="modal-body delete-service-body">
      	Loading...        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary remove-service">Yes</button>
      </div>
      <div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> Service deleted successfully</div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>