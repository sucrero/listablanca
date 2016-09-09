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
        
//        public function viewall(){
//            try {
////                $sql = "SELECT * FROM lista  ORDER BY tipo,descripcion";
//                $sql = "SELECT * FROM lista WHERE is_active = TRUE ORDER BY menu,descripcion";
////                $sql = "SELECT * FROM lista as A INNER JOIN tipos as B ON A.tipo=B.id WHERE A.is_active = TRUE ORDER BY B.descripcion";
////                $sql = "SELECT A.tipo, B.descripcion,B.icon FROM lista as A INNER JOIN tipos as B ON A.tipo=B.id WHERE A.is_active = TRUE GROUP BY A.tipo,B.descripcion,B.icon ORDER BY B.descripcion";
//                $query = $this->_con->db->prepare($sql);
//                $query->execute();
//                $datos[0] = $query->fetchAll(PDO::FETCH_NUM);
//                $sql = "SELECT * FROM menu ORDER BY descripcion";
//                $query = $this->_con->db->prepare($sql);
//                $query->execute();
//                $datos[1] = $query->fetchAll(PDO::FETCH_NUM);
//                return $datos;
//            } catch (PDOException $e) {
//                return "Fallo la busqueda: ".$e->getMessage();
//            }
//        }
        
         public function viewall(){
            try {
                /* Useful $_POST Variables coming from the plugin */
                $draw = $_POST["draw"];//counter used by DataTables to ensure that the Ajax returns from server-side processing requests are drawn in sequence by DataTables
                $orderByColumnIndex  = $_POST['order'][0]['column'];// index of the sorting column (0 index based - i.e. 0 is the first record)
                $orderBy = $_POST['columns'][$orderByColumnIndex]['data'];//Get name of the sorting column from its index
                $orderType = $_POST['order'][0]['dir']; // ASC or DESC
                $start  = $_POST["start"];//Paging first record indicator.
                $length = $_POST['length'];//Number of records that the table can display in the current draw
                /* END of POST variables */
                
//                $recordsTotal = count(getData("SELECT * FROM ".MyTable));
                
                $sql = "SELECT COUNT(*) FROM lista";
                $query = $this->_con->db->prepare($sql);
                $query->execute();
                $dato = $query->fetch(PDO::FETCH_ASSOC);
                $recordsTotal = $dato['count'];

                /* SEARCH CASE : Filtered data */
                if(!empty($_POST['search']['value'])){

                    /* WHERE Clause for searching */
                    for($i=0 ; $i < count($_POST['columns']);$i++){
                        $column = $_POST['columns'][$i]['data'];//we get the name of each column using its index from POST request
                        if($column != 'id' && $column != 'menu' && $column != 'is_active'){
                            $where[]="$column like '%".$_POST['search']['value']."%'";                            
                        }
                    }
                    $where = "WHERE ".implode(" OR " , $where);// id like '%searchValue%' or name like '%searchValue%' ....
                    /* End WHERE */

                    $sql = sprintf("SELECT COUNT(*) FROM %s %s", 'lista' , $where);//Search query without limit clause (No pagination)
//                    print_r($sql);
//                                        die();
                    $query = $this->_con->db->prepare($sql);
                    $query->execute();
                    $dato = $query->fetch(PDO::FETCH_ASSOC);
                    $recordsFiltered = $dato['count'];
                    

                    /* SQL Query for search with limit and orderBy clauses*/
                    $sql = sprintf("SELECT * FROM %s %s ORDER BY %s %s limit %d offset %d", 'lista' , $where , $orderBy, $orderType, $length, $start  );
//                    print_r($sql);
                    $query = $this->_con->db->prepare($sql);
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    $i=0;
                    $y=0;
                    $datos = array();
                    foreach ($data as $row ) {
                        $datos[] = $row ;
                        $datos[$i++]['nro'] = ++$y;
                    }
//                     = getData($sql);
                }
                /* END SEARCH */
                else {
                    $sql = sprintf("SELECT * FROM %s ORDER BY %s %s limit %d offset %d", 'lista' , $orderBy, $orderType, $length, $start);
//                    print_r($sql);
                    $query = $this->_con->db->prepare($sql);
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_ASSOC);
                    $i=0;
                    $y=0;
                    $datos = array();
                    foreach ($data as $row ) {
                        $datos[] = $row ;
                        $datos[$i++]['nro'] = ++$y;
                    }
                    
//                    $data = getData($sql);
//                print_r($datos);
//                                die();
                    $recordsFiltered = $recordsTotal;
                }

                /* Response to client before JSON encoding */
                $response = array(
                    "draw" => intval($draw),
                    "recordsTotal" => $recordsTotal,
                    "recordsFiltered" => $recordsFiltered,
                    "data" => $datos
                );

                echo json_encode($response);
                
            } catch (PDOException $e) {
                return "Fallo la busqueda: ".$e->getMessage();
            }
        }
        
        public function create($desc, $url, $tipo){
//            print_r($desc.' '.$url.' '.$tipo);            die();
            $sql = "INSERT INTO lista(descripcion,url,menu) VALUES (?,?,?)";
            $query = $this->_con->db->prepare($sql);
            $query->bindParam(1,$desc);
            $query->bindParam(2,$url);
            $query->bindParam(3,$tipo);
//            print_r($this->_con->db->errorInfo()); exit();
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
            $sql = "UPDATE lista SET descripcion = ?, url = ?, menu = ?, is_active = ? WHERE id = ?";
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
