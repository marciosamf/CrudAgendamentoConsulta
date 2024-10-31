<?php
/*
    Criação da classe agendamento com o CRUD
*/
class PacienteDAO
{
    //busca todos os pacientes da tabela retornando a lista em um combo no front
    public function getPacientes()
    {

        try {
            $sql = "SELECT paciente.id AS id_paciente, 
                           paciente.nome AS nome_paciente
                    FROM paciente";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaPacientes($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao listar pacientes." . $e;
        }
    }


    private function listaPacientes($row)
    {
        $paciente = new Paciente();
        $paciente->setId($row['id_paciente']);
        $paciente->setNomePaciente($row['nome_paciente']);
        return $paciente;
    }
}
