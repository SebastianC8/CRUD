<div class="container">
    <h2>You are in the View: application/view/sport/edit.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div>
        <h3>Edit a sport</h3>
        <form action="<?php echo URL; ?>sport/updateSport" method="POST">
            <label>Sport</label>
            
            <input type="text" name="nameSport" value="<?php echo htmlspecialchars($sport->nameSport, ENT_QUOTES, 'UTF-8'); ?>" required />

            <label>Team</label>
            <select name="selectTeams">
                <?php foreach ($team as $item){?> 
                    <option value="<?php echo $item->idTeam?>"> <?php echo $item->nameTeam ?> </option> 
                <?php } ?> 
            </select> 
            <!-- <select name="selectTeams" value="<?php echo htmlspecialchars($sport->idTeam, ENT_QUOTES, 'UTF-8'); ?>" /> -->
            <input type="hidden" name="idSport" value="<?php echo htmlspecialchars($sport->idSport, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_sport" value="Update" />
        </form>
    </div>
</div>


