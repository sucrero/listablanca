<?php
    if (isset($_POST['id']) && isset($_POST['id']) != "") {
        require '../clases/Lista.class.php';
        $id = $_POST['id'];

        $object = new Lista();

        echo $object->details($id);
    }
