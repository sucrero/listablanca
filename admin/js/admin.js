$(function() {
    cmbTipo(); 
    cmbLista(); 
//    crearTablaLista();
    
    $("#guardarlista").click(function(event){
        event.preventDefault();
        savelista();
    });
    $("#guardartipo").click(function(event){
        event.preventDefault();
        savetipo();
    });
    $("#guardarsublista").click(function(event){
        event.preventDefault();
        savesublista();
    });
//    $('#table_id').DataTable( {
//        stateSave: true, //enable state saving (pagination,search per column,current page, search inputs....à
//            "stateSaveCallback": function (settings, data) {
//                // Send an Ajax request to the server with the state object
//                $.ajax( {
//                    "url": "../Operaciones.php?opcion=tablalista",
//                    "data": {"name":"id", "state": data} ,//you can use the id of the datatable as key if it's unique
//                    "dataType": "json",
//                    "type": "POST",
//                    "success": function () {}
//                } );
//            }
//    } );
    $('#table_id').DataTable({
        "columns": [
            {"data": "id"},
            {"data": "descripcion"},
            {"data": "url"},
            {"data": "menu"},
            {"data": "status"}
        ],
        "processing": true,
        "serverSide": true,
        "ajax": {
            url: '../Operaciones.php?opcion=tablalista',
            type: 'POST'
        }
    });
});

function savesublista(){
    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: $('#sublista').serialize()+ "&opcion=" + "savesublista",
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            if(dt){
//                $("#contlista").empty();
//                crearTablaLista();
                limpiarFormSubLista();
            }else{
                alert("verifique");
            }
            
        }
    });
}


function cmbTipo(){
    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: {opcion: "cmbtipo"},
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            var combo="<select class='form-control' id='ilsttipo' name='tipo' title='Tipo'><option value=''>Seleccione...</option>";
            for (var i in dt){
                 combo +=  "<option value='"+dt[i][0]+"'>"+dt[i][1]+"</option>";
            }
            combo += "</select>";
            $('#combtipo').html(combo);
        }
    });
}

function cmbLista(){
    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: {opcion: "cmblista"},
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
//            alert(dt);
            var combo="<select class='form-control' id='ilstlista' name='lista' title='Tipo'><option value=''>Seleccione...</option>";
            for (var i in dt){
                 combo +=  "<option value='"+dt[i][0]+"'>"+dt[i][1]+"</option>";
            }
            combo += "</select>";
            $('#comblista').html(combo);
        }
    });
}

function savelista(){
    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: $('#lista').serialize()+ "&opcion=" + "savelista",
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            if(dt){
                $("#contlista").empty();
                crearTablaLista();
                limpiarFormLista();
            }else{
                alert("verifique");
            }
            
        }
    });
}

function limpiarFormSubLista(){
    $("#sublista")[0].reset();
}
function limpiarFormLista(){
    $("#lista")[0].reset();
}

function crearTablaLista(){
    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: {opcion: "tablalista"},
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            if(dt != 0){
//                alert(dt);
                var lista = dt[0];
                var tipo = dt[1];
                var num = 0;
                var tip = '';
//                alert(tipo);
                for(i = 0; i < lista.length; i++){
//                    alert(tipo.length);
                    for(j = 0; j < tipo.length; j++){
//                        alert('lista: '+lista[i][3]+ '  tipo: '+tipo[j][0]);
                        if(lista[i][3] === tipo[j][0]){
//                            alert(tipo[j][1]);
                            tip = tipo[j][1];
                            break;
                        }
                    }
                    
                    if(lista[i][4]){
                        clase = "label label-success";
                        texto = "On";
                    }else{
                        clase = "label label-danger";
                        texto = "Off";
                    }
                    $("#contlista").append($("<tr>")
                        .append($("<td>")
                            .text(++num)
                        )
                        .append($("<td>")
                            .text(lista[i][1])
                        )
                        .append($("<td>")
                            .text(lista[i][2])
                        )
                        .append($("<td>")
                            .text(tip)
                        )
                        .append($("<td>")
                            .append($("<span>")
                                .addClass(clase)
                                .text(texto)
                            )
                        )
                    );
                }
            }else{
                $("#contlista").append($("<tr>")
                              .addClass("error alert-error")
                              .append($("<td>")
                                 .attr("colspan","4")
                                 .append($("<h5>")
                                     .text("No existen registros para mostrar")
                                 )
                              )
                              .attr("title","No existen registros para mostrar")
                              .attr("id","personal")
                );
            }
        }
    });
}
function limpiarFormTipo(){
    $("#tipo")[0].reset();
}
function savetipo(){
    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: $('#tipo').serialize()+ "&opcion=" + "savetipo",
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            if(dt){
                $("#contlista").empty();
                cmbTipo(); 
                limpiarFormTipo();
            }else{
                alert("verifique");
            }
            
        }
    });
}

function cargar(){
    $("#contenido").load('reglista.php');
}



