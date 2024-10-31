<?php

class Agendamento
{

    private $id;
    private $idPaciente;
    private $nomePaciente;
    private $idMedico;
    private $nomeMedico;
    private $data;
    private $hora;

    function getId()
    {
        return $this->id;
    }

    function getIdPaciente()
    {
        return $this->idPaciente;
    }

    function getNomePaciente()
    {
        return $this->nomePaciente;
    }

    function getNomeMedico()
    {
        return $this->nomeMedico;
    }
    function getIdMedico()
    {
        return $this->idMedico;
    }

    function getData()
    {
        return $this->data;
    }

    function getHora()
    {
        return $this->hora;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    }

    function setNomePaciente($nomePaciente)
    {
        $this->nomePaciente = $nomePaciente;
    }

    function setIdMedico($idMedico)
    {
        $this->idMedico = $idMedico;
    }

    function setNomeMedico($nomeMedico)
    {
        $this->nomeMedico = $nomeMedico;
    }

    function setData($data)
    {
        $this->data = $data;
    }

    function setHora($hora)
    {
        $this->hora = $hora;
    }
}
