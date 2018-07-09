<?php

namespace Mini\Model;
use Mini\Core\Model;

class Comida extends Model 
{

private $id;
private $nombreComida;

public function __SET($attr,$value)
{
    $this->$attr = $value;
}

public function __GET($attr)
{
    return $this->$attr;
}

public function listar()
{
    $sql = "SELECT * FROM comida";
    $query = $this->db->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

}



