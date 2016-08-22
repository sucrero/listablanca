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
    class Lista {
        private $_con;
        private $_fechaReg;

        public function __construct(){
            $this->_con = Conexion::enlaceBD();
            $this->_fechaReg = date('Y-m-d h:i:s');
        }
        
        public function viewall(){
            try {
//                $sql = "SELECT * FROM lista  ORDER BY tipo,descripcion";
                $sql = "SELECT * FROM lista WHERE is_active = TRUE ORDER BY menu,descripcion";
//                $sql = "SELECT * FROM lista as A INNER JOIN tipos as B ON A.tipo=B.id WHERE A.is_active = TRUE ORDER BY B.descripcion";
//                $sql = "SELECT A.tipo, B.descripcion,B.icon FROM lista as A INNER JOIN tipos as B ON A.tipo=B.id WHERE A.is_active = TRUE GROUP BY A.tipo,B.descripcion,B.icon ORDER BY B.descripcion";
                $query = $this->_con->db->prepare($sql);
                $query->execute();
                $datos[0] = $query->fetchAll(PDO::FETCH_NUM);
                $sql = "SELECT * FROM menu ORDER BY descripcion";
                $query = $this->_con->db->prepare($sql);
                $query->execute();
                $datos[1] = $query->fetchAll(PDO::FETCH_NUM);
//                print_r($datos); exit();
                
                return $datos;
//                print_r($datos);                exit();
            } catch (PDOException $e) {
                return "Fallo la busqueda: ".$e->getMessage();
            }
        }
        
        
        
        public function create($desc, $url, $tipo){
            $sql = "INSERT INTO lista(descripcion,url,tipo) VALUES (?,?,?)";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$desc);
            $query->bindParam(2,$url);
            $query->bindParam(3,$tipo);
            if($query->execute()){
                return 1;
            }else{
                return 0;
            }
            
            //return $this->_con->db->lastInsertId();
        }
        
        public function read(){
            $sql = "SELECT * FROM lista";
            $query = $this->_con->db->prepare($sql);
            $query->execute();
            $dat = array();
            while ($row = $query->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
        }
        
        public function delete($id){
            $sql = "DELETE FROM lista WHERE id = ?";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
        }
        
        public function update($id, $desc, $url, $tipo, $status){
            $sql = "UPDATE lista SET descripcion = ?, url = ?, tipo = ?, is_active = ? WHERE id = ?";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$desc);
            $query->bindParam(2,$url);
            $query->bindParam(3,$tipo);
            $query->bindParam(4,$status);
            $query->bindParam(5,$id);
            $query->execute();
        }
        
        public function details($id){
            $sql = "SELECT * FROM lista WHERE id = ?";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            return json_encode($query->fetch(PDO::FETCH_ASSOC));
        }
        
        public function detailsTipo($id){
            $sql = "SELECT * FROM lista WHERE menu = ? ORDER BY descripcion";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
//            print_r($query->fetchAll()); die();
            return $query->fetchAll();
        }
    }
