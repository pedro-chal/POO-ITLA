<?php include('plantilla.php');
$manejador = new escuela();
if ($_POST) {
    # code...
    $nombre_escuela = $_POST['txtescuela'];
    $nombre_dir = $_POST['txtdirector'];

    
    $res = $manejador->institucion($nombre_escuela,$nombre_dir);
    if ($res) {
        # code...
        echo "
        <script>
        
        alert('Agregado Correctamente');
        
        </script>
        
        
        ";
    }

}
$datos_escuelas = $manejador->ConsultarGeneral("CALL sp_consultarEscuelas()");

?>
<center>

    <label class="text-center display-4 lead ">Registrar Escuelas</label>
</center>
<hr>


<form action="" method="post">
    <center>
        <div class="input-group m-1">

            <label class="h4 mx-1">Escuela:</label>
            

            <input name="txtescuela" autocomplete="off" type="text" required class="form-control d-inline mx-1">

            <label class="h4 mx-1">Director:</label>
            
            <input name="txtdirector" autocomplete="off" type="text" required class=" mx-1 form-control d-inline" >
         
            <button class="btn btn-primary">Registrar</button>
        </div>
    </center>
</form>


<table class="table">
    <thead>
        <tr>
            <th scope="col">Codigo</th>
            <th scope="col">Escuela</th>
            <th scope="col">Director</th>

        </tr>
    </thead>
    <tbody>

        <?php
foreach ($datos_escuelas as $key => $value) {
    # code...

?>


        <tr>
            <th scope="row"><?php echo $value['Codigo'];   ?></th>
            <td><?php echo $value['Escuela'];   ?></td>
            <td><?php echo $value['director'];   ?></td>

        </tr>

        <?php
}
    ?>

    </tbody>
</table>