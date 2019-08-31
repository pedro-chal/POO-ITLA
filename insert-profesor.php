<?php include('plantilla.php');
$data = new escuela();

if ($_POST) {
    # code...
$docentes = $_POST['txtdocentes'];
$res = $data->docentes($docentes);

if ($res) {
    # code...
    echo "
    <script>
    
    alert('Agregado Correctamente');
    
    </script>
    
    
    ";
}

}
$docent = $data->ConsultarGeneral("CALL sp_consultarDocentes()");
?>
<center>
    <label class="text-center display-4 lead ">Datos Profesores</label>
</center>
<hr>
<form action="" method="post">

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Nombre del Profesor</span>
        </div>
        <input autocomplete="off" name="txtdocentes" type="text" class="form-control">
        <button class="btn btn-primary mx-1">Guardar</button>
    </div>

</form>


<table class="table text-center">
    <thead>
        <tr>
            <th scope="col">Codigos</th>
            <th scope="col">Nombres</th>
         
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($docent)) {
            # code...
        
    foreach ($docent as $key => $value) {
        ?>
        <tr>

            <th scope="row"><?php echo $value['id_docente'] ?></th>
            <td><?php echo $value['nombre'] ?></td>

        </tr>
        <?php
    }
}

?>


    </tbody>
</table>