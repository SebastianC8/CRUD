<div class="container">
    <h1>Teams</h1>
    <h2>You are in the View: application/view/team/index.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div class="box">
        <h3>Add a team</h3>
        <form action="<?php echo URL; ?>team/addTeam" method="POST">
            <label>Código</label>
            <input type="text" name="idTeam" value="" placeholder="Ingrese el código del equipo" required />
            <label>Nombre</label>
            <input type="text" name="nameTeam" value=""  />
            <label>Ciudad</label>
            <input type="text" name="city" value="" />
            <input type="submit" class="btn btn-primary" name="submit_add_team" value="Submit" />
        </form>
        <!-- <table id="sc" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table> -->
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of teams: <?php echo $amount_of_teams; ?></h3>
        <!-- <h3>Amount of teams (via AJAX)</h3> -->
        <!-- <div id="javascript-ajax-result-box"></div> -->
        <div>
            <button id="javascript-ajax-button">Click here to get the amount of teams via Ajax (will be displayed in #javascript-ajax-result-box ABOVE)</button>
        </div>
        <h3>List of teams (data from model)</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Code</td>
                <td>Team</td>
                <td>City</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($team as $team) { ?>
                <tr>
                    <td><?php if (isset($team->idTeam)) echo htmlspecialchars($team->idTeam, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($team->nameTeam)) echo htmlspecialchars($team->nameTeam, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($team->city)) echo htmlspecialchars($team->city, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td> <input class="btn btn-primary" type="button" onclick="idEliminar(<?=$team->idTeam?>)" value="delete"> </td>
                    <!-- <td><a href="<?php echo URL . 'team/deleteTeam/' . htmlspecialchars($team->idTeam, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td> -->
                    <td><a href="<?php echo URL . 'team/editTeam/' . htmlspecialchars($team->idTeam, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
            </table>
            </script>

<body>

    </div>
    
</div>


<script>
function acceptDelete()
    {
     var mssg;
     var option = confirm ("¿Are you sure want to delete this record?");
    //  alert(option);
     if (option == true)
    {
        alert("Registro eliminado.");
    }
    else
    {
        location.reload();
        alert("El registro no fue eliminado.");
    }

    }

    $(document).ready( function () {
    $('#sc').DataTable();
} );

    function idEliminar($idTeam){   
        var a = $idTeam;
        var option = confirm ("¿Are you sure want to delete this record?");
        if (option == true)
        {
            $.ajax({
                url:'<?php echo URL; ?>Team/deleteTeam',
                type:'POST',
                data: {
                    "id":a
                }
        })
            alert("Registro eliminado.");
            location.reload();

        }
        else
        {
            alert("No se pudo eliminar el registro.");
            location.reload();
        }
    }
</script>

