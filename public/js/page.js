var Page = {
	messages : {
		error : function(errorMessage) {
			Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: errorMessage
			});
		},
		success : function(successMessage) {
			Swal.fire(
		      '¡Exito!',
		      successMessage,
		      'success'
		    );
		},
		confirmDelete : function(dataConfirm, functionCallback) {
			Swal.fire({
				title: dataConfirm["titleMessage"],
				text: dataConfirm["textMessage"],
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: dataConfirm["confirmButtonText"],
				cancelButtonText: dataConfirm["cancelButtonText"]
			}).then((result) => {
			  	if (result.value) {
			    	functionCallback(dataConfirm["masterId"], dataConfirm["urlController"]);
			  	}
			})
		}
	}
}