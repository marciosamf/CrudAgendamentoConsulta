<?php
/*
    Criação da classe agendamento com o CRUD
*/
class MedicoDAO
{
    public function getMedicos(){
        
        try {
            $sql = "SELECT medico.id AS id_medico, 
                           medico.nome AS nome_medico
                    FROM medico";
            $result = Conexao::getConexao()->query($sql);
            $lista = $result->fetchAll(PDO::FETCH_ASSOC);
            $f_lista = array();
            foreach ($lista as $l) {
                $f_lista[] = $this->listaMedicos($l);
            }
            return $f_lista;
        } catch (Exception $e) {
            print "Ocorreu um erro ao listar medicos." . $e;
        }
    }


    private function listaMedicos($row)
    {
        $medico = new Medico();
        $medico->setId($row['id_medico']);
        $medico->setNomeMedico($row['nome_medico']);
        return $medico;
    }

}
