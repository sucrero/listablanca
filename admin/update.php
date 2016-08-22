<?php
    if (isset($_POST)) {
        require '../clases/Lista.class.php';

        $id = $_POST['id'];
        $desc = $_POST['descripcion'];
        $url = $_POST['url'];
        $tipo = $_POST['tipo'];
        $status = $_POST['status'];

        $object = new Lista();
        $object->update($id, $desc, $url, $tipo, $status);
        
    }
   
