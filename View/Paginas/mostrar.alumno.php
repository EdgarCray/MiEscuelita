<div class="titulo">
    <h1>Alumnos Registrados</h1>

</div>
<div class="contenedor">
<?php

$alumnos = ControladorFormulario::ctrMostrarAlumno(null,null);

?>
<table class="responsive-table">
        <thead>
        <tr >
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Genero</th>
            <th>Grado</th>
            <th>Grupo</th>
            <th>Correo</th>
            <th>Fecha de ingreso</th>
            <th></th>
            
        </tr>
        </thead>

        <tbody>
        <?php
            foreach ($alumnos as $key => $value):

            ?>
        <tr>
            <td><?php echo $value["nombre"];?></td>
            <td><?php echo $value["apellido_p"];?></td>
            <td><?php echo $value["apellido_m"];?></td>
            <td><?php echo $value["edad"];?></td>
            <td><?php echo $value["genero"];?></td>
            <td><?php echo $value["grado"];?></td>
            <td><?php echo $value["grupo"];?></td>
            <td><?php echo $value["correo"];?></td>
            <td><?php echo $value["f_ingreso"];?></td>
            <td>
                        <div class="btns">
                        <form method="post">
                                <div class="login__button" style="display: block;" id="elidi">
                                <a href="app.php?pagina=editar.alumno&idAlumno=<?php echo $value["idAlumno"]; ?>" class="login__button"><i class="ri-edit-2-line"></i></a>
                                    <!--BOTON PARA ELIMINAR REGISTROS -->
                        <input type="hidden" class="login__button"  value="<?php echo $value["idAlumno"]; ?>" name="eliminarAlumno">
                        <button class="button" type="submit" ><i class="ri-delete-bin-line"></i></button>
                            </div>
                        
                        <?php

                        $eliminar = new ControladorFormulario();
                        $eliminar -> ctrEliminarAlumno();

                        ?>
                        </form>
                    </div>
                    </td>
        </tr>
        
        <?php endforeach ?>
        
