<div class="container">
    <center><h1>Sports</h1></center>
    <!-- <h2>You are in the View: application/view/sport/index.php (everything in this box comes from that file)</h2> -->
    <!-- add song form -->
    <div class="box">
        <h3>Add a sport</h3>
        <form action="<?php echo URL; ?>sport/addSport" method="POST">
            <label>Sport</label>
            <input type="text" name="nameSport" value="" required />
            <br>
            <br>
            <label>Team</label>

            <select name="selectTeams">
                <?php foreach ($team as $item) {?> 
                    <option value="<?php echo $item->idTeam?>"> <?php echo $item->nameTeam ?> </option> 
                <?php } ?> 
            </select> 

            <input type="submit" class="btn btn-primary" name="submit_add_sport" value="Submit" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Amount of sport: <?php echo $amount_of_sports; ?></h3>
        <!-- <h3>Amount of teams (via AJAX)</h3> -->
        <!-- <div id="javascript-ajax-result-box"></div> -->
        <div>
            <!-- <button id="javascript-ajax-button">Click here to get the amount of sport via Ajax (will be displayed in #javascript-ajax-result-box ABOVE)</button> -->
        </div>
        <!-- <h3>List of sports (data from model)</h3> -->
        <table class="table">
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Code</td>
                <td>Sport</td>
                <td>Team</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            </thead>
            
            <tbody>
            <?php foreach ($sport as $sport) { ?>
                <tr>
                    <td><?php if (isset($sport->idSport)) echo htmlspecialchars($sport->idSport, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($sport->nameSport)) echo htmlspecialchars($sport->nameSport, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($sport->Team)) echo htmlspecialchars($sport->Team, ENT_QUOTES, 'UTF-8'); ?></td>
                   <td> <input class="btn btn-primary" type="button" onclick="deleteTeam(<?=$sport->idSport?>)" value="delete"> </td>
                    <!-- <td><a href="<?php echo URL . 'sport/deleteSport/' . htmlspecialchars($sport->idSport, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td> -->
                    <td><a href="<?php echo URL . 'sport/editSport/' . htmlspecialchars($sport->idSport, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function deleteTeam($idSport)
    { 
        var a="";
        var primaryKey = $idSport;
        var option = confirm ("¿Está seguro que desea eliminar este registro?");
        if(option == true)
        {
            $.ajax({
                url:'<?php echo URL; ?>sport/deleteSport',
                type: 'POST',
                data: {
                    "idTeam": primaryKey
                }
            })
            location.reload();
            alert("Registro eliminado.");
        }
        else
        {
            alert("No se pudo eliminar el registro.");
            location.reload();
        }
    }
</script>