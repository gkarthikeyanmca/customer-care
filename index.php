<?php include('header.php'); ?>
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-xs-12">
			<?php
				$obj=new CustomerCare();
				$response=$obj->connect();
				if($response!='success'){
					?>
					<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo $response; ?></div>
					<?php
					die();
				}
				if($_POST){
					$response=$obj->addService($_POST);
				}
			?>
			<h3>All Services</h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Service Id</th>
						<th>Service Name</th>
						<th>Service Description</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Service Id</th>
						<th>Service Name</th>
						<th>Service Description</th>
					</tr>
				</tfoot>
				<tbody>
					<tr>
						<td>154</td>
						<td>Plumber</td>
						<td>This is the description of the plumber service</td>
					</tr>
					<tr>
						<td>154</td>
						<td>Plumber</td>
						<td>This is the description of the plumber service</td>
					</tr>
					<tr>
						<td>154</td>
						<td>Plumber</td>
						<td>This is the description of the plumber service</td>
					</tr>
					<tr>
						<td>154</td>
						<td>Plumber</td>
						<td>This is the description of the plumber service</td>
					</tr>
					<tr>
						<td>154</td>
						<td>Plumber</td>
						<td>This is the description of the plumber service</td>
					</tr>
					<tr>
						<td>154</td>
						<td>Plumber</td>
						<td>This is the description of the plumber service</td>
					</tr>
				</tbody>
			</table>

			<?php
				if($_POST){
					if($response=='success'){
						?>
						<div class="alert alert-success" role="alert"><i class="fa fa-check-circle" aria-hidden="true"></i> Service added successfully</div>
						<?php
					}
					else{
						?>
						<div class="alert alert-danger" role="alert"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <?php echo $response; ?></div>
						<?php
						die();
					}
				}
			?>
			<h3>Add new service</h3>			
			<form action="" method="post">
  				<div class="form-group">
    				<input type="text" class="form-control" name="serviceName" placeholder="Enter Service Name">
  				</div>
  				<div class="form-group">
    				<textarea class="form-control" name="serviceDesc" placeholder="Enter Service Description" rows="10"></textarea>
  				</div>  
  				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
		<div class="col-sm-4 col-xs-12">
			<h3>Quick Links</h3>
			<div class="list-group">
  				<a href="#" class="list-group-item active">All services</a>
  				<a href="#" class="list-group-item">All staff</a>
  				<a href="#" class="list-group-item">All appointments</a>
  			</div>  			  			
		</div>
	</div>	
</div>
<?php include('footer.php'); ?>