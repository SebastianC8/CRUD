<div class="container">
    <br><br>
    <h1>Personas</h1>
    <!-- <h2>You are in the View: application/view/persona/crear.php (everything in this box comes from that file)</h2> -->
    <!-- add song form -->
    <div class="box" style="align:center">
        <h3>Editar persona</h3>

        <form class="form-group" action="<?php echo URL; ?>Persona/modificar" method="POST">
        <div class="row">
        <div class="col-md-6">
            <label>Documento</label>
            <input class="form-control" type="text" name="documento" value="<?php echo $respuesta->documento ?>" required />
        </div>
        <div class="col-md-6">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $respuesta->nombre ?>" required />
        </div>
        </div>
            <br><br>
            <div class="row">
            <div class="col-md-6">
            <label>Teléfono</label>
            <input class="form-control" type="text" name="telefono" value="<?php echo $respuesta->telefono ?>" required/>
        </div>
        <div class="col-md-6">
            <label>Correo</label>
            <input class="form-control" type="text" name="correo" value="<?php echo $respuesta->correo ?>" required />
        </div>
            <input type="hidden" name="id" value="<?php echo $respuesta->id ?>">

        </div>
        </form>

    </div>

    <div class="box">
    <input type="submit" class="btn btn-primary" name="" value="Actualizar" />
    </div>
    <br><br>