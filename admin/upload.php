<?php
    include_once '../clases/sublista.class.php';
    //comprobamos que sea una petición ajax
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
    {
        //obtenemos el archivo a subir
        $file = ucwords(strtolower($_FILES['archivo']['name']));
       
        //comprobamos si existe un directorio para subir el archivo
        //si no es así, lo creamos
        $target_dir = "../formato/";
        if(!is_dir($target_dir)){
            if(!mkdir($target_dir, 0777)){
                echo "Falló al crear el directorio";
            }
        }

        //comprobamos si el archivo ha subido
        if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],$target_dir.$file))
        {
            $objSubLista = new Sublista();
            if($objSubLista->create($file, "formato/".$file, filter_input (INPUT_POST, 'revision') , "formato")){
                chmod($target_dir.$file, 0777);
                sleep(3);//retrasamos la petición 3 segundos
                echo $file;//devolvemos el nombre del archivo para pintar la imagen
            }else{
                echo "Falló al guardar en la base de datos";
            }
           
        }
    }else{
        throw new Exception("Error Processing Request", 1);   
    }
