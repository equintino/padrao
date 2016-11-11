<?php
class PaiDao {
    private $db = null;
    
    private function getDb1() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db1");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
    }
    private function getDb2() {
        if ($this->db !== null) {
            return $this->db;
        }
        $config = Config::getConfig("db2");
        try {
            $this->db = new PDO($config['dsn'], $config['username'], $config['password']);
        } catch (Exception $ex) {
            throw new Exception('DB connection error: ' . $ex->getMessage());
        }
        return $this->db;
    }
    public function listaDb(){
       $sql='show databases';
       $rows = $this->query($sql)->fetchAll();
       return $rows;
    }
    public function listaTabela($banco) {
       $sql="show tables FROM $banco";
       $rows = $this->query($sql) ->fetchAll();
       return $rows;
    }
    public function listacredito(JudiSearchCriteria $Judisearch = null, $ordem = null) {
     $sql="SELECT * FROM certidao_cre_impressao WHERE excluido=0";
     //print_r($ordem);
     if($ordem){
       if("NúmeroCNJ/Antigo"==$ordem){
        $ordem='Numero_CNJ_Antigo asc';
       }elseif('Partecontrária'==$ordem){
        $ordem='Parte_contraria asc';
       }elseif('Honorários'==$ordem){
        $ordem='Honorarios asc';
       }elseif('ValorDeferido'==$ordem){
        $ordem='Vlr_deferido asc';
       }elseif('Valordacausa'==$ordem){
        $ordem='Vlr_da_causa asc';
       }elseif('Valorcondenação'==$ordem){
        $ordem='Vlr_condenacao asc';
       }elseif('Certidãodecrédito'==$ordem){
        $ordem='Vlr_certidao_de_credito asc';
       }
       $sql.=" ORDER BY ".$ordem;
     }
     //print_r($sql);die;
     $rows = $this->query($sql) ->fetchAll();
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        return $result;
    }
    public function listaAcao(JudiSearchCriteria $Judisearch = null, $ordem = null) {
     $sql="SELECT * FROM acoes_transitado_julgado_18102016 WHERE excluido=0 ";
     if($ordem){
       if("NúmeroCNJ/Antigo"==$ordem){
        $ordem='Numero_CNJ_Antigo asc';
       }elseif('Partecontrária'==$ordem){
        $ordem='Parte_contraria asc';
       }elseif('Honorários'==$ordem){
        $ordem='Honorarios';
       }elseif('ValorDeferido'==$ordem){
        $ordem='Vlr_deferido asc';
       }elseif('Valordacausa'==$ordem){
        $ordem='Vlr_da_causa asc';
       }elseif('Valorcondenação'==$ordem){
        $ordem='Vlr_condenacao asc';
       }elseif('ValorPedido'==$ordem){
        $ordem='`Valor_Pedido`';
       }elseif('OBS'==$ordem){
        $ordem='OBS';
       }elseif('Segurado'==$ordem){
        $ordem='Segurado';
       }elseif('Faixa_de_Probabilidade'==$ordem){
        $ordem='Faixa_de_Probabilidade';
       }elseif('Natureza'==$ordem){
        $ordem='Natureza';
       }elseif('UF'==$ordem){
        $ordem='UF';
       }elseif('FaixadeProbabilidade'==$ordem){
        $ordem='Faixa_de_Probabilidade';
       }
       $sql.="ORDER BY ".$ordem;
     }else{
       $sql.="ORDER BY id ";
     }
     $rows = $this->query($sql) ->fetchAll();
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        return $result;
    }
    public function listaSegurados(JudiSearchCriteria $Judisearch = null, $ordem = null) {
     $sql="SELECT * FROM acoes_transitado_julgado_18102016 LEFT JOIN geral_henrique ON acoes_transitado_julgado_18102016.SINISTRO = geral_henrique.SINISTRO_h WHERE TITULAR != '' OR beneficiario != ''";
     if($ordem){
       if("NúmeroCNJ/Antigo"==$ordem){
        $ordem='Numero_CNJ_Antigo asc';
       }elseif('Partecontrária'==$ordem){
        $ordem='Parte_contraria asc';
       }elseif('Honorários'==$ordem){
        $ordem='Honorarios';
       }elseif('ValorDeferido'==$ordem){
        $ordem='Vlr_deferido asc';
       }elseif('Valordacausa'==$ordem){
        $ordem='Vlr_da_causa asc';
       }elseif('Valorcondenação'==$ordem){
        $ordem='Vlr_condenacao asc';
       }elseif('ValorPedido'==$ordem){
        $ordem='`Valor_Pedido`';
       }elseif('OBS'==$ordem){
        $ordem='OBS';
       }elseif('Segurado'==$ordem){
        $ordem='Segurado';
       }elseif('Faixa_de_Probabilidade'==$ordem){
        $ordem='Faixa_de_Probabilidade';
       }elseif('Natureza'==$ordem){
        $ordem='Natureza';
       }elseif('UF'==$ordem){
        $ordem='UF';
       }elseif('FaixadeProbabilidade'==$ordem){
        $ordem='Faixa_de_Probabilidade';
       }
       $sql.="ORDER BY ".$ordem;
     }
     $rows = $this->query($sql) ->fetchAll();
     //print_r($sql);die;
     //echo "<pre>";
     //print_r($rows);
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        //print_r($judi);die;
        return $result;
    }
    public function dupliciadeAcaoAdmin(JudiSearchCriteria $Judisearch = null, $ordem = null) {
     $sql="SELECT * FROM acoes_transitado_julgado_18102016 LEFT JOIN geral_henrique ON acoes_transitado_julgado_18102016.SINISTRO = geral_henrique.SINISTRO_h WHERE acoes_transitado_julgado_18102016.SINISTRO != ''";
     //print_r($ordem);
     if($ordem){
       if("NúmeroCNJ/Antigo"==$ordem){
        $ordem='Numero_CNJ_Antigo asc';
       }elseif('Partecontrária'==$ordem){
        $ordem='Parte_contraria asc';
       }elseif('Honorários'==$ordem){
        $ordem='Honorarios';
       }elseif('ValorDeferido'==$ordem){
        $ordem='Vlr_deferido asc';
       }elseif('Valordacausa'==$ordem){
        $ordem='Vlr_da_causa asc';
       }elseif('Valorcondenação'==$ordem){
        $ordem='Vlr_condenacao asc';
       }elseif('ValorPedido'==$ordem){
        $ordem='`Valor_Pedido`';
       }elseif('OBS'==$ordem){
        $ordem='OBS';
       }elseif('Segurado'==$ordem){
        $ordem='Segurado';
       }elseif('Faixa_de_Probabilidade'==$ordem){
        $ordem='Faixa_de_Probabilidade';
       }elseif('Natureza'==$ordem){
        $ordem='Natureza';
       }elseif('UF'==$ordem){
        $ordem='UF';
       }elseif('FaixadeProbabilidade'==$ordem){
        $ordem='Faixa_de_Probabilidade';
       }
       $sql.="ORDER BY ".$ordem;
     }
     $rows = $this->query($sql) ->fetchAll();
     //print_r($sql);die;
     //echo "<pre>";
     //print_r($rows);die;
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        //print_r($judi);die;
        return $result;
    }
    public function listaCreditoAdministrativo(JudiSearchCriteria $Judisearch = null) {
     $sql="SELECT * FROM acoes_transitado_julgado_05102016 INNER JOIN geral_henrique ON acoes_transitado_julgado_05102016.Segurado = geral_henrique.TITULAR_h";
     //$sql="SELECT * FROM acoes_transitado_julgado2 INNER JOIN certidao_cre_mon_final ON acoes_transitado_julgado2.Numero_CNJ_Antigo = certidao_cre_mon_final.N_PROC_JUD_CNJ_mon";
     //$sql="SELECT * FROM suspenso LEFT JOIN geral_henrique ON suspenso.Segurado = geral_henrique.TITULAR_h";
     $rows = $this->query($sql) ->fetchAll();
     //echo "<pre>";
    // print_r($rows);die;
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        return $result;
    }
    public function ajunta(JudiSearchCriteria $Judisearch = null) {
     $sql="SELECT * FROM acoes_transitado_julgado_18102016 LEFT JOIN transito_julgado_original ON acoes_transitado_julgado_18102016.Numero_CNJ_Antigo = transito_julgado_original.Numero_de_CNJ";
     //$sql="SELECT * FROM acoes_transitado_julgado_05102016 left JOIN suspenso ON acoes_transitado_julgado_05102016.Numero_CNJ_Antigo = suspenso.Numero_CNJ_Antigo";
     //$sql="SELECT * FROM acoes_transitado_julgado2 INNER JOIN certidao_cre_mon_final ON acoes_transitado_julgado2.Numero_CNJ_Antigo = certidao_cre_mon_final.N_PROC_JUD_CNJ_mon";
     //$sql="SELECT * FROM suspenso LEFT JOIN geral_henrique ON suspenso.Segurado = geral_henrique.TITULAR_h";
     //$sql="SELECT * FROM acoes_transitado_julgado_05102016";
     //$sql="SELECT * FROM acoes_transitado_julgado_05102016,suspenso WHERE 1";
     $rows = $this->query($sql) ->fetchAll();
     echo "<pre>";
     print_r($rows);die;
        foreach($rows as $row){
            //print_r($row);
            //echo $row['Numero_CNJ_Antigo'];
            //echo "<br>";
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        //die;
        return $result;
    }
    public function duplicadoTraPro(JudiSearchCriteria $Judisearch = null) {
     $sql="SELECT * FROM certidao_cre_final LEFT JOIN provavel_contabilizada_final ON certidao_cre_final.Nnmero_CNJ_Antigo_cre_fim = provavel_contabilizada_final.Numero_CNJ_Antigo_con_fim";
     $rows = $this->query($sql) ->fetchAll();
     
     //echo "<pre>";
     //print_r($rows);die;
     
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        return $result;
    }
    public function duplicadoTabelas(JudiSearchCriteria $Judisearch = null,$tabela) {
     $sql="SELECT * FROM $tabela";// LEFT JOIN provavel_contabilizada_final ON certidao_cre_final.Nnmero_CNJ_Antigo_cre_fim = provavel_contabilizada_final.Numero_CNJ_Antigo_con_fim";
     $rows = $this->query($sql) ->fetchAll();
     
     //echo "<pre>";
     //print_r($rows);die;
     
        foreach($rows as $row){
         $judi = new Judi();
            JudiMapper::map($judi, $row);
            $result[] = $judi;
        }
        return $result;
    }
    public function findById($id) {
     //print_r($id);die;
        $row = $this->query('SELECT * FROM certidao_cre_impressao WHERE id = ' . (int) $id)->fetch();
        //print_r($row);die;
        if (!$row) {
            return null;
        }
        $judi = new Judi();
        JudiMapper::map($judi, $row);
        return $judi;
    }
    public function findById2($id) {
     //print_r($id);die;
        $row = $this->query('SELECT * FROM acoes_transitado_julgado_18102016 WHERE id = ' . (int) $id)->fetch();
        //print_r($row);die;
        if (!$row) {
            return null;
        }
        $judi = new Judi();
        JudiMapper::map($judi, $row);
        return $judi;
    }
    public function findBySinistro($sinistro) {
     //print_r($sinistro);die;
        $row = $this->query('SELECT * FROM geral_henrique WHERE geral_henrique.`SINISTRO_h` = "'.$sinistro.'"')->fetch();
        //print_r($row);die;
        if (!$row) {
            return null;
        }
        $judi = new Judi();
        JudiMapper::map($judi, $row);
        return $judi;
    }
    public function saveJd(Judi $judi) {
        if ($judi->getId() === null) {
            return $this->insert($judi);
        }
        return $this->update($judi);
    }
    public function saveJd2(Judi $judi) {
        if ($judi->getId() === null) {
            return $this->insert2($judi);
        }
        return $this->update2($judi);
    }
    public function saveJd3($judi) {
     //echo "<pre>";
     //print_r($judi);die;
        if ($judi->getId() === null) {
            return $this->insert3($judi);
        }
        return $this->update3($judi);
    }
    public function query($sql) {
        $statement = $this->getDb1()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb1()->errorInfo());
        }
        return $statement;
    }
    public function query2($sql) {
        $statement = $this->getDb2()->query($sql, PDO::FETCH_ASSOC);
        if ($statement === false) {
            self::throwDbError($this->getDb2()->errorInfo());
        }
        return $statement;
    }
    private function insert(Judi $judi) {
        $now_ = new DateTime("+0 day", new DateTimeZone('America/Sao_Paulo'));
        $now=$now_->getTimestamp();
        $timestamp = mktime(date("H")-4);
        //$now=date("d/m/Y H:i",mktime(0));
        $judi->setId(null);
        
        $judi->setAlteracao($timestamp);
        //print_r($judi);die;   
        $sql = 'INSERT INTO `certidao_cre_impressao` (`Numero_CNJ_Antigo`, `Natureza`, `UF`, `Parte_contraria`, `Segurado`, `Vlr_deferido`, `Vlr_da_causa`, `Vlr_condenacao`, `Honorarios`, `Vlr_certidao_de_credito`, `Aba`, `id`, `Alteracao`, `login`) VALUES (:Numero_CNJ_Antigo, :Natureza, :UF, :Parte_contraria, :Segurado, :Vlr_deferido, :Vlr_da_causa, :Vlr_condenacao, :Honorarios, :Vlr_certidao_de_credito, :Aba, :id, :Alteracao, :login)';
        return $this->execute($sql, $judi);
    }
    private function update(Judi $judi) {
        $now_ = new DateTime("+0 day", new DateTimeZone('America/Sao_Paulo'));
        $now=$now_->getTimestamp();
        $timestamp=mktime(date('H')-4);
        //$now=date("d/m/Y H:i",mktime(0));
        $judi->setAlteracao($timestamp);
        $sql = "UPDATE `certidao_cre_impressao` SET Numero_CNJ_Antigo = :Numero_CNJ_Antigo , Natureza=:Natureza, UF=:UF, Parte_contraria=:Parte_contraria, Segurado=:Segurado, Vlr_deferido=:Vlr_deferido, Vlr_da_causa=:Vlr_da_causa, Vlr_condenacao=:Vlr_condenacao, Honorarios=:Honorarios, Vlr_certidao_de_credito=:Vlr_certidao_de_credito, Aba=:Aba, Alteracao=:Alteracao, login=:login WHERE id = :id";
        return $this->execute($sql, $judi);
    }
    private function insert2(Judi $judi) {
        $now_ = new DateTime("+0 day", new DateTimeZone('America/Sao_Paulo'));
        $now=$now_->getTimestamp();
        $timestamp=mktime(date('H')-4);
        $judi->setId(null);
        
        $judi->setAlteracao($timestamp);
           
        $sql = 'INSERT INTO `acoes_transitado_julgado_18102016` (`Numero_CNJ_Antigo`, `Natureza`, `UF`, `Parte_contraria`, `Segurado`, `Vlr_deferido`,`Faixa_de_Probabilidade`, `Vlr_da_causa`, `Vlr_condenacao`, `Valor_Pedido`, `Honorarios`, `Vlr_certidao_de_credito`, `Aba`, `id`, `Alteracao`, `login`, `SINISTRO`, `ok`, `TITULAR`, `VALOR_ADMINISTRATIVO`, `beneficiario`,`idtitular`, `idbenefi`, `recente`) VALUES (:Numero_CNJ_Antigo, :Natureza, :UF, :Parte_contraria, :Segurado, :Vlr_deferido, :Faixa_de_Probabilidade, :Vlr_da_causa, :Vlr_condenacao, :Valor_Pedido, :Honorarios, :OBS, :id, :Alteracao, :login, :SINISTRO, :ok, :TITULAR, :VALOR_ADMINISTRATIVO, :beneficiario, :idtitular, :idbenefi, :recente)';

        return $this->execute2($sql, $judi);
    }
    private function update2(Judi $judi) {
        $now_ = new DateTime("+0 day", new DateTimeZone('America/Sao_Paulo'));
        $now=$now_->getTimestamp();
        $timestamp = mktime(date("H")-4);
        $judi->setAlteracao($timestamp);
        $sql = "UPDATE `acoes_transitado_julgado_18102016` SET Numero_CNJ_Antigo = :Numero_CNJ_Antigo , Natureza = :Natureza, UF = :UF, Parte_contraria = :Parte_contraria, Segurado = :Segurado, Vlr_deferido=:Vlr_deferido, Faixa_de_Probabilidade = :Faixa_de_Probabilidade, Vlr_da_causa = :Vlr_da_causa, Vlr_condenacao = :Vlr_condenacao, Valor_Pedido = :Valor_Pedido, Honorarios = :Honorarios, OBS=:OBS, Alteracao = :Alteracao, login = :login, SINISTRO = :SINISTRO, ok = :ok, TITULAR = :TITULAR, VALOR_ADMINISTRATIVO = :VALOR_ADMINISTRATIVO, beneficiario = :beneficiario, idtitular = :idtitular, idbenefi = :idbenefi, recente = :recente WHERE id = :id";
        return $this->execute2($sql, $judi);
    }
    private function insert3($judi) {
     //ECHO "<pre>";
     //print_r($judi);die;
      //$now_ = new DateTime("+0 day", new DateTimeZone('America/Sao_Paulo'));
      //$now=$now_->getTimestamp();
        $timestamp=mktime(date('H')-4);
      $judi->setId(null);
        
      $judi->setAlteracao($timestamp); 
           
      //$sql="INSERT INTO `duplicidade` (`ID`,`SINISTRO`,`TITULAR`,`SEGURADO`,`BENEFICIARIO`,`CPF`,`PARTE_CONTRARIA`,`NUMERO_CNJ_ANTIGO`,`VALOR_DEFERIDO`,`VALOR_DA_CAUSA`,`VALOR_CONDENACAO`,`VALOR_PEDIDO`,`HONORARIOS`,`VALOR_ADMINISTRATIVO`,`ALTERACAO`,`LOGIN`) VALUES (:ID,:SINISTRO,:TITULAR,:SEGURADO,:BENEFICIARIO,:CPF,:PARTE_CONTRARIA,:NUMERO_CNJ_ANTIGO,:VALOR_DEFERIDO,:VALOR_DA_CAUSA,:VALOR_CONDENACAO,:VALOR_PEDIDO,:HONORARIOS,:VALOR_ADMINISTRATIVO,:ALTERACAO,:LOGIN)"; 

     $sql="INSERT INTO `duplicidade` (`ID`,`SINISTRO`) VALUES (:ID,:SINISTRO)";
print_r($this->execute3($sql, $judi));die;
        return $this->execute3($sql, $judi);
    }
    public function delete($id) {
        //$sql = 'delete from certidao_cre_impressao WHERE id = :id';
        $sql='UPDATE certidao_cre_impressao set excluido=1  WHERE id = :id';
        //echo $sql;die;
            /*UPDATE todo SET
                last_modified_on = :last_modified_on,
                deleted = :deleted*/
        $statement = $this->getDb2()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id
        ));
        //':last_modified_on' => self::formatDateTime(new DateTime(), new DateTimeZone('America/Sao_Paulo')),':deleted' => true,
        return $statement->rowCount() == 1;
    }
    public function delete2($id,$tabela) {
        //$sql = 'delete from certidao_cre_impressao WHERE id = :id';
        $sql='UPDATE '.$tabela.' set excluido=1  WHERE id = :id';
        //echo $sql;die;
            /*UPDATE todo SET
                last_modified_on = :last_modified_on,
                deleted = :deleted*/
        //print_r($sql);die;
        $statement = $this->getDb2()->prepare($sql);
        $this->executeStatement($statement, array(
            ':id' => $id
        ));
        //':last_modified_on' => self::formatDateTime(new DateTime(), new DateTimeZone('America/Sao_Paulo')),':deleted' => true,
        return $statement->rowCount() == 1;
    }
    public function execute($sql,$judi) {
        $statement = $this->getDb2()->prepare($sql);
        $this->executeStatement($statement, $this->getParams($judi));
        if (!$statement->rowCount()) {
            //throw new NotFoundException('Processo com ID "' . $todo->getId() . '" nao existe.');
        }
        //echo "<pre>";
        //print_r($judi);die;
        return $judi;
    }
    public function execute2($sql,$judi) {
        $statement = $this->getDb2()->prepare($sql);
        $this->executeStatement($statement, $this->getParams2($judi));
        if (!$statement->rowCount()) {
            //throw new NotFoundException('Processo com ID "' . $todo->getId() . '" nao existe.');
        }
        return $judi;
    }
    public function execute3($sql,$judi) {
        $statement = $this->getDb2()->prepare($sql);
        //print_r($this->executeStatement($statement, $this->getParams3($judi)));die;
        $this->executeStatement($statement, $this->getParams3($judi));
        if (!$statement->rowCount()) {
            //throw new NotFoundException('Processo com ID "' . $todo->getId() . '" nao existe.');
        }
        //print_r($judi);die;
        return $judi;
    }
    private function getParams(Judi $judi) {
        $params = array(
            ':Numero_CNJ_Antigo' => $judi->getNumero_CNJ_Antigo(),
            ':Natureza' => $judi->getNatureza(),
            ':UF' => $judi->getUF(),
            ':Parte_contraria' => $judi->getParte_contraria(),
            ':Segurado' => $judi->getSegurado(),
            ':Vlr_deferido' => JudiValidator::trocavirgula($judi->getVlr_deferido()),
            ':Vlr_da_causa' => JudiValidator::trocavirgula($judi->getVlr_da_causa()),
            ':Vlr_condenacao' => JudiValidator::trocavirgula($judi->getVlr_condenacao()),
            ':Honorarios' => JudiValidator::trocavirgula($judi->getHonorarios()),
            ':Vlr_certidao_de_credito' => JudiValidator::trocavirgula($judi->getVlr_certidao_de_credito()),
            ':Aba' => $judi->getAba(),
            ':id' => $judi->getid(),
            ':Alteracao' => $judi->getAlteracao(),
            ':login' => $judi->getLogin(),
            //':OBS' => $judi->getOBS()
            );
        if ($judi->getId()) {
            unset($params[':created_on']);
        }
        //print_r($params);die;
        return $params;
    }
    private function getParams2(Judi $judi) {
        $params = array(
            ':Numero_CNJ_Antigo' => $judi->getNumero_CNJ_Antigo(),
            ':Natureza' => $judi->getNatureza(),
            ':UF' => $judi->getUF(),
            ':Parte_contraria' => $judi->getParte_contraria(),
            ':Segurado' => $judi->getSegurado(),
            ':Faixa_de_Probabilidade' => $judi->getFaixa_de_Probabilidade(),
            ':Vlr_deferido' => $judi->getVlr_deferido(),
            ':Vlr_da_causa' => $judi->getVlr_da_causa(),
            ':Vlr_condenacao' => $judi->getVlr_condenacao(),
            ':Valor_Pedido' => $judi->getValor_Pedido(),
            ':Honorarios' => $judi->getHonorarios(),
            ':OBS' => $judi->getOBS(),
            ':Alteracao' => $judi->getAlteracao(),
            ':login' => $judi->getLogin(),
            ':SINISTRO' => $judi->getSINISTRO(),
            ':id' => $judi->getid(),
            ':ok' => $judi->getOk(),
            ':TITULAR' => $judi->getTITULAR(),
            ':VALOR_ADMINISTRATIVO' => $judi->getVALOR_ADMINISTRATIVO(),
            ':beneficiario' => $judi->getbeneficiario(),
            ':idtitular' => $judi->getidtitular(),
            ':idbenefi' => $judi->getidbenefi(),
            ':recente' => $judi->getrecente()
            );
        if ($judi->getId()) {
            unset($params[':created_on']);
        }
        return $params;
    }
    private function getParams3($judi) {
     //echo "<pre>";
     //PRINT_R($judi);die;
        $params = array(
            ':ID' => $judi->getId(),
            ':SINISTRO' => $judi->getsinistro(),
            /*':TITULAR'=>$judi->getTITULAR(),
            ':Segurado' => $judi->getSegurado(),
            ':beneficiario' => $judi->getbeneficiario(),
            ':CPF'=>$judi->getCPF(),
            ':Parte_contraria' => $judi->getParte_contraria(),
            ':Numero_CNJ_Antigo' => $judi->getNumero_CNJ_Antigo(),
            ':Vlr_deferido' => $judi->getVlr_deferido(),
            ':Vlr_da_causa' => $judi->getVlr_da_causa(),
            ':Vlr_condenacao' => $judi->getVlr_condenacao(),
            ':Valor_Pedido' => $judi->getValor_Pedido(),
            ':Honorarios' => $judi->getHonorarios(),
            ':VALOR_ADMINISTRATIVO'=>$judi->getVALOR_ADMINISTRATIVO(),
            ':Alteracao' => $judi->getAlteracao(),
            ':login' => $judi->getLogin()*/
            );
        if ($judi->getId()) {
            unset($params[':created_on']);
        }
        print_r($params);
        return $params;
    }
    private function executeStatement(PDOStatement $statement, array $params) {
        if (!$statement->execute($params)) {
            self::throwDbError($this->getDb2()->errorInfo());
        }
    }
    private static function throwDbError(array $errorInfo) {
        // TODO log error, send email, etc.
        throw new Exception('DB error [' . $errorInfo[0] . ', ' . $errorInfo[1] . ']: ' . $errorInfo[2]);
    }
    
}