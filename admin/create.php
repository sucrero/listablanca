<?php
    if (isset($_POST['descripcion']) && isset($_POST['url']) && isset($_POST['tipo'])) {
        require("../clases/Lista.class.php");

        $desc = $_POST['descripcion'];
        $url = $_POST['url'];
        $tipo = $_POST['tipo'];

        $object = new Lista();
        $object->create($desc, $url, $tipo);
    }
