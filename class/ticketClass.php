<?php

    require_once('./config/conexion.php');
    require_once('respuestaClass.php');
   

    class tickets extends conexion
    {

        private $tabla = "ticket";

        public function listartickets($pagina)
        {
            $inicio = 0;
            $cantidad = 25;

            if ($pagina >  1) {
                $inicio = ($cantidad * ($pagina - 1)) + 1;
                $cantidad = $cantidad * $pagina;
            }

            $sql = "SELECT id, usuario, estatus FROM ". $this->tabla . " LIMIT $inicio, $cantidad";
           
            $resul = $this->runQueryAll($sql);
          
            
            echo json_encode($resul);
        }

        public function detalleticket($id)
        {
            $sql = "SELECT *  FROM ". $this->tabla ." WHERE id = '$id'";
            
            $resul = $this->runQuerySimple($sql);

            echo json_encode($resul);
        }

        public function insertTicket($json)
        {
            $res = new respuesta();
            $datos = json_decode($json, true);

            if (!isset($datos['usuario']) || !isset($datos['fechaCreacion']) || !isset($datos['fechaActualizacion']) || !isset($datos['estatus']) ) {
                $resultado = $res->error_400();
                 
            }else {
                $usuario = $datos['usuario'];
                $fechaCreacion = $datos['fechaCreacion'];
                $fechaActualizacion = $datos['fechaActualizacion'];
                $estatus = $datos['estatus'];
                
                $sql = "INSERT INTO ticket
                (
                    usuario,
                    fechaCreacion,
                    fechaActualizacion,
                    estatus
                )
                VALUES
                (
                    '$usuario',
                    '$fechaCreacion',
                    '$fechaActualizacion',
                    '$estatus'
                )";

                
                $result = $this->runQuery($sql);

                if ($result->rowCount() > 0) {
                    $resultado = array(
                        'status' => 'Ok',
                        'resultado' => 'Registrado'
                    );
                }else {
                    $resultado = $this->error_500();
                }
            }

            return json_encode($resultado);
            
        }

        public function updateTicket($json)
        {
            $res = new respuesta();
            $datos = json_decode($json, true);

            if (!isset($datos['usuario']) || !isset($datos['fechaCreacion']) || !isset($datos['fechaActualizacion']) || !isset($datos['estatus']) || !isset($datos['id']) ) {
                $resultado = $res->error_400();
                 
            }else {
                $usuario = $datos['usuario'];
                $fechaCreacion = $datos['fechaCreacion'];
                $fechaActualizacion = $datos['fechaActualizacion'];
                $estatus = $datos['estatus'];
                $id = $datos['id'];
                $sql = "UPDATE ticket SET usuario = '$usuario', fechaCreacion = '$fechaCreacion', fechaActualizacion = '$fechaActualizacion', estatus = '$estatus' WHERE id= ".$id;
              
                if ($this->runQuery($sql)) {
                    $resultado = array(
                        'status' => 'Ok',
                        'resultado' => 'Actualizado'
                    );
                }else {
                    $resultado = $this->error_500();
                }
            }

            return json_encode($resultado);
            
        }

        public function deleteTicket($json)
        {
            $res = new respuesta();
            $datos = json_decode($json, true);

            if (!isset($datos['id'])) {
                $resultado = $res->error_400();
                 
            }else {
                $id = $datos['id'];
                $sql = "DELETE FROM ticket WHERE id = ".$id;
              
                if ($this->runQuery($sql)) {
                    $resultado = array(
                        'status' => 'Ok',
                        'resultado' => 'Eliminado'
                    );
                }else {
                    $resultado = $this->error_500();
                }
            }

            return json_encode($resultado);
            
        }
    }
    