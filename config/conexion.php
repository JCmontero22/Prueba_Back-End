<?php

    require_once('configDB.php'); //llama al archivo que contienen las variables de conexion
    
    

    class conexion
    {
        public function conectar(){
            $enlace = new PDO(SGBD, USER, PASSWORD);
            return $enlace;
        }
    
        public function runQuery($sql){
            $query = $this->conectar()->prepare($sql);
            $query->execute();
            return $query;
        }
    
        public function runQuerySimple($sql){
            $query = $this->conectar()->prepare($sql);
            $query->execute();
            return $query->fetch();
        }

        public function runQueryAll($sql){
            $query = $this->conectar()->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }

       
        
    }