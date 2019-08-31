<?php
include('backend/manejador.php');
$plantobj = new plantilla();
class plantilla
{
    
    function __construct(){
?>
<!doctype html>
<html lang="es">

<head>
        
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Gestion Escolar - ITLA</title>
</head>

<body>
    <div class="container-fluid badge-primary">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="./">
                    <img src="icons/academy.png" alt="" class="img-fluid">
                    Gestion Escuelas - ITLA
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">

                    <ul class="navbar-nav m-auto mt-2 mt-lg-0">
                        <!---
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Action 1</a>
                                <a class="dropdown-item" href="#">Action 2</a>
                            </div>
                        </li> --->
                    </ul>
                    <span class="navbar-text">
                        <p class="text-white ">Pedro David Chalas Garcia</p>
                    </span>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group mt-4 list-group-flush border border-primary text-center">
                    <a href="./" class="list-group-item list-group-item-action">
                    <img src="icons/school.png" alt="" srcset="">Escuelas </a>
                    <div class=" dropdown dropright border">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle" href="#"
                            role="button" id="dropdonEstudiantes" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><img src="icons/student.png" alt="" srcset="">Estudiantes </a>
                        <div class="dropdown-menu" aria-labelledby="dropdonEstudiantes">
                            <a class="dropdown-item" href="insert-estudiantes.php">Registrar Estudiantes</a>
                            <a class="dropdown-item" href="aginarMateriasaEstudiantes.php">Asignar Materias a Estudiante</a>
                            <a class="dropdown-item" href="consultar-materia-estudiantes.php">Consultar Materias de Estudiante</a>
                            <a class="dropdown-item" href="cambiar-grupo.php">Cambiar Grupo de Estudiante</a>
                            
                        </div>
                    </div>
                    <div class=" dropdown dropright border-0">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle" href="#"
                            role="button" id="dropdonProfesores" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><img src="icons/teacher.png" alt="" srcset="">Profesores </a>
                        <div class="dropdown-menu" aria-labelledby="dropdonProfesores">
                            <a class="dropdown-item" href="insert-profesor.php">Registrar Profesor</a>
                            <a class="dropdown-item" href="asignarMateriasProfesores.php">Asignar Materias a Profesores</a>
                            <a class="dropdown-item" href="consultar-materias-impartidas.php">Consultar Materias de Profesor</a>
                            <a class="dropdown-item" href="consultargrupos.php">Consultar Grupos de estudiantes</a>
                            
                        </div>
                    </div>


                    <div class="dropdown dropright border">
                        <a href="#" id="dropdownpadre" data-toggle="dropdown"
                            class="list-group-item list-group-item-action dropdown-toggle"><img src="icons/father.png" alt="" srcset="">Padres </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownpadre">
                            <a href="insert-padre-o-tutor.php" class="dropdown-item">Registrar Padre o Tutor</a>
                            <a href="consultar-hijos.php" class="dropdown-item">Consultar Hijos</a>
                            

                        </div>

                    </div>
                    <div class="dropdown dropright border">
                        <a href="#" class="list-group-item list-group-item-action dropdown-toggle"
                            data-toggle="dropdown"><img src="icons/matter.png" alt="" srcset="">Materias </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="insert-materias.php">Registrar Materias</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-9 mt-4">


                <?php
    }

    function __destruct(){
?>

            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>

<?php
    }
}