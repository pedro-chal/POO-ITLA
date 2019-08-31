<?php 
include('plantilla.php');
$data = new escuela();
$estud = $data->ConsultarGeneral("CALL sp_consultarEstudiante()");
if ($_POST) {
    $estudiante = $_POST['cmbestu'];

        $datos = $data->ConsultarGeneral("CALL sp_consultarRelacionMaterias($estudiante)");
    }

?>
<center>
    <label class="text-center display-4 lead ">Consultar Materias de Estudiantes</label>
</center>
<hr>
<form action="" method="post">
    <center>
        <div class="input-group m-1">

            <label class="h4 mx-1">Estudiante:</label>
            <select class="form-control d-inline mx-1" name="cmbestu" id="">
                <?php
                    foreach ($estud as $key => $value) {
                        ?>
                <option value="<?php echo $value['Codigo']; ?>"><?php echo $value['Estudiante']; ?></option>
                <?php
                    }

                    ?>

            </select>
            
            
            <button class="btn btn-primary">Consultar</button>
        </div>
    </center>
</form>
<hr>
<div class="text-center">
<h3>Estudiante: <b> <?php if (isset($datos)&&count($datos)>0) { echo $datos[0]['Estudiante'];} ?></b></h3>
<h5 class="d.d-inline">Grupo: <b> <?php if (isset($datos)&&count($datos)>0) { echo $datos[0]['Grupo'];} ?></b></h5>

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Materias</th>
      <th scope="col">Secciones</th>
    </tr>
  </thead>
  <tbody>

  <?php
  if (isset($datos)&&count($datos)>0) {
      # code...
  
    foreach ($datos as $key => $value) {
    ?>
      <tr>
     
     <td><?php echo $value['Materia'] ?></td>
     <td><?php echo $value['seccion'] ?></td>
     
   </tr>
        <?php
    }
}

        ?>
    
    
    
  </tbody>
</table>
</div>