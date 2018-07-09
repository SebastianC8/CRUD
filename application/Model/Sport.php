<?php


namespace Mini\Model;

use Mini\Core\Model;

class Sport extends Model
{

    public function getAllSports()
    {
        $sql = "SELECT s.idSport, s.nameSport, t.nameTeam AS Team FROM sport s JOIN team t ON s.idTeam=t.idTeam";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function addSport($nameSport, $idTeam)
    {
        $sql = "INSERT INTO sport (nameSport, idTeam) VALUES (:nameSport, :idTeam)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nameSport' => $nameSport, ':idTeam' => $idTeam);

        $query->execute($parameters);
    }


    public function deleteSport($idSport)
    {
        $sql = "DELETE FROM sport WHERE idSport = :idSport";
        $query = $this->db->prepare($sql);
        $parameters = array(':idSport' => $idSport);

        $query->execute($parameters);
    }


    public function getSport($idSport)
    {
        $sql = "SELECT idSport, nameSport, idTeam FROM sport WHERE idSport = :idSport LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':idSport' => $idSport);

        $query->execute($parameters);

        return ($query->rowcount() ? $query->fetch() : false);
    }

    
    public function updateSport($nameSport, $idTeam, $idSport)
    {
        //var_dump($_POST);
        $sql = "UPDATE sport SET nameSport = :nameSport, idTeam = :idTeam WHERE idSport = :idSport";
        $query = $this->db->prepare($sql);
        $parameters = array(':nameSport' => $nameSport, ':idTeam' => $idTeam,':idSport' => $idSport);
        
        $query->execute($parameters);
        //  return $query->execute();
         
    }

    public function getAmountofSports()
    {
        $sql = "SELECT COUNT(idSport) AS amount_of_sports FROM sport";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_sports;
    }

    public function getAllTeams()
    {
        $sql = "SELECT idTeam, nameTeam FROM team";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
