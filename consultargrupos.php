<?php 
include('plantilla.php');
$data = new escuela();

if ($_POST) {
    $grupos = $_POST['cmbmate'];
  
      $datos = $data->ConsultarGeneral("CALL sp_consultarGrupos('$grupos')");
    
    
}
?>
<center>
    <label class="text-center display-4 lead ">Consultar Estudiantes Grupos</label>
</center>
<hr>
<form action="" method="post">
    <center>
        <div class="input-group m-1">

        <label class="h4 mx-1">Grupos:</label>
            <select class=" mx-1 form-control d-inline" name="cmbmate" id="">
               
                <option value="Grupo 1">Grupo 1</option>
                <option value="Grupo 2">Grupo 2</option>
                <option value="Grupo 3">Grupo 3</option>
               
            </select>
            
            <button class="btn btn-primary">Consultar</button>
        </div>
    </center>
</form>
<hr>
<div class="text-center">
<h3>Grupo: <b> <?php if (isset($datos)&&count($datos)>0) { echo $datos[0]['Grupo'];} ?></b></h3>

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Matricula</th>
      <th scope="col">Nombres y Apellidos</th>
      <th scope="col">Padres o Tutor</th>
    </tr>
  </thead>
  <tbody>

  <?php
  if (isset($datos)&&count($datos)>0) {
      # code...
  
    foreach ($datos as $key => $value) {
    ?>
      <tr>
     
     <td><?php echo $value['Matricula'] ?></td>
     <td><?php echo $value['Estudiante'] ?></td>
     <td><?php echo $value['Padre'] ?></td>
     
   </tr>
        <?php
    }
}

        ?>
    
    
    
  </tbody>
</table>
</div>