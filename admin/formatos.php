<style>
    
.messages{
        float: left;
        font-family: sans-serif;
        display: none;
    }
    .info{
        padding: 10px;
        border-radius: 10px;
        background: orange;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
    .before{
        padding: 10px;
        border-radius: 10px;
        background: blue;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
    .success{
        padding: 10px;
        border-radius: 10px;
        background: green;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
    .error{
        padding: 10px;
        border-radius: 10px;
        background: red;
        color: #fff;
        font-size: 12px;
        text-align: center;
    }
</style>
<div class="col-md-6">
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Administrar Formatos</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <!--<form role="form" action="upload.php" method="POST" enctype="multipart/form-data">-->
    <form enctype="multipart/form-data" class="formulario">
        <div class="box-body">
            <div class="form-group">
<!--                <label for="exampleInputFile">Archivo a subir</label>
                <input type="file" name="myfile">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000">
                <p class="help-block">El archivo no debe exceder de 20Mb.</p>-->
                <div class="form-group">
                    <label>Revisi&oacute;n:</label>
                    <div id="cmbrev"></div>
                </div>
                    <label>Subir un archivo</label>
                    <input name="archivo" type="file" id="archivo"/><br /><br />
                    <!--<input type="button" value="Subir imagen" /><br />-->
                <!--</form>-->
                <!--div para visualizar mensajes-->
                <div class="messages"></div>
                <!--div para visualizar en el caso de imagen-->
                <div class="showImage"></div>
            </div>
        </div>
        
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="button" class="btn btn-primary" disabled>Subir</button>
        </div>
    </form>
</div>
|</div>
<script>
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    $(".messages").hide();
    //queremos que esta variable sea global
    var fileExtension = "";
    //función que observa los cambios del campo file y obtiene información
    $(':file').change(function()
    {
        //obtenemos un array con los datos del archivo
        var file = $("#archivo")[0].files[0];
        //obtenemos el nombre del archivo
        var fileName = file.name;
        //obtenemos la extensión del archivo
        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        //obtenemos el tamaño del archivo
        var fileSize = file.size;
        //obtenemos el tipo de archivo image/png ejemplo
        var fileType = file.type;
        
        //verificamos la extension del archivo
        if((fileExtension !=="odt") && (fileExtension !=="ods") && (fileExtension !=="docx") && (fileExtension !=="doc") && (fileExtension !=="xls") && (fileExtension !=="xlsx") && (fileExtension !=="pdf")) {
            showMessage("<span class='error'>Formato de archivo inv&aacute;lido, solo puede subir archivos (odt, ods, docx, doc, xls, xlsx o pdf)</span>");
            $(':button').attr('disabled', true);
        }else{
            if(fileSize <= 2000000){//hasta 2Mb
                $(':button').attr('disabled', false);
                //mensaje con la información del archivo
                var mg = (fileSize/1000000).toFixed(2);
                if(mg > 1){
                    showMessage("<span class='info'>Peso del archivo: "+mg+" MB. de tipo: "+fileExtension+"</span>");
                }else{
                    showMessage("<span class='info'>Peso del archivo: "+fileSize+" bytes. de tipo: "+fileExtension+"</span>");
                } 
            }else{
                showMessage("<span class='info'>El documento no puede exceder de 2 MB</span>");
            }
        }
    });

    //al enviar el formulario
    $(':button').click(function(){
        //información del formulario
        var formData = new FormData($(".formulario")[0]);
        var message = ""; 
        //hacemos la petición ajax  
        $.ajax({
            url: 'upload.php',  
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
                message = $("<span class='before'>Subiendo el archivo, por favor espere...</span>");
                showMessage(message);    
            },
            //una vez finalizado correctamente
            success: function(data){
                message = $("<span class='success'>El archivo se ha subido correctamente.</span>");
                showMessage(message);
//                if(isImage(fileExtension))
//                {
//                    $(".showImage").html("<img src='../formato/"+data+"' />");
//                }
            },
            //si ha ocurrido un error
            error: function(){
                message = $("<span class='error'>Ha ocurrido un error.</span>");
                showMessage(message);
            }
        });
    });
});

//como la utilizamos demasiadas veces, creamos una función para 
//evitar repetición de código
function showMessage(message){
    $(".messages").html("").show();
    $(".messages").html(message);
}

//comprobamos si el archivo a subir es una imagen
//para visualizarla una vez haya subido
//function isImage(extension){
//    switch(extension.toLowerCase()){
//        case 'odt': case 'ods': case 'docx': case 'doc': case 'xls': case 'xlsx': case 'pdf':
//            return true;
//        break;
//        default:
//            return false;
//        break;
//    }
//}
/////////////////////////////////////////////////////////////////////////////////

    $.ajax({
        url: "../Operaciones.php",
        type: 'POST',
        data: {opcion: "cmbrev"},
        dataType: 'json',
        complete: function (data) {
            var dt =  JSON.parse(data.responseText);
            var combo="<select class='form-control' id='ilstrev' name='revision' title='Revision'><option value=''>Seleccione...</option>";
            for (var i in dt){
                 combo +=  "<option value='"+dt[i][0]+"'>"+dt[i][1]+"</option>";
            }
            combo += "</select>";
            $('#cmbrev').html(combo);
        }
    });
</script>
