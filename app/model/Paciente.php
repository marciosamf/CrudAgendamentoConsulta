<?php

class Paciente
{

    private $id;
    private $nomePaciente;
   
    function getId()
    {
        return $this->id;
    }

    function getNomePaciente()
    {
        return $this->nomePaciente;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNomePaciente($nomePaciente)
    {
        $this->nomePaciente = $nomePaciente;
    }

}
