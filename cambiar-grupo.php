<?php 
include('plantilla.php');
$data = new escuela();
$estud = $data->ConsultarGeneral("CALL sp_consultarEstudiante()");
if ($_POST) {
    $estudiante = $_POST['cmbestu'];
    $grupos = $_POST['cmbmate'];
    $res = $data->cambiarGrupos($grupos,$estudiante);

    if ($res) {
        # code...
        echo "
        <script>
        
        alert('Cambio de Grupo Correctamente');
        
        </script>
        
        
        ";
        $datos = $data->ConsultarGeneral("CALL sp_consultarRelacionMaterias($estudiante)");
    }
}
?>
<center>
    <label class="text-center display-4 lead ">Cambios de Grupos</label>
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
            <label class="h4 mx-1">Grupos:</label>
            <select class=" mx-1 form-control d-inline" name="cmbmate" id="">
               
                <option value="Grupo 1">Grupo 1</option>
                <option value="Grupo 2">Grupo 2</option>
                <option value="Grupo 3">Grupo 3</option>
               
            </select>
            <button class="btn btn-primary">Asignar</button>
        </div>
    </center>
</form>
<hr>
<div class="text-center">
<h3>Estudiante: <b> <?php if (isset($datos)) { echo $datos[0]['Estudiante'];} ?></b></h3>
<h5 class="d.d-inline">Grupo: <b> <?php if (isset($datos)) { echo $datos[0]['Grupo'];} ?></b></h5>
<hr>
