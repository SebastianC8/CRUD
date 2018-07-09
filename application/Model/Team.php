<?php


namespace Mini\Model;

use Mini\Core\Model;

class Team extends Model
{

    public function getAllTeams()
    {
        $sql = "SELECT idTeam, nameTeam, city FROM team";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function addTeam($idTeam, $nameTeam, $city)
    {
        $sql = "INSERT INTO team (idTeam, nameTeam, city) VALUES (:idTeam, :nameTeam, :city)";
        $query = $this->db->prepare($sql);
        $parameters = array(':idTeam' => $idTeam, ':nameTeam' => $nameTeam, ':city' => $city);

        $query->execute($parameters);
    }


    public function deleteTeam($idTeam)
    {

        $sql = "DELETE FROM team WHERE idTeam = :idTeam";
        $query = $this->db->prepare($sql);
        $parameters = array(':idTeam' => $idTeam);
        
        $query->execute($parameters);
    }


    public function getTeam($idTeam)
    {
        $sql = "SELECT idTeam, nameTeam, city FROM team WHERE idTeam = :idTeam LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idTeam' => $idTeam);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    
    public function updateTeam($idTeam, $nameTeam, $city)
    {
        //var_dump($_POST);
        $sql = "UPDATE team SET nameTeam = :nameTeam, city = :city WHERE idTeam = :idTeam";
        $query = $this->db->prepare($sql);
        $parameters = array(':nameTeam' => $nameTeam, ':city' => $city,':idTeam' => $idTeam);
        
        $query->execute($parameters);
        //  return $query->execute();
         
    }

    public function getAmountofTeams()
    {
        $sql = "SELECT COUNT(idTeam) AS amount_of_teams FROM team";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_teams;
    }
}
