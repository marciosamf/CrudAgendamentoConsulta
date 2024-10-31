<pre>
<?php
include_once "./app/conexao/Conexao.php";

include_once "./app/dao/AgendamentoDAO.php";
include_once "./app/model/Agendamento.php";

include_once "./app/dao/PacienteDAO.php";
include_once "./app/model/Paciente.php";

include_once "./app/dao/MedicoDAO.php";
include_once "./app/model/Medico.php";

//instancia as classes
$agendamento = new Agendamento();
$agendamentodao = new AgendamentoDAO();

$pacientedao = new PacienteDao();
$listaPacientes = $pacientedao->getPacientes();

$medicodao = new MedicoDAO();
$listaMedico = $medicodao->getMedicos();

?>
</pre>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>CRUD Simples PHP</title>
    <style>
        .menu,
        thead {
            background-color: #bbb !important;
        }

        .row {
            padding: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light menu">
        <div class="container">
            <a class="navbar-brand" href="#">
                Agendamento de consulta
            </a>
        </div>
    </nav>
    <div class="container">
           <form action="app/controller/AgendamentoController.php" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label>Nome Paciente</label>
                    <select id="id_paciente" name="id_paciente" class="form-control form-select form-select-lg mb-1">
                        <option></option>
                        <?php foreach ($listaPacientes as $pacientes) { ?>
                            <option value="<?php echo $pacientes->getId() ?>"><?php echo $pacientes->getNomePaciente() ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Nome Médico</label>
                    <select id="id_medico" name="id_medico" class="form-control form-select form-select-lg mb-1">
                        <option></option>
                        <?php foreach ($listaMedico as $medicos) { ?>
                            <option value="<?php echo $medicos->getId() ?>"><?php echo $medicos->getNomeMedico() ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Data</label>
                    <input type="date" name="data" value="" class="form-control" require />
                </div>
                <div class="col-md-2.5">
                    <label>Hora</label>
                    <input type="time" name="hora" value="" class="form-control" require />
                </div>
                <div class="col-md-3">
                    <br>
                    <button class="btn btn-primary" type="submit" name="cadastrar">Cadastrar</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome Paciente</th>
                        <th>Nome Médico</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agendamentodao->read() as $agendamento) : ?>
                        <tr>
                            <td><?= $agendamento->getId() ?></td>
                            <td><?= $agendamento->getNomePaciente() ?></td>
                            <td><?= $agendamento->getNomeMedico() ?></td>
                            <td><?= $agendamento->getData() ?></td>
                            <td><?= $agendamento->getHora() ?></td>
                            <td class="text-center">
                                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $agendamento->getId() ?>">
                                    Editar
                                </button>
                                <a href="app/controller/agendamentoController.php?del=<?= $agendamento->getId() ?>">
                                    <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar><?= $agendamento->getId() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="app/controller/agendamentoController.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Nome Paciente</label>
                                                    <select id="id_paciente" name="id_paciente" class="form-control form-select form-select-lg mb-1">
                                                        <option></option>
                                                        <?php foreach ($listaPacientes as $pacientes) { ?>
                                                            <option value="<?php echo $pacientes->getId() ?>"><?php echo $pacientes->getNomePaciente() ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Nome Médico</label>
                                                    <select id="id_medico" name="id_medico" class="form-control form-select form-select-lg mb-1">
                                                        <option></option>
                                                        <?php foreach ($listaMedico as $medicos) { ?>
                                                            <option value="<?php echo $medicos->getId() ?>"><?php echo $medicos->getNomeMedico() ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Data</label>
                                                    <input type="date" name="data" value="" class="form-control" require />
                                                </div>
                                                                            
                                                <div class="col-md-3">
                                                    <label>Hora</label>
                                                    <input type="time" name="hora" value="<?= $agendamento->getHora() ?>" class="form-control" require />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <br>
                                                    <input type="hidden" name="id" value="<?= $agendamento->getId() ?>" />
                                                    <button class="btn btn-primary" type="submit" name="editar">Alterar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>