<?php include('plantilla.php');
$data = new escuela();
$tutores = $data->ConsultarGeneral("CALL sp_consultarTutor()");
$estudiant = $data->ConsultarGeneral("CALL sp_consultarEstudiantes()");
if ($_POST) {
    # code...
$est = $_POST['txtestudiante'];
$padre = $_POST['txtpadre'];
$res = $data->estudiantes($est,$padre);

if ($res) {
    # code...
    echo "
    <script>
    
    alert('Agregado Correctamente');
    
    </script>
    
    
    ";
}
$tutores = $data->ConsultarGeneral("CALL sp_consultarTutor()");
$estudiant = $data->ConsultarGeneral("CALL sp_consultarEstudiantes()");
}

?>
<center>
    <label class="text-center display-4 lead "> Datos Estudiantes</label>
</center>
<hr>
<form action="" method="post">

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Nombre del Estudiante y Padre</span>
        </div>
        <input autocomplete="off" name="txtestudiante" type="text" class="form-control">
        <select name="txtpadre" id="" class="form-control">
            <?php
        foreach ($tutores as $key => $value) {
    ?>
            <option value="<?php echo $value['id_tutor']; ?>"><?php echo $value['nombre'];  ?></option>
            <?php
        }
    ?>

        </select>
        <button class="btn btn-primary mx-1">Guardar</button>
    </div>

</form>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Matricula</th>
            <th scope="col">Estudiantes</th>
            <th scope="col">Padres</th>
        </tr>
    </thead>
    <tbody>
        <?php
    foreach ($estudiant as $key => $value) {
        ?>
        <tr>

            <th scope="row"><?php echo $value['Codigo'] ?></th>
            <td><?php echo $value['Estudiante'] ?></td>
            <td><?php echo $value['Padre'] ?></td>

        </tr>
        <?php
    }

?>


    </tbody>
</table>