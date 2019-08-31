<?php


function Conectar(){

    try {
        //conexion a nuestra base de datos
        $con = new PDO ("mysql:host=localhost;dbname=gestion_escuela","root","");
     
        return $con;
    } catch (Exception $e) {
        //throw $th;
        print "ERROR!" . $e->getMessage() . "<br/>";
            die();
    }

}

function Desconectar(){

    global $con, $stmt;
    $stmt->closeCursor();
    $stmt = null;
    $con  = null;
 
}

