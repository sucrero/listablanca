<?php
    session_start();
    include_once 'clases/Conexion.php';
    include_once 'clases/Lista.class.php';
    include_once 'clases/menu.class.php';
    include_once 'clases/sublista.class.php';
    
   
    $objLista = new Lista();
    $objMenu = new Menu();
    $objSubLista = new Sublista();

    switch ($_REQUEST['opcion']){

        case 'mostrar':
//            print_r($_REQUEST);            die();            
            $res = $objMenu->viewallmenu();
//            print_r($res);
//                        die();
            break;
        case 'cmbtipo':
            $res = $objMenu->viewall();
            break;
        case 'savelista':
            $band = 1;
            foreach ($_POST as $row){
                if($row == ''){
                    $band = 0;
                }
            }
            if($band){
                $res = $objLista->create($_POST['descripcion'], $_POST['url'], $_POST['tipo']);
            }else{
                $res = $band;
            }
            break;
        case 'tablalista':
            $res = $objLista->viewall();
            break;
        //########prueba############
        case 'listaDetails':
            $res = $objLista->detailsTipo($_POST['id']);
            break;
        case 'savetipo':
            $band = 1;
            
            foreach ($_POST as $row){
//                print_r($row);
//                        die();
                if($row == ''){
                    $band = 0;
                }
            }
            if($band){
                $res = $objMenu->create($_POST['descripcion'], $_POST['icon']);
            }else{
                $res = $band;
            }
            break;
        case 'cmblista':
            $res = $objSubLista->viewcmbo();
            break;
        case 'savesublista':
            $band = 1;
            foreach ($_POST as $row){
//                print_r($row);
//                        die();
                if($row == ''){
                    $band = 0;
                }
            }
             if($band){
                $res = $objSubLista->create($_POST['descripcion'], $_POST['url'],$_POST['lista'],$_POST['tipo']);
            }else{
                $res = $band;
            }
            break;
        
    }
//    print_r($res2);exit();
    $resp = json_encode($res);
    echo html_entity_decode($resp,ENT_QUOTES,'UTF-8');
