$(function() {
//    mostrar(); 
    viewListMenu();
    viewListaDetails();
});


function viewListMenu(){
//    var icons = ["fa-bank","fa-mail","fa-globe","fa-book","fa-home"];
    $.ajax({
        url: "Operaciones.php",
        type: "POST",
        data: {opcion: "mostrar"},
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            var tipo = dt;
            var list = '<li class="header">CATEGOR&Iacute;AS</li>';
            for(i=0;i< tipo.length;i++){
                list += '<li><a href="#" onclick="viewListaDetails('+tipo[i][0]+',\''+tipo[i][1]+'\')"><i class="fa '+tipo[i][2]+'"></i> <span>'+tipo[i][1]+'</span></a></li>';
            }
//            list += '<li><a href="#" onclick="viewListaDetails()"><i class="fa fa-file-pdf-o"></i> <span>Formatos</span></a></li>';
            $(".sidebar-menu").html(list);
        }
    });
}

var cont2 = '';
function viewListaDetails(id,nom){
    $.ajax({
        url: "Operaciones.php",
        type: "POST",
        data: {opcion: "listaDetails", id: id},
        dataType: 'json',
        complete: function (data) {
            var lista =  JSON.parse(data.responseText);
            var list  = '';
            var list2 = '';
            var band = 0;
            var cont = '';
//            alert(lista[0][1]);
            if(lista.length !== 0){
                for (j=0;j < lista.length;j++){
                    band++;
                    
                    if(band%2 !== 0){
                        if(lista[j][2] === "#myModal"){
                            list += '<li class="list-group-item">&nbsp;<a href="#" onclick="viewmodalsublist(\''+lista[j][0]+'\',\''+lista[j][1]+'\')" data-toggle="modal" data-id ="'+lista[j][0]+'" data-title="'+lista[j][1]+'" id="ver-sublista">'+band+'- '+lista[j][1]+'</a></li>';
                        }else{
                            list += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
                        }
                    }else{
                        if(lista[j][2] === "#myModal"){
                            list2 += '<li class="list-group-item">&nbsp;<a href="#" onclick="viewmodalsublist(\''+lista[j][0]+'\',\''+lista[j][1]+'\')" data-toggle="modal" data-id="'+lista[j][0]+'" data-title="'+lista[j][1]+'" id="ver-sublista">'+band+'- '+lista[j][1]+'</a></li>';
                        }else{
                            list2 += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
                        }
                        
                    }
                }
                cont += '<div class="container">';
                    cont += '<div class="col-md-6">';
                        cont += '<ul class="list-group">';
                            cont += list;
                        cont += '</ul>';
                    cont += '</div>';
                    cont += '<div class="col-md-6">';
                        cont += '<ul class="list-group">';
                            cont += list2;
                        cont += '</ul>';
                    cont += '</div>';
                cont += '</div>';
                $("#lista").html(cont);
                $(".box-title").html(nom);
            }else{
                
            }
            
        }
    });
}

function viewmodalsublist(idlista,titulo){
//    alert("lista: "+idlista+" titulo: "+titulo);
    $.ajax({
        url: "Operaciones.php",
        type: "POST",
        data: {opcion: "sublistaDetails", id: idlista},
        dataType: 'json',
        complete: function (data) {
            var lista =  JSON.parse(data.responseText);
//            var lista = dt;
            var band = 0;
            var list = '';
            var list2 = '';
            var cont = '';
            if(lista.length !== 0){
                for (j=0;j < lista.length;j++){
                    band++;
                    if(band%2 !== 0){
                        list += '<li class="list-group-item">&nbsp;<a href="'+lista[j][3]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
                    }else{
                        list2 += '<li class="list-group-item">&nbsp;<a href="'+lista[j][3]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
                    }
                }
                cont += '<div class="container">';
                    cont += '<div class="col-md-6">';
                        cont += '<ul class="list-group">';
                            cont += list;
                        cont += '</ul>';
                    cont += '</div>';
                    cont += '<div class="col-md-6">';
                        cont += '<ul class="list-group">';
                            cont += list2;
                        cont += '</ul>';
                    cont += '</div>';
                cont += '</div>';
                $(".modal-body").html(cont);
//                $(".box-title").html(nom);
            }else{
                
            }
            $('#myModal').modal('show')
                    .find('.modal-title').text(titulo);
        }
    });
}
