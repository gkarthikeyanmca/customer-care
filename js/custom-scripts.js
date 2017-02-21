jQuery(document).ready(function(){
	//Add Service
	jQuery(document).on('click','.add-service',function(){
		var args=jQuery('#addServiceForm').serializeArray();
		var formName=jQuery('#addServiceForm').find('input[type="hidden"]').val();
		var t=this;
		jQuery(t).html('Working...').prop('disabled',true);
		jQuery.ajax({
			url:'inc/ajax-functions.php',
			method:'post',
			data:{'args':args,'formName':formName},
			success:function(data){
				if(data=='success'){
					jQuery('#addNewServiceModal').find('.alert-success').show();
					jQuery('#addServiceForm').find('input[name="serviceName"]').val('');
					jQuery('#addServiceForm').find('textarea[name="serviceDesc"]').val('');
				}
				else{
					jQuery('#addNewServiceModal').find('.alert-danger').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+data).show();
				}
				jQuery(t).html('Add').prop('disabled',false);
			}
		});
	});

	//Load Edit Service Form
	jQuery(document).on('click','.edit-service',function(){
		var id=jQuery(this).parents('tr').attr('id');
		jQuery.ajax({
			url:'inc/ajax-functions.php',
			method:'post',
			data:{'id':id,'formName':'loadServiceEditForm'},
			success:function(data){
				jQuery('.edit-service-body').html(data);
			}
		});
	});

	//Save Service
	jQuery(document).on('click','.save-service',function(){
		var id=jQuery('#editServiceForm').find('input[name="service_id"]').val();
		var args=jQuery('#editServiceForm').serializeArray();
		var formName=jQuery('#editServiceForm').find('input[name="formName"]').val();
		var t=this;
		jQuery(t).html('Working...').prop('disabled',true);
		jQuery.ajax({
			url:'inc/ajax-functions.php',
			method:'post',
			data:{'args':args,'formName':formName,'id':id},
			success:function(data){
				if(data=='success'){
					jQuery('#editServiceModal').find('.alert-success').show();
				}
				else{
					jQuery('#editServiceModal').find('.alert-danger').html('<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+data).show();
				}
				jQuery(t).html('Save Changes').prop('disabled',false);
			}
		});
	});

	//Load delete confirm modal
	jQuery(document).on('click','.delete-service',function(){
		var id=jQuery(this).parents('tr').attr('id');
		jQuery.ajax({
			url:'inc/ajax-functions.php',
			method:'post',
			data:{'id':id,'formName':'loadDeleteConfirmForm'},
			success:function(data){
				jQuery('.delete-service-body').html(data);
			}
		});
	});

	//Delete service
	jQuery(document).on('click','.remove-service',function(){
		var id=jQuery('#deleteServiceForm').find('input[name="service_id"]').val();
		jQuery.ajax({
			url:'inc/ajax-functions.php',
			method:'post',
			data:{'id':id,'formName':'deleteService'},
			success:function(data){
				jQuery('#deleteConfirmModal').find('.alert-success').show().delay(4000);
				jQuery('#deleteConfirmModal').modal('hide')
			}
		});
	});

	jQuery('#addNewServiceModal').on('hidden.bs.modal', function (e) {
	  	jQuery(this).find('.alert').hide();
	  	jQuery('#addServiceForm').find('input[name="serviceName"]').val('');
		jQuery('#addServiceForm').find('textarea[name="serviceDesc"]').val('');
	});

	jQuery('#editServiceModal').on('hidden.bs.modal', function (e) {
	  	jQuery('.edit-service-body').html('Loading...');
	});

	jQuery('#deleteConfirmModal').on('hidden.bs.modal', function (e) {
	  	jQuery('.delete-service-body').html('Loading...');
	});
});