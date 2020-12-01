var Master = {
	htmlButton : function(accessModule, rowId, routeUrl) {
		var txtButton = "";
		var keyId = "";
		var url = "";
		if (typeof rowId !="undefined" && typeof rowId !=undefined) {
			keyId = rowId;
		}
		if (typeof routeUrl !="undefined" && typeof routeUrl !=undefined) {
			url = routeUrl;
		}
		for(var j in accessModule) {
			let classButton = "";
			let accessOption = accessModule[j];
			switch (j) {
				case "E":
					classButton = "btn btn-success btn-sm prepare edit detail";
					break;
				case "D":
					classButton = "btn btn-danger btn-sm destroy delete";
					break;
				case "P":
					classButton = "btn btn-primary btn-sm printcode";
					break;
				case "W":
					classButton = "btn btn-default btn-sm store";
					break;
				default:
					break;
			}
			if (classButton !="") {
				if (keyId == "") {
					txtButton+="<button";
						txtButton+=" class='"+classButton+"' >";
						txtButton+="<i";
						txtButton+=" class='fa "+accessOption.class_icon+"' >";
						txtButton+="</i>";
					txtButton+="</button>";
				} else {
					switch (j) {
						case "E":
							txtButton+="<a href='/"+url+"/"+ keyId +"/edit' class='"+classButton+"'>";
                				txtButton += "<i class='fa fa-edit'></i>";
                			txtButton += "</a>";
							break;
						default:
							txtButton+="<button";
								txtButton+=" class='"+classButton+"' >";
								txtButton+="<i";
								txtButton+=" class='fa "+accessOption.class_icon+"' >";
								txtButton+="</i>";
							txtButton+="</button>";
							break;
					}
				}
				
			}
		}
		return txtButton;
	},
	htmlStatus : function(statusFlag) {
		if (statusFlag == 1) {
			return "<span class='label label-success'>Activo</span>";
		}
		return "<span class='label label-danger'>Inactivo</span>";
	},
	availableButtonCreate : function(accessModule, buttonCreateId) {
		if (accessModule["C"] !=null && accessModule["C"] !="null") {
			$("#"+buttonCreateId).css("display", "inline-block");
		}
		if (accessModule["P"] !=null && accessModule["P"] !="null") {
			$("#"+buttonCreateId).css("display", "inline-block");
		}
	}
};