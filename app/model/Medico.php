<?php

class Medico
{

    private $id;
    private $nomeMedico;

    function getId()
    {
        return $this->id;
    }

    function getNomeMedico()
    {
        return $this->nomeMedico;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setNomeMedico($nomeMedico)
    {
        $this->nomeMedico = $nomeMedico;
    }
}
