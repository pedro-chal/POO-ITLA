<?php 
include('plantilla.php');
$data = new escuela();
$profesor = $data->ConsultarGeneral("CALL sp_consultarDocentes()");

if ($_POST) {
    $docente = $_POST['cmbestu'];
   
        $datos = $data->ConsultarGeneral("CALL sp_consultaRelacionProfesor($docente)");
    }

?>
<center>
    <label class="text-center display-4 lead ">Consultar Materias Impartidas Profesor</label>
</center>
<hr>
<form action="" method="post">
    <center>
        <div class="input-group m-1">

            <label class="h4 mx-1">Profesor:</label>
            <select class="form-control d-inline mx-1" name="cmbestu" id="">
                <?php
                    foreach ($profesor as $key => $value) {
                        ?>
                <option value="<?php echo $value['id_docente']; ?>"><?php echo $value['nombre']; ?></option>
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
<h3>Profesor: <b> <?php if (isset($datos)&&count($datos)>0) { echo $datos[0]['Docente'];} ?></b></h3>

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