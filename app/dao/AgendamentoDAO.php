<?php
/*
    Criação da classe agendamento com o CRUD
*/
class AgendamentoDAO
{


    public function validateInsertUpdate($registro)
    {

        try {
            $sql = "SELECT 1 
                    FROM agenda 
                    WHERE id_medico = $registro->IdMedico";
            $sql .= " AND id_paciente = $registro->IdPaciente ";
            $sql .= " AND agendamento_hora LIKE '%$registro->agendamento_hora%'";
            $sql .= " AND agendamento_data LIKE '%$registro->agendamento_data%'";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);

            return $lista;
        } catch (Exception $e) {
            print "Erro ao validar registro <br>" . $e . '<br>';
        }
    }

    public function create(Agendamento $agendamento)
    {
        try {
            $sql = "INSERT INTO agenda (id_paciente,id_medico,agendamento_data,agendamento_hora)
                    VALUES ( :id_paciente,:id_medico,:agendamento_data,:agendamento_hora)";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id_paciente", $agendamento->getIdPaciente());
            $p_sql->bindValue(":id_medico", $agendamento->getIdMedico());
            $p_sql->bindValue(":agendamento_data", $agendamento->getData());
            $p_sql->bindValue(":agendamento_hora", $agendamento->getHora());

            return $p_sql->execute();
        } catch (Exception $e) {
            print "Erro ao Inserir agendamento <br>" . $e . '<br>';
        }
    }

    public function read($id = null)
    {

        try {
            $sql = "SELECT  
                            agenda.id AS agenda_id,
                            paciente.id AS paciente_id,
                            paciente.nome AS nome_paciente,
                            medico.id AS medico_id,
                            medico.nome AS nome_medico, 
                            agendamento_data, agendamento_hora
                    FROM agenda
                    INNER JOIN medico ON medico.id = agenda.id_medico
                    INNER JOIN paciente ON paciente.id = agenda.id_paciente";

             if(!is_null($id)){
                $sql.=" WHERE agenda.id = $id "; 
             }else{  
                $sql.=" ORDER BY paciente.nome";  
             }  
                     
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaAgendamentos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao listar agendamento." . $e;
        }
    }
    

    public function update(Agendamento $agendamento)
    {
        try {
            $sql = "UPDATE agenda set                
                    id_medico=:id_medico,
                    id_paciente=:id_paciente,
                    agendamento_data=:agendamento_data,
                    agendamento_hora=:agendamento_hora                                         
                  WHERE id = :id";

            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $agendamento->getId());
            $p_sql->bindValue(":id_medico", $agendamento->getIdMedico());
            $p_sql->bindValue(":id_paciente", $agendamento->getIdPaciente());
            $p_sql->bindValue(":agendamento_data", $agendamento->getData());
            $p_sql->bindValue(":agendamento_hora", $agendamento->getHora());
            return $p_sql->execute();
        } catch (Exception $e) {
            print "Ocorreu um erro alterar a consulta $e <br>";
        }
    }

    public function delete(Agendamento $agendamento)
    {
        try {
            $sql = "DELETE FROM agenda WHERE id = :id";
            $p_sql = Conexao::getConexao()->prepare($sql);
            $p_sql->bindValue(":id", $agendamento->getId());
            return $p_sql->execute();
        } catch (Exception $e) {
            echo "Erro ao Excluir agendamento<br> $e <br>";
        }
    }


    private function listaAgendamentos($row)
    {
        $agendamento = new agendamento();
        $agendamento->setId($row['agenda_id']);
        $agendamento->setNomePaciente($row['nome_paciente']);
        $agendamento->setNomeMedico($row['nome_medico']);
        $agendamento->setData($row['agendamento_data']);
        $agendamento->setHora($row['agendamento_hora']);

        return $agendamento;
    }
}
