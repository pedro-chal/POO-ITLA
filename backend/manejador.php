<?php
include('conexion.php');
class escuela
{
    public $nombre;
    public $estudiante;
    public $director;
    public $docente;
    public $materia;
    public $tutor;
    public $seccion;

    public function institucion($nombre,$director) {
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_insertEscuelas(?,?)");
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$director);
            $stmt->execute();
        } catch (Exception $th) {
            //throw $th;
            exit;  
             $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }

    public function docentes($nombre){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_insertDocente(?)");
            $stmt->bindParam(1,$nombre);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit;
            $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }
    public function tutores($nombre){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_insertTutores(?)");
            $stmt->bindParam(1,$nombre);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit;
            $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }
    public function estudiantes($nombre,$tutor){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_insertEstudiantes(?,?,'Grupo 1')");
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$tutor);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit; 
              $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }
    public function materias($nombre,$seccion){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_insertMateria(?,?)");
            $stmt->bindParam(1,$nombre);
            $stmt->bindParam(2,$seccion);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit; 
              $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }
    public function docentesAmaterias($docente,$materia){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_docentesAmaterias(?,?)");
            $stmt->bindParam(1,$docente);
            $stmt->bindParam(2,$materia);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit; 
              $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }
    public function estudiantesAmaterias($estudiante,$materia){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_estudiantesAmaterias(?,?)");
            $stmt->bindParam(1,$estudiante);
            $stmt->bindParam(2,$materia);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit; 
              $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }
    public function cambiarGrupos($grupo,$estudiante){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare("CALL sp_UpdateGrupos(?,?)");
            $stmt->bindParam(1,$grupo);
            $stmt->bindParam(2,$estudiante);
            $stmt->execute();
        } catch (Exception $e) {
            //throw $th;
            exit; 
              $stmt=0;
        }
        
         return $stmt;
         Desconectar();
    }

    public function ConsultarGeneral($procedimiento){
        $con = conectar();

        try {
            //code...
            $stmt = $con->prepare($procedimiento);
            $stmt->execute();
            $data = $stmt->FetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            //throw $th;
        }
        return $data;
        Desconectar();
    }
    

}
 
//$dat= new escuela();
//var_dump($dat->ConsultarEscuelas());