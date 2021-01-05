var Default = {
	list : function(urlController, columnsTable) {
		$("#table-list").DataTable().destroy();
		return $("#table-list").DataTable({
	            "responsive": true,
	            "autoWidth": false,
	            "processing": true,
	                "serverSide": true,
	                "ajax": {
	                    "url": "/"+urlController,
	                    "type": "GET",
	                    "data" : {
	                        _token : $("[name=_token]").val(),
	                        url : objModel.url
	                    },
	                },
	            'language': {
	                'url': "/Spanish.json"
	            },
	            beforeSend: function() {
                    $('#btn-create').attr('disabled');
                    showLoading();
                },
                complete: function() {
                	$('#btn-create').removeAttr('disabled');
                	removeLoading();
                },
	            "columns" : columnsTable,
	            'fnRowCallback': function (nRow, aData) {
	            	functionRowTable(nRow, aData);
	            }
	        });
	},
	show : function(masterId, urlController, onlyView) {
		showLoading();
		$.ajax({
			type : "GET",
			url  : "/"+urlController+"/show",
			data : {
				_token : $("[name=_token]").val(),
				masterId : masterId
			},
			success : function(response) {
				if (response.rst!=2 && response.rst !="2") {
					renderForm(response.obj);
				}
				let onlyViewTmp = false;
				if (typeof onlyView !=undefined && typeof onlyView !="undefined") {
					onlyViewTmp = onlyView;
				}
				if (onlyViewTmp) {
					$("#mdlStore form input[type=text]").prop("disabled", true);
					$("#mdlStore form textarea").prop("disabled", true);
					$("#mdlStore form select").prop("disabled", true);
					$("#btn-store").prop("disabled", true);
				}
				$("#mdlStore").modal("show");
				removeLoading();
			},
			error : function (errorResponse) {
				removeLoading();
			}
		});
	},
	showSetting: function(masterId, urlController) {
		showLoading();
		$.ajax({
			type : "GET",
			url  : "/"+urlController+"/show-setting",
			data : {
				_token : $("[name=_token]").val(),
				masterId : masterId
			},
			success : function(response) {
				if (response.rst!=2 && response.rst !="2") {
					renderSetting(response);
				}
				$("#mdlSetting").modal("show");
				removeLoading();
			},
			error : function (errorResponse) {
				removeLoading();
			}
		});
	},
	store : function(formData, urlController) {
		showLoading();
		$.ajax({
			type : "POST",
			url  : "/"+urlController+"/store",
			data : formData+"&_token="+$("[name=_token]").val(),
			success : function(response) {
				removeLoading();
				if (parseInt(response.rst) == 1) {
					Page.messages.success(response.msj);
					$("#mdlStore").modal("hide");
					tableList = Default.list(objModel.url_controller, columnsTable);
				} else {
					Page.messages.error(response.msj);
				}
			}
		});
		return false;
	},
	setting : function(formData, urlController) {
		showLoading();
		$.ajax({
			type : "POST",
			url  : "/"+urlController+"/setting",
			data : formData+"&_token="+$("[name=_token]").val(),
			success : function(response) {
				removeLoading();
				if (response.rst!=2 && response.rst !="2") {
					Page.messages.success(response.msj);
					$("#mdlSetting").modal("hide");
					tableList = Default.list(objModel.url_controller, columnsTable);
				} else {
					Page.messages.error(response.msj);
				}
			}
		});
		return false;
	},
	destroy : function(masterId, urlController) {
		showLoading();
		$.ajax({
			type : "POST",
			url  : "/"+urlController+"/destroy",
			data : {masterId : masterId, _token : $("[name=_token]").val()},
			success : function(response) {
				removeLoading();
				if (response.rst!=2 && response.rst !="2") {
					Page.messages.success(response.msj);
					tableList = Default.list(urlController, columnsTable);
				} else {
					Page.messages.error(response.msj);
				}
			}
		});
		return false;
	},

};
renderForm = function(responseObj) {
	for(var i in responseObj) {
		$("[name="+i+"]").val(responseObj[i]);
	}
	$("select").trigger("change");
	$("#staticBackdropLabel").html("");
	$("#staticBackdropLabel").html(objModel.name+" - Editar "+responseObj.name);
};
renderSetting = function(response) {
	let arrayTmp = [];
	switch(objModel.url_controller) {
		case "profile":
			$("#modulesIdSetting").html(response.viewSelect);
			let modules = response.modules;
			for(var i in modules) {
				arrayTmp.push(modules[i].id);
			}
			$("#modulesIdSetting").val(arrayTmp).trigger("change");
			renderSettingModules(modules);
			break;
		default:
			let responseObj = response.obj;
			for(var i in responseObj) {
				arrayTmp.push(i);
			}
			$("#settingIdsSelect").val(arrayTmp).trigger('change');
			break;
	}
};
cleanForm = function() {
    $("#frmStore input[type=text], "+
    	"#frmStore input[type=email], "+
    	"#frmStore input[type=hidden]").val("");
    $("#frmStore input[type=text], "+
    	"#frmStore input[type=email], "+
    	"#frmStore textarea").removeAttr("disabled");
    $("#btn-store").removeAttr("disabled");
    $("#frmStore select").each(function(){
    	$(this).val("");
    	$(this).removeAttr("disabled");
    });
    $("#frmStore select").val([]).trigger("change");
};
cleanFormSetting = function() {
	$("#frmSetting input[type=text], "+
    	"#frmSetting input[type=email], "+
    	"#frmSetting input[type=hidden]").val("");
    $("#frmSetting select").each(function(){
    	$(this).val("");
    });
    $("select").select2("val", []);
};
functionRowTable = function(nRow, aData) {
}
$("#mdlStore").on("show.bs.modal", function(event) {
  
});
$("#mdlStore").on("hide.bs.modal", function(event) {
    cleanForm();
});
$("#mdlSetting").on("hide.bs.modal", function(event) {
    cleanForm();
});
$("#btn-create").click(function(e) {
	$("#staticBackdropLabel").html(objModel.name+" - Registro Nuevo");
	$("#mdlStore").modal("show");
});
/*$(document).delegate(".setting", "click", function(e) {
	$("#titleSetting").html(objModel.name+" - Configuración Nuevo");
	$("#mdlSetting").modal("show");
});*/
$("#btn-store").click(function(e) {
	let formData = $("#frmStore").serialize();
	Default.store(formData, objModel.url_controller);
	return false;
});
$("#btn-setting").click(function(e) {
	let formData = $("#frmSetting").serialize();
	Default.setting(formData, objModel.url_controller);
	return false;
});
$('#table-list').on( 'click', '.prepare', function () {
    let data = tableList.row( $(this).parents('tr') ).data();
    if(data == undefined) {
        tableList = $('#table-list').DataTable();
        data = tableList.row( $(this).parents('tr') ).data();
    }
    if (data == undefined) {
    	data = $(this).data();
    }
    $('#masterId').val(data["id"]);
    Default.show(data["id"], objModel.url_controller);
    $("html, body").animate({ scrollTop: 0 }, 600);
});
$('#table-list').on( 'click', '.show', function () {
    let data = tableList.row( $(this).parents('tr') ).data();
    if(data == undefined) {
        tableList = $('#table-list').DataTable();
        data = tableList.row( $(this).parents('tr') ).data();
    }
    if (data == undefined) {
    	data = $(this).data();
    }
    $('#masterId').val(data["id"]);
    Default.show(data["id"], objModel.url_controller, true);
    $("html, body").animate({ scrollTop: 0 }, 600);
});
$('#table-list').on( 'click', '.setting', function () {
    let data = tableList.row( $(this).parents('tr') ).data();
    if(data == undefined) {
        tableList = $('#table-list').DataTable();
        data = tableList.row( $(this).parents('tr') ).data();
    }
    if (data == undefined) {
    	data = $(this).data();
    }
    $("#masterSettingsId").val(data["id"]);
    $("#titleSetting").html(objModel.name+" - Configuración Nuevo");
    Default.showSetting(data["id"], objModel.url_controller);
    $("html, body").animate({ scrollTop: 0 }, 600);
});
$('#table-list').on( 'click', '.destroy', function () {
    let data = tableList.row( $(this).parents('tr') ).data();
    if(data == undefined) {
        tableList = $('#table-list').DataTable();
        data = tableList.row( $(this).parents('tr') ).data();
    }
    if (data == undefined) {
    	data = $(this).data();
    }
    confirmDelete["masterId"] = data["id"];
    Page.messages.confirmDelete(confirmDelete, Default.destroy);
    $("html, body").animate({ scrollTop: 0 }, 600);
});