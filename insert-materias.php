<?php include('plantilla.php');
$data = new escuela();

$materias = $data->ConsultarGeneral("CALL sp_consultarMaterias()");
if ($_POST) {
    # code...
$mat = $_POST['txtmateria'];
$secc = $_POST['txtseccion'];
$res = $data->materias($mat ,$secc);

if ($res) {
    # code...
    echo "
    <script>
    
    alert('Agregado Correctamente');
    
    </script>
    
    
    ";
}

$materias = $data->ConsultarGeneral("CALL sp_consultarMaterias()");
}

?>
<center>
    <label class="text-center display-4 lead ">Datos Materias</label>
</center>
<hr>
<form action="" method="post">

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">Materia y Seccion:</span>
        </div>
        <input autocomplete="off" name="txtmateria" required type="text" class="form-control">
        <input autocomplete="off" name="txtseccion" required type="text" class="form-control">
       
        <button class="btn btn-primary mx-1">Guardar</button>
    </div>

</form>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Materia</th>
            <th scope="col">Seccion</th>
        </tr>
    </thead>
    <tbody>
        <?php
    foreach ($materias  as $key => $value) {
        ?>
        <tr>

            <th scope="row"><?php echo $value['id_materia'] ?></th>
            <td><?php echo $value['nombre'] ?></td>
            <td><?php echo $value['seccion'] ?></td>

        </tr>
        <?php
    }

?>


    </tbody>
</table>