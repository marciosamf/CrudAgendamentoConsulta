<?php
/**
 * Realiza o controle das solicitaçoes do fronte para incluir, editar e excluir 
 * 
 */
include_once "../conexao/Conexao.php";
include_once "../model/Agendamento.php";
include_once "../dao/AgendamentoDAO.php";

//instancia as classes
$agendamento = new Agendamento();
$agendamentodao = new AgendamentoDAO();

//pega todos os dados passado por POST
$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if (isset($_POST['cadastrar'])) {

    $registro = new stdClass;
    $registro->idPaciente = $d['id_paciente'];
    $registro->idMedico = $d['id_medico'];
    $registro->agendamentoData = $d['data'];
    $registro->agendamentoHhora = $d['hora'];

    /* verifica se o registro já está na base*/
    $registros = $agendamentodao->validateInsertUpdate($registro);

    if ($registros[0] > 0) {

        $msg = "Já existe uma agendamento para esse cliente!";
        header("Location: ../../");

        /* faz a inserção caso retorno da consulta seja vazio*/
    } else {

        $agendamento->setIdPaciente($d['id_paciente']);
        $agendamento->setIdMedico($d['id_medico']);
        $agendamento->setData($d['data']);
        $agendamento->setHora($d['hora']);

        $agendamentodao->create($agendamento);

        header("Location: ../../");
    }
}

// se a requisição for editar
else if (isset($_POST['editar'])) {

    $registro = new stdClass;
    $registro->idPaciente = $d['id_paciente'];
    $registro->idMedico = $d['id_medico'];
    $registro->agendamentoData = $d['data'];
    $registro->agendamentoHora = $d['hora'];

    /* verifica se o registro já está na base*/
    $registros = $agendamentodao->validateInsertUpdate($registro);

    if ($registros[0] > 0) {

        $msg = "Já existe uma agendamento para esse cliente!";
        header("Location: ../../");

        /* faz a inserção caso retorno da consulta seja vazio*/
    } else {

        $agendamento->setId($d['id']);
        $agendamento->setIdPaciente($d['id_paciente']);
        $agendamento->setIdMedico($d['id_medico']);
        $agendamento->setData($d['data']);
        $agendamento->setHora($d['hora']);    
    
        $agendamentodao->update($agendamento);

        header("Location: ../../");
    }  

}

// se a requisição for deletar
else if (isset($_GET['del'])) {

    $agendamento->setId($_GET['del']);
    $agendamentodao->delete($agendamento);

    header("Location: ../../");
} else {
    header("Location: ../../");
}
