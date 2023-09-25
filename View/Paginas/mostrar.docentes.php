<div class="titulo">
    <h1>Registro de Docentes</h1>
</div>
<div class="contenedor">
<?php

$docentes = ControladorFormulario::ctrMostrarDocente(null,null);

?>
<table class="responsive-table">
        <thead>
            
        <tr>
            <th>Nombre</th>
            <th>Grado de Estudio</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th></th>
            
        </tr>
        </thead>

        <tbody>
        <?php
            foreach ($docentes as $key => $value):

            ?>
        <tr>
            <td><?php echo $value["nombre"];?></td>
            <td><?php echo $value["gradoEstudio"];?></td>
            <td><?php echo $value["telefono"];?></td>
            <td><?php echo $value["correo"];?></td>
            <td>
                        <div class="btns">
                        <form method="post">
                                <div class="login__button" style="width: 100px;" id="elidi">
                                <a href="app.php?pagina=editar.docentes&idProfesor=<?php echo $value["idProfesor"]; ?>" class="login__button"><i class="ri-edit-2-line"></i></a>
                                    <!--BOTON PARA ELIMINAR REGISTROS -->
                        <input type="hidden" class="login__button"  value="<?php echo $value["idProfesor"]; ?>" name="eliminarDocente">
                        <button class="button" type="submit" ><i class="ri-delete-bin-line"></i></button>
                            </div>
                        
                        <?php

                        $eliminar = new ControladorFormulario();
                        $eliminar -> ctrEliminarDocente();

                        ?>
                        </form>
                    </div>
                    </td>
        </tr>
        
        <?php endforeach ?>
        
