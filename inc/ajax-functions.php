<?php
	//print_r($_POST['str']);
	include('../CustomerCare.class.php');
	$aobj=new CustomerCare();
	$aobj->connect();

	//Add new service
	if($_POST && $_POST['formName']=='addService'){		
		$args=array();
		foreach($_POST['args'] as $key=>$val){
			if($val['name']!='formName'){
				$args[$val['name']]=$val['value'];
			}
		}
		$response=$aobj->addService($args);
		echo $response;
	}

	//Load edit service form
	if($_POST && $_POST['formName']=='loadServiceEditForm'){		
		$id=$_POST['id'];
		$res=$aobj->getService($id);
		$row = mysqli_fetch_assoc($res);
		if($row){
			?>
			<form action="" method="post" id="editServiceForm">
				<input type="hidden" name="formName" value="editService" />
				<input type="hidden" name="service_id" value="<?php echo $id; ?>" />
				<div class="form-group">
					<input value="<?php echo $row['service_title']; ?>" type="text" class="form-control" name="serviceName" placeholder="Enter Service Name">
				</div>
				<div class="form-group">
					<textarea class="form-control" name="serviceDesc" placeholder="Enter Service Description" rows="7"><?php echo $row['service_description']; ?></textarea>
				</div>  
			</form>
			<?php
		}
	}

	//Edit service
	if($_POST && $_POST['formName']=='editService'){		
		$id=$_POST['id'];
		$args=array();
		foreach($_POST['args'] as $key=>$val){
			if($val['name']!='formName'){
				$args[$val['name']]=$val['value'];
			}
		}
		$response=$aobj->saveService($args,$id);
		echo $response;
	}

	//Load delete service form
	if($_POST && $_POST['formName']=='loadDeleteConfirmForm'){		
		$id=$_POST['id'];
		$res=$aobj->getService($id);
		$row = mysqli_fetch_assoc($res);
		if($row){
			?>
			<form action="" method="post" id="deleteServiceForm">
				<input type="hidden" name="formName" value="deleteService" />
				<input type="hidden" name="service_id" value="<?php echo $id; ?>" />
				<div class="form-group">
					Are you sure you want to delete this service?
				</div>  
			</form>
			<?php
		}
	}

	//delete service
	if($_POST && $_POST['formName']=='deleteService'){		
		$id=$_POST['id'];
		$res=$aobj->deleteService($id);		
	}
?>