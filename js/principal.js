$(function() {
//    mostrar(); 
    viewListMenu();
    viewListaDetails();
    
});
//$("#open-Modal").click(function () {
//    var msj = $(this).data('msj');
//    
//    $(".modal-body").val( msj );
//});
//###############   PRUEBA ###############
// $("li").click(function() {
//        $("li").removeClass(".active" );  // a todo <li> se le quita el estilo
//       $(this).addClass(".active" );   // se le añade el estilo al clickeado
//});
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
            $(".sidebar-menu").html(list);
        }
    });
}

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
                            list += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" data-toggle="modal" data-lista ="'+lista[j][0]+'" data-title="'+lista[j][1]+'">'+band+'- '+lista[j][1]+'</a></li>';
                        }else{
                            list += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
                        }
                    }else{
                        if(lista[j][2] === "#myModal"){
                            list2 += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" data-toggle="modal" data-lista ="'+lista[j][0]+'" data-title="'+lista[j][1]+'">'+band+'- '+lista[j][1]+'</a></li>';
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

$('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var recipient = button.data('title'); // Extract info from data-* attributes
    var idLista = button.data('lista'); 
    var cont = '';
//    alert(idLista);
//    
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-title').text('Opciones para ' + recipient);
    modal.find('.modal-body').text("cuerpo");

//    modal.find('.modal-body').text(cont);
});

//function mostrar(){
//    $.ajax({
//        url: "Operaciones.php",
//        type: "POST",
//        data: {opcion: "mostrar"},
//        dataType: 'json',
//        complete: function (data) {
//            var dt =  JSON.parse(data.responseText);
//            var lista = dt[0];
//            var tipo = dt[1];
//            var band = 0;
//            cont='';
////            var clase = ["panel-danger", "panel-default", "panel-info", "panel-primary", "panel-success", "panel-warning"];
//            for(i=0;i< tipo.length;i++){
//                if(i%2==0){
//                    clase = "panel-danger";
//                }else{
//                    clase = "panel-primary";
//                }
//                band = 0;
//                der = izq = 0;
//                list = '';
//                list2 = '';
//                for (j=0;j < lista.length;j++){
//                    if(tipo[i][0] == lista[j][3]){
//                        band++;
//                        if(band%2 != 0){
//                            list += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
//                        }else{
//                            list2 += '<li class="list-group-item">&nbsp;<a href="'+lista[j][2]+'" target="_blank">'+band+'- '+lista[j][1]+'</a></li>';
//                        }
//                    }
////                    band = 1;
//                }
//                if(band !=0 ){
//                    cont += '<div class="panel '+clase+'">';
//                        cont += '<div class="panel-heading"> <!-- panel-heading -->';
//                            cont += '<h4 class="panel-title"> <!-- title 1 -->';
//                                cont += '<a data-toggle="collapse" data-parent="#accordion" href="#accordion'+i+'">';
//                                    cont += tipo[i][1];
//                                cont += '</a>';
//                            cont += '</h4>';
//                        cont += '</div>';
//
//                        cont += '<div id="accordion'+i+'" class="panel-collapse collapse">';
//                            cont += '<div class="container">';
//                                cont += '<div class="col-md-6">';
//                                    cont += '<ul class="list-group">';
//                                        cont += list;
//                                    cont += '</ul>';
//                                cont += '</div>';
//                                cont += '<div class="col-md-6">';
//                                    cont += '<ul class="list-group">';
//                                        cont += list2;
//                                    cont += '</ul>';
//                                cont += '</div>';
//                            cont += '</div>';
//                        cont += '</div>';
//                    cont += '</div>';
//                }
//            }
//            $("#accordion").html(cont);
//        }
//    });
//}




