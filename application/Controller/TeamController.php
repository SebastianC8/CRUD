<?php

namespace Mini\Controller;

use Mini\Model\Team;

class TeamController
{
    public function index()
    {
        $Team = new Team();

        $team = $Team->getAllTeams();
        $amount_of_teams = $Team->getAmountofTeams();

        require APP . 'view/_templates/header.php';
        require APP . 'view/team/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addTeam()
    {
        //var_dump($_POST);
        if (isset($_POST["submit_add_team"])) {
            $Team = new Team();
            $Team->addTeam($_POST["idTeam"], $_POST["nameTeam"],  $_POST["city"]);
        }
        header('location: ' . URL . 'team/index');
    }


    
    public function deleteTeam()
    {
            $Team = new Team();
            $Team->deleteTeam($_POST['id']);
        //header('location: ' . URL . 'team/index'); 
    }

    public function editTeam($idTeam)
    {
        // if we have an id of a song that should be edited
        if (isset($idTeam)) {
            // Instance new Model (Song)
            $Team = new Team();
            // do getSong() in model/model.php
            $team = $Team->getTeam($idTeam);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($team === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $song easily
                require APP . 'view/_templates/header.php';
                require APP . 'view/team/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'team/index');
        }
    }

    public function updateTeam()
    {
        // if we have POST data to create a new song entry
        
        if (isset($_POST["submit_update_team"])) {
            // Instance new Model (Song)
            $Team = new Team();
            // do updateSong() from model/model.php
            $Team->updateTeam($_POST["idTeam"], $_POST["nameTeam"],  $_POST["city"]);
            //Svar_dump($Team);
        }//

        // where to go after song has been added
         header('location: ' . URL . 'team/index');
    }

    public function ajaxGetStats()
    {
        $Team = new Team();
        $amount_of_teams = $Team->getAmountofTeams();

        echo $amount_of_teams;
    }

}
