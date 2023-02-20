<?php

    require_once('./class/respuestaClass.php');
    require_once('./class/ticketClass.php');
    header('Content-type: application/json');
 
    $respuesta = new respuesta();
    $ticket = new tickets();

    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
       
        $posbody = file_get_contents("php://input");
        $resultado = $ticket->insertTicket($posbody);

        var_dump($resultado);
        
        
    }elseif ($_SERVER['REQUEST_METHOD'] == "GET") {

        if (isset($_GET['pagina'] )) {
            $pagina = $_GET['pagina'];
            $ticket->listartickets($pagina);
        }
        if (isset($_GET['id'] )) {
            $id = $_GET['id'];
            $ticket->detalleticket($id);
        }
        
    }elseif ($_SERVER['REQUEST_METHOD'] == "PUT") {

        $posbody = file_get_contents("php://input");
        $resultado = $ticket->updateTicket($posbody);
        var_dump($resultado);

    }elseif ($_SERVER['REQUEST_METHOD'] == "DELETE") {

        $posbody = file_get_contents("php://input");
        $resultado = $ticket->deleteTicket($posbody);
        var_dump($resultado);
    }
    
    else{
        
        $datosArray = $respuesta->error_405();
        echo json_encode($datosArray);
    }


    