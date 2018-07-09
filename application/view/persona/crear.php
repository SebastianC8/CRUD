<div class="container">
    <center><h1>Personas</h1></center>
    <!-- <h2>You are in the View: application/view/persona/crear.php (everything in this box comes from that file)</h2> -->
    <!-- add song form -->
    <div class="box" style="align:center">
        <h3>Añadir a persona</h3>

        <form class="form-group" action="<?php echo URL; ?>Persona/guardar" method="POST">
            <div class="row">
            <div class="col-md-4">
            <label>Documento</label>
            <input class="form-control" type="text" name="documento" value=""  required />
            </div>
            <div class="col-md-4">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" value=""  />
            </div>
            <div class="col-md-4">
            <label>Teléfono</label>
            <input class="form-control" type="text" name="telefono" value="" />
            </div>
            </div>
            <div class="row">
            <!-- <br><br><br> -->
            <div class="col-md-4">
            <label>Correo</label>
            <input class="form-control" type="text" name="correo" value=""  />
            </div>
            <div class="col-md-4">
                <label>Comidas</label>
                
                <select class="form-control" style="width:'100%'" id="comida">
                    <option value="">Seleccione</option>
                    <?php foreach ($comidas as $value) :?> 
                        <option value="<?php echo $value->id?>"> <?php echo $value->nombre_comida ?> </option> 
                    <?php endforeach ?> 
                </select> 
            </div>
                <!-- <div class="row"> -->
                <div class="col-md-4">
                <label> Veces </label>
                <input class="form-control " type="text" id="veces"><br>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp; <button class="btn btn-dark" type="button" onclick="agregarComidas()">Añadir <i class="fas fa-plus-circle"></i></button>
            </div>
              <br><br>
                
                <table id="tbl_comidas" class="table">
                    <thead>
                        <tr>
                            <th>Comida</th>
                            <th>Veces</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                        <tbody>
                        
                        </tbody>
                </table>    

            <br>
            <input class ="btn btn-primary" type="submit" name="" value="Enviar" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">

    </div>

    <script>

    function agregarComidas()
    {
        let id_comida = $("#comida").val();
        let text_comida = $("#comida option:selected").text();
        let veces = $("#veces").val();

        $("#tbl_comidas").append(
            "<tr id='tr"+id_comida+"'> <input type='hidden' name='comidas_id[]' value='"+id_comida+"'> <input type='hidden' name='veces[]' value='"+veces+"'> <td>"+text_comida+"</td><td>"+veces+"</td><td><button class='btn btn-danger' type='button' onclick='$("+'"'+"#tr"+id_comida+'"'+").remove()'><i class='fas fa-trash'></i></button></td><tr>");
    }
    </script>

    <script>

    </script>

    <!-- // <button type="hidden" class="btn btn-primary" onclick="answer()">
    // Preguntar
    // </button> -->