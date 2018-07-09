<?php

namespace Mini\Model;
use Mini\Core\Model;

class Persona extends Model 
{
    private $id;
    private $documento;
    private $nombre;
    private $apellido;
    private $telefono;
    private $direccion;
    private $correo;
    private $estado;

    public function __SET($attr,$value)
    {
        $this->$attr = $value;
    }

    public function __GET($attr)
    {
        return $this->$attr;
    }
 
    public function guardar()
    {
        $sql = "INSERT INTO persona (documento, nombre, telefono, correo) VALUES (?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->documento);
        $query->bindParam(2,$this->nombre);
        $query->bindParam(3,$this->telefono);
        $query->bindParam(4,$this->correo);

        if($query->execute())
        {
            return $this->ultimo();
        }
        else
        {
            return false;
        }
    }

    public function consultarPersona()
    {
        $sql = "SELECT p.id, p.nombre, c.nombre_comida, pc.veces FROM persona_has_comida pc JOIN persona p ON (pc.idPersona=p.id) JOIN comida c ON (pc.idComida=c.id) WHERE pc.idPersona = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();

        return $query->fetch();
    }

    public function editar()
    {
        $sql = "SELECT id, documento, nombre, telefono, correo FROM persona WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1, $this->id);
        $query->execute();
        
        return $query->fetch();
    }

    public function listarComidasPersonas()
    {
        $sql = "SELECT p.nombre, c.nombre_comida, pc.veces from persona_has_comida pc join persona p on (pc.idPersona=p.id) join comida c on (pc.idComida=c.id)";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function listar()
    {
        $sql = "SELECT id, documento, nombre, telefono, correo, estado FROM persona";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        return $query->fetchAll();
    }

    public function modificar()
    {
        $sql = "UPDATE persona SET documento = ?, nombre = ?,  telefono = ?, correo = ? WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->documento);
        $query->bindParam(2,$this->nombre);
        // $query->bindParam(3,$this->apellido);
        $query->bindParam(3,$this->telefono);
        // $query->bindParam(5,$this->direccion);
        $query->bindParam(4,$this->correo);
        $query->bindParam(5,$this->id);

        return $query->execute();

    }

    public function modificar_estado()
    {
        $sql = "UPDATE persona SET estado = ? WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->bindParam(1,$this->estado);
        $query->bindParam(2,$this->id);

        return $query->execute();
    }

    private function ultimo()
    {
        $sql = "SELECT max(id) as id FROM persona";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

}