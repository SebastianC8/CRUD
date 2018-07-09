<br><br>
<div class="container">
    <h1><!--<i class="fas fa-male">--> Personas </i></h1>
<table class="table">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <!-- <th>Apellido</th> -->
            <th>Teléfono</th>
            <!-- <th>Dirección</th> -->
            <th>Correo</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($registros as $recorrer){ ?>
            <tr>
                <td><?php if (isset($recorrer->documento)) echo htmlspecialchars($recorrer->documento, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($recorrer->nombre)) echo htmlspecialchars($recorrer->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
                <!-- <td><?php if (isset($recorrer->apellido)) echo htmlspecialchars($recorrer->apellido, ENT_QUOTES, 'UTF-8'); ?></td> -->
                <td><?php if (isset($recorrer->telefono)) echo htmlspecialchars($recorrer->telefono, ENT_QUOTES, 'UTF-8'); ?></td>
                <!-- <td><?php if (isset($recorrer->direccion)) echo htmlspecialchars($recorrer->direccion, ENT_QUOTES, 'UTF-8'); ?></td> -->
                <td><?php if (isset($recorrer->correo)) echo htmlspecialchars($recorrer->correo, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($recorrer->estado)) echo htmlspecialchars($recorrer->estado==true?"Activo":"Inactivo", ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                <a title="Editar" href="<?php echo URL . 'persona/editar/' . htmlspecialchars($recorrer->id, ENT_QUOTES, 'UTF-8'); ?>"><i class="fas fa-edit"></i></a>
                    <?php if($recorrer->estado): ?> 
                        <a title="Cambiar estado" href="<?php URL ?>Persona/estado/0/<?php echo $recorrer->id ?>"><i class="fas fa-exchange-alt"></i></a>
                    <?php else: ?>
                    <a title="Cambiar estado" href="<?php URL ?>Persona/estado/1/<?php echo $recorrer->id ?>"><i class="fas fa-exchange-alt"></i></a>
                    <?php endif ?>
                    <button title="Ver detalle"type="button" onclick="ver_detalle_persona()" class="btn btn-dark" data-toggle="modal" data-target="#modal_comida">
                    <i class="fas fa-eye"></i>
                        </button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<br><br>
<!-- <h1>Personas y comidas</h1>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Comida</th>
            <th>Veces</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($recorrerPC as $travel){ ?>
        <tr>
            <td><?php if (isset($travel->nombre)) echo htmlspecialchars($travel->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($travel->nombre_comida)) echo htmlspecialchars($travel->nombre_comida, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($travel->veces)) echo htmlspecialchars($travel->veces, ENT_QUOTES, 'UTF-8'); ?></td>
            <td>
            <button title="Ver detalle"type="button" onclick="ver_detalle_persona()" class="btn btn-dark" data-toggle="modal" data-target="#modal_comida"><i class="fas fa-eye"></i>
            </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table> -->

<script>

    function ver_detalle_persona(id)
    {
        $.ajax({
            type: 'get',
            dataType: 'json',
            url: "<?php echo URL; ?>/persona/listarComidas/"+id 
        }).done((respuesta)=>{
            if(respuesta.length > 0)
            {
                respuesta.forEach((e,i)=>{
                    $("#contenedor_comida").append(
                        `<div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">`+e.nombreComida+`</h5>
                                <p class="card-text">
                                se come `+e.veces+`veces
                                </p>
                            </div>
                            </div>`
                    );
                })
                $("#nombre_persona_comida").html(respuesta[0].nombre);
                $("#modal_comida").modal();
            }else
            {
                alert("No tiene comidas.");
            }
        })
    }
    function answer()
        {
            alert("Las personas se han listado correctamente.");
        }


</script>


<!-- Modal -->
<html>
<div class="modal fade" id="modal_comida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        Personas y comidas <span id="nombre_persona_comida"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="contenedor_comida">

        <!-- <div class="card" style="width: 29rem;">
                            < <img class="card-img-top" src="http://www.1wra.org/Public/Uploads/Project/4fc191e6ef914.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">`+e.nombreComida+`</h5>
                                <p class="card-text">
                                se come `+e.veces+`veces
                                </p>
                            </div>
                            </div>  -->
             <table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Comida</th>
            <th>Veces</th>
            <!-- <th>Opciones</th>  -->
        </tr>
    </thead>
    <tbody>
         <?php foreach($recorrerPC as $travel){ ?>
        <tr>
            <td><?php if (isset($travel->nombre)) echo htmlspecialchars($travel->nombre, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($travel->nombre_comida)) echo htmlspecialchars($travel->nombre_comida, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($travel->veces)) echo htmlspecialchars($travel->veces, ENT_QUOTES, 'UTF-8'); ?></td>
        </tr> 
         <?php } ?> 

    </tbody>
</table>  


        </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" onclick="answer()" class="btn btn-primary">Guardar</button>
        </div>
    </div>
  </div>


</html>

<!-- drag and drup -->