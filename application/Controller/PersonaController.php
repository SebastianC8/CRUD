<?php 
namespace Mini\Controller;
use Mini\Model\Persona;
use Mini\Model\Comida;
use Mini\Model\PersonasHasComida;

class PersonaController
{

    public function index()
    {
        $persona = new Persona();
        $registros = $persona->listar();
        $recorrerPC = $persona->listarComidasPersonas();
        include APP.'view/_templates/header.php';
        include APP.'view/persona/index.php';
        include APP.'view/_templates/footer.php';

    }

    public function crear()
    {
        $c = new Comida();
        $comidas = $c->listar(); 

        include APP.'view/_templates/header.php';
        include APP.'view/persona/crear.php';
        include APP.'view/_templates/footer.php';
    }

    public function guardar()
    {
        $persona = new Persona();

        $persona->__SET("documento", $_POST["documento"]);
        $persona->__SET("nombre", $_POST["nombre"]);
        $persona->__SET("telefono", $_POST["telefono"]);
        $persona->__SET("correo", $_POST["correo"]);

        try{

            $respuesta = $persona->guardar();

        if($respuesta!=false)
        {
            $ultimo = $respuesta->id;
            foreach($_POST["comidas_id"] as $key => $value)
            {
                $pc = new PersonasHasComida();
                $pc->__SET("idPersona", $ultimo);
                $pc->__SET("idComida", $value);
                $pc->__SET("veces", $_POST["veces"][$key]);
                $pc->guardar();
            }

            $_SESSION["mensaje"] = "<script> alert('Felicidades.') </script>";
        }
        else
        {
            $_SESSION["mensaje"] = "<script> alert('Error.') </script>";
        }
        }catch(\Exception $ex)
        {
            $_SESSION["mensaje"] = $ex->getMessage();
        }   

        header("location: ".URL."/Persona/index");
    }

    public function editar($id)
    {   
        $persona = new Persona();

        $persona->__SET("id", $id);

        $respuesta = $persona->editar();
        //var_dump($respuesta);
        include APP.'view/_templates/header.php';
        include APP.'view/persona/editar.php';
        include APP.'view/_templates/footer.php';

    }

    public function consultarPeople($id)
    {
        $persona = new Persona();
        $persona->SET("id", $id);

        $hola = $persona->consultarPersona();
    }


    public function modificar()
    {
        $persona = new Persona();

        $persona->__SET("documento", $_POST["documento"]);
        $persona->__SET("nombre", $_POST["nombre"]);
        $persona->__SET("telefono", $_POST["telefono"]);
        $persona->__SET("correo", $_POST["correo"]);
        $persona->__SET("id", $_POST["id"]);

        $respuesta = $persona->modificar();

        if($respuesta == true)
        {
            $_SESSION["mensaje"] = "<script> alert('Felicidades.') </script>";
        }
        else
        {
            $_SESSION["mensaje"] = "<script> alert('Error.') </script>";
        }

        header("location: ".URL."/Persona/index");
    }

    public function estado($estado,$id)
    {
        $persona = new Persona();

        $persona->__SET("estado", $estado);
        $persona->__SET("id", $id);

        $respuesta = $persona->modificar_estado();
        
        if($respuesta == true)
        {
            $_SESSION["mensaje"] = "<script> alert('Felicidades.') </script>";
        }
        else
        {
            $_SESSION["mensaje"] = "<script> alert('Error.') </script>";
        }

        header("location: ".URL."/Persona/index");
    }
}
