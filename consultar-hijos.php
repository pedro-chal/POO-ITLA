<?php 
include('plantilla.php');
$data = new escuela();
$padre = $data->ConsultarGeneral("CALL sp_consultarTutores()");
if ($_POST) {
       $id = $_POST['cmb'];
  
      $datos = $data->ConsultarGeneral("CALL sp_consultarHijos($id)");
    
    
}
?>
<center>
    <label class="text-center display-4 lead ">Consultar Hijos</label>
</center>
<hr>
<form action="" method="post">
    <center>
        <div class="input-group m-1">

        <label class="h4 mx-1">Padres o Tutores:</label>
        <select class="form-control d-inline mx-1" name="cmb" id="">
                <?php
                    foreach ($padre as $key => $value) {
                        ?>
                <option value="<?php echo $value['id_tutor']; ?>"><?php echo $value['nombre']; ?></option>
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
<h3>Padre: <b> <?php if (isset($datos)&&count($datos)>0) { echo $datos[0]['Padre'];} ?></b></h3>

<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Matricula</th>
      <th scope="col">Nombres y Apellidos</th>
      <th scope="col">Grupo</th>

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
     <td><?php echo $value['Grupo'] ?></td>
     
     
   </tr>
        <?php
    }
}

        ?>
    
    
    
  </tbody>
</table>
</div>