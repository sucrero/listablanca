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
    class Sublista {
        private $_con;
        private $_fechaReg;

        public function __construct(){
            $this->_con = Conexion::enlaceBD();
            $this->_fechaReg = date('Y-m-d h:i:s');
        }
        
        public function viewcmbo(){
            try {
                $sql = "SELECT * FROM lista WHERE url like '#myModal%' AND is_active = TRUE ORDER BY descripcion";
                $query = $this->_con->db->prepare($sql);
                $query->execute();
                $datos = $query->fetchAll(PDO::FETCH_NUM);
                return $datos;
            } catch (PDOException $e) {
                return "Fallo la busqueda: ".$e->getMessage();
            }
        }
        
//        public function viewallmenu(){
//            try {
//                $sql = "SELECT A.menu, B.descripcion,B.icon FROM lista as A INNER JOIN menu as B ON A.menu=B.id WHERE A.is_active = TRUE GROUP BY A.menu,B.descripcion,B.icon ORDER BY B.descripcion";
//                $query = $this->_con->db->prepare($sql);
//                $query->execute();
//                $datos = $query->fetchAll(PDO::FETCH_NUM);
//                return $datos;
//            } catch (PDOException $e) {
//                return "Fallo la busqueda: ".$e->getMessage();
//            }
//        }
//        
        public function create($desc,$url,$idlista,$tipo){
//            print_r($desc.' '.$url.' '.$idlista.' '.$tipo);
//                        exit();
            $sql = "INSERT INTO sublista(descripcion,url,lista,tipo) VALUES (?,?,?,?)";
            
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$desc);
            $query->bindParam(2,$url);
            $query->bindParam(3,$idlista);
            $query->bindParam(4,$tipo);
//            print_r($this->_con->db->errorInfo()); exit();
            if($query->execute()){
                return 1;
            }else{
                return 0;
            }
            
            //return $this->_con->db->lastInsertId();
        }
        
        public function detailsublist($idlista){
            $sql = "SELECT * FROM sublista where lista = ?";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$idlista);
            $query->execute();
            $datos = $query->fetchAll(PDO::FETCH_NUM);
            print_r($datos);
                        die();
            return $datos;
        }
    }
