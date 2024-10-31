<?php
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
    $registro->IdPaciente = $d['id_paciente'];
    $registro->IdMedico = $d['id_medico'];
    $registro->agendamento_data = $d['data'];
    $registro->agendamento_hora = $d['hora'];

    $registros = $agendamentodao->validateInsertUpdate($registro);

    if ($registros[0] > 0) {

        $msg = "Já existe uma agendamento para esse cliente!";
        header("Location: ../../");
 
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

    $agendamento->setId($d['id']);
    $agendamento->setIdPaciente($d['id_paciente']);
    $agendamento->setIdMedico($d['id_medico']);
    $agendamento->setData($d['data']);
    $agendamento->setHora($d['hora']);

    $agendamentodao->update($agendamento);

    header("Location: ../../");
}
// se a requisição for deletar
else if (isset($_GET['del'])) {

    $agendamento->setId($_GET['del']);
    $agendamentodao->delete($agendamento);

    header("Location: ../../");
} else {
    header("Location: ../../");
}
