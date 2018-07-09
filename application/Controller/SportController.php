<?php

namespace Mini\Controller;

use Mini\Model\Sport;

class SportController
{
    public function index()
    {
        $Sport = new Sport();
       /*Aquí traigo el método del modelo.*/ 
        $team = $Sport->getAllTeams();
        // var_dump($team);
        $sport = $Sport->getAllSports();
        $amount_of_sports = $Sport->getAmountofSports();
        require APP . 'view/_templates/header.php';
        require APP . 'view/sport/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addSport()
    {
        //var_dump($_POST);
        if (isset($_POST["submit_add_sport"])) {
            $Sport = new Sport();
            $Sport->addSport($_POST["nameSport"], $_POST["selectTeams"]);
        }
        header('location: ' . URL . 'sport/index');
    }


    public function deleteSport()
    {
            $Sport = new Sport();
            $Sport->deleteSport($_POST['idTeam']);
        
        header('location: ' . URL . 'sport/index');
    }

    public function editSport($idSport)
    {
        if (isset($idSport)) {
            // Instance new Model (Song)
            $Sport = new Sport();
            // do getSong() in model/model.php
            $sport = $Sport->getSport($idSport);

            // If the song wasn't found, then it would have returned false, and we need to display the error page
            if ($sport === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else 
            {
                $team = $Sport->getAllTeams();

                require APP . 'view/_templates/header.php';
                require APP . 'view/sport/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
            // redirect user to songs index page (as we don't have a song_id)
            header('location: ' . URL . 'sport/index');
        }
    }

    public function updateSport()
    {
        // if we have POST data to create a new song entry
        
        if (isset($_POST["submit_update_sport"])) {
            // Instance new Model (Song)
            $Sport = new Sport();
            $team = $Sport->getAllTeams();
            // do updateSong() from model/model.php
            $Sport->updateSport($_POST["nameSport"], $_POST["selectTeams"], $_POST["idSport"]);
            //Svar_dump($team);
        }//

        // where to go after song has been added
         header('location: ' . URL . 'sport/index');
    }

    public function ajaxGetStats()
    {
        $Sport = new Sport();
        $amount_of_sports = $Sport->getAmountofSports();

        echo $amount_of_sports;
    }

}
