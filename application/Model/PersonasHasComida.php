<?php

namespace Mini\Model;
use Mini\Core\Model;

class PersonasHasComida extends Model 
{

private $id;
private $idPersona;
private $idComida;
private $veces;  

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
    $sql = "SELECT p.*, c.nombre_comida, tc.veces
    FROM persona_has_comida tc
    INNER JOIN comida c ON (c.id = tc.idComida)
    INNER JOIN persona p ON (p.id = tc.idPersona)
    WHERE tc.idPersona = ?";

    $query = $this->db->prepare($sql);
    $query->bindParam(1, $this->idPersona);
    $query->execute();
    return $query->fetchAll();
}

public function guardar()
{
    $sql = "INSERT INTO persona_has_comida VALUES (NULL, ?, ?, ?)";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $this->idPersona);
    $query->bindParam(2, $this->idComida);
    $query->bindParam(3, $this->veces);

    return $query->execute();
}

public function modificar()
{
    $sql = "UPDATE persona_has_comida SET idPersona = ?, idComida = ?, veces = ? WHERE idPersonaComida = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $this->idPersona);
    $query->bindParam(2, $this->idComida);
    $query->bindParam(3, $this->veces);
    $query->bindParam(4, $this->id);

    return $query->execute();
}

public function eliminar()
{
    $sql = "DELETE FROM persona_has_comida WHERE idPersonaComida = ?";
    $query = $this->db->prepare($sql);
    $query->bindParam(1, $this->id);

    return $query->execute();
}

}



