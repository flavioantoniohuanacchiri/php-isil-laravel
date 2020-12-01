functionRowTable = function(nRow, aData) {
    if (aData!=null && aData!="null" && aData["status"] !=null && aData["status"] !="null") {
        let htmlTmp = Master.htmlStatus(aData['status']);
        $(nRow).find('td:eq(3)').html(htmlTmp);
    }
};
renderSettingModules = function(modules) {
    for(var i in modules) {
        var moduleIdTmp = modules[i].id;
        var optionsTmp = optionAccessModule[moduleIdTmp];
        var permissionsTmp = modules[i].permissions;
        var rowTmp = new Array();
        rowTmp.push(modules[i].parent_module.name);
        rowTmp.push(modules[i].name);
        for(var j in optionAccess) {
            let tmpOption = {};
            tmpOption[optionAccess[j].initial] = optionAccess[j];
            rowTmp.push(textOptionsTd(modules[i], tmpOption, permissionsTmp));
        }
        rowTmp.push(textDelete(modules[i].id));
            
        tableListAccess.row.add(rowTmp).node().id = "filaModule_"+modules[i].id;
        tableListAccess.draw(false);
        listModulesProfile[moduleIdTmp] = {};
        for(var j in permissionsTmp) {
            listModulesProfile[moduleIdTmp][j] = permissionsTmp[j].initial;
        }
    }
};
textOptionsTd = function(module, listOptions, checkedInitial) {
    let textOptions = "";
    let moduleId = module.id;
    for(var j in listOptions) {
        let itemOption = listOptions[j];
        textOptions+="<td>";
        textOptions+="<div class='option-item'>";
        let checked = "";
        if (typeof checkedInitial == "undefined" || typeof checkedInitial == undefined) {
            checked = "";
        } else {
            if (typeof checkedInitial[j] !="undefined" && typeof checkedInitial[j] !=undefined) {
                checked = "checked";
            }
        }
        textOptions+="<input type='checkbox' "+checked+" name='option["+moduleId+"]["+j+"]' ";
        textOptions+=" data-moduleid='"+moduleId+"' data-initial='"+j+"' />";
        //textOptions+="<span class='text-option'>"+itemOption.name+"</span>";
        textOptions+="</div>";
        textOptions+="</td>";
        if (checked!="") {
            $("#frmSetting").append("<input type='hidden' id='hiddenOption_"+j+"_Module_"+moduleId+"' value='"+j+"' name='optionHiden["+moduleId+"]["+j+"]' class='optionHidden'/>");
        }
    }
    textOptions+="<input type='hidden' id='hiddenModule_"+moduleId+"'/>";
    return textOptions;
};
textDelete = function(moduleId) {
    return  "<button class='btn btn-danger btn-delete' data-index='"+moduleId+"'><i class='fa fa-trash'></i></button>";
};
$(document).delegate(".btn-delete", "click", function(e) {
    let btn = $(e.target).parent();
    let btnId = $(btn).data("index");
    $("#filaModule_"+btnId).remove();
    let arrayNew = [];
    delete listModulesProfile[btnId];
    for(var i in listModulesProfile) {
        arrayNew.push(i);
    }
    $("#modulesIdSetting").val(arrayNew).trigger("change");
    return false;
});
$(document).delegate(".option-item input[type=checkbox]", "click", function(e) {
    let moduleIdTmp = $(this).data("moduleid");
    let initialTmp = $(this).data("initial");
    if ($(this).is(":checked")) {
        $("#frmSetting").append("<input type='hidden' "+
            " id='hiddenOption_"+initialTmp+"_Module_"+moduleIdTmp+"' "+
            " value='"+initialTmp+"' name='optionHiden["+moduleIdTmp+"]["+initialTmp+"]' "+
            " class='optionHidden'/>");
        listModulesProfile[moduleIdTmp][initialTmp] = {};
    } else {
        delete listModulesProfile[moduleIdTmp][initialTmp];
        $("#hiddenOption_"+initialTmp+"_Module_"+moduleIdTmp).remove();
    }
});
$("#modulesIdSetting").on("select2:select", function(event) {
    $(event.currentTarget).find("option:selected").each(function(i, selected){ 
        let option = $(selected);
        let optionId = option.val();
        if (typeof listModulesProfile[optionId] == undefined || typeof listModulesProfile[optionId] == "undefined") {
            var optionsTmp = optionAccessModule[optionId];
            //listModulesAccessSelect[optionId] = {};
            var rowTmp = new Array();
            rowTmp.push(option.data("nameparent"));
            rowTmp.push(option.data("namechild"));
            for(var j in optionAccess) {
                let tmpOption = {};
                tmpOption[optionAccess[j].initial] = optionAccess[j];
                rowTmp.push(textOptionsTd(childModules[optionId], tmpOption));
            }
            rowTmp.push(textDelete(optionId));
            tableListAccess.row.add(rowTmp).node().id = "filaModule_"+optionId;
            tableListAccess.draw(false);
            listModulesProfile[optionId] = {};
        }
    });
});
$("#modulesIdSetting").on("select2:unselecting", function(e){
    let selectData = e.params.args.data;
    let tmpOptions = listModulesProfile[selectData.id];
    for(var i in tmpOptions) {
        let element = $("#hiddenOption_"+i+"_Module_"+selectData.id);
        $(element).remove();
    }
    var parent = $("#hiddenModule_"+selectData.id).parent().parent();
    $(parent).remove();
    delete listModulesProfile[selectData.id];
});
$("#mdlSetting").on("hide.bs.modal", function(event) {
    $("#table-list-access").DataTable().clear().draw();
});