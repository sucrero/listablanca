<?php
    require_once 'Conexion.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona
 *
 * @author Oswaldo Franco
 * 
 */
    class Menu {
        private $_con;
        private $_fechaReg;

        public function __construct(){
            $this->_con = Conexion::enlaceBD();
            $this->_fechaReg = date('Y-m-d h:i:s');
        }
        
        public function viewall(){
            try {
                $sql = "SELECT * FROM menu WHERE is_active = TRUE ORDER BY descripcion";
                $query = $this->_con->db->prepare($sql);
                $query->execute();
                $datos = $query->fetchAll(PDO::FETCH_NUM);
                
//                print_r($datos); exit();
                return $datos;
//                print_r($datos);                exit();
            } catch (PDOException $e) {
                return "Fallo la busqueda: ".$e->getMessage();
            }
        }
        
        public function viewallmenu(){
            try {
                $sql = "SELECT A.menu, B.descripcion,B.icon FROM lista as A INNER JOIN menu as B ON A.menu=B.id WHERE A.is_active = TRUE GROUP BY A.menu,B.descripcion,B.icon ORDER BY B.descripcion";
                $query = $this->_con->db->prepare($sql);
                $query->execute();
                $datos = $query->fetchAll(PDO::FETCH_NUM);
                return $datos;
            } catch (PDOException $e) {
                return "Fallo la busqueda: ".$e->getMessage();
            }
        }
        
        public function create($desc,$icon){
//            print_r($desc, $icon);
//                        die();
            $sql = "INSERT INTO menu(descripcion,icon) VALUES (?,?)";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$desc);
            $query->bindParam(2,$icon);
            if($query->execute()){
                return 1;
            }else{
//                print_r($this->_con->db->errorInfo()); exit();
                return 0;
            }
            
            //return $this->_con->db->lastInsertId();
        }
    }
