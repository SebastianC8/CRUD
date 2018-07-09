<div class="container">
    <h2>You are in the View: application/view/team/edit.php (everything in this box comes from that file)</h2>
    <!-- add song form -->
    <div>
        <h3>Edit a song</h3>
        <form action="<?php echo URL; ?>team/updateTeam" method="POST">
            <label>Código</label>
            <input autofocus type="text" name="idTeam" value="<?php echo htmlspecialchars($team->idTeam, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Equipo</label>
            <input type="text" name="nameTeam" value="<?php echo htmlspecialchars($team->nameTeam, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Ciudad</label>
            <input type="text" name="city" value="<?php echo htmlspecialchars($team->city, ENT_QUOTES, 'UTF-8'); ?>" />
            
            <input type="hidden" name="idTeam" value="<?php echo htmlspecialchars($team->idTeam, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_team" value="Update" />
        </form>
    </div>
</div>

