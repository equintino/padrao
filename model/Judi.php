<?php
include '../mapping/JudiMapper.php';

class Judi {
 
   private $Numero_CNJ_Antigo_con;
   private $Natureza_con;
   private $UF_con;
   private $Parte_contraria_con;
   private $Segurado_con;
   private $Valor_con;
   private $Honorarios_con;
   private $id_con;
   private $SINISTRO_lev;
   private $SEGURADO_lev;
   private $PARTE_CONTRARIA_lev;
   private $VALOR_PEDIDO_lev;
   private $VALOR_ADMINISTRATIVO_lev;
   private $HONORARIOS_lev;
   private $POSSIVEL_lev;
   private $PROVAVEL_lev;
   private $DIGITADOR_lev;
   private $id_lev;
   private $APOLICE_h;
   private $ENDOSSO_h;
   private $SINISTRO_h;
   private $DT_AVISO_h;
   private $TITULAR_h;
   private $CPF_h;
   private $IMPORTANCIA_SEGURADA_h;
   private $CORRECAO_IGPM_h;
   private $CORRECAO_TR_h;
   private $id_h;
   private $id;
   private $Id;
   
   private $Numero_CNJ_Antigo_tra;
   private $Natureza_tra;
   private $UF_tra;
   private $Parte_contraria_tra;
   private $Segurado_tra;
   private $Valor_tra;
   private $Honorarios_tra; 

   private $Numero_CNJ_Antigo_cre;
   private $Natureza_cre;
   private $UF_cre;
   private $Parte_contraria_cre;
   private $Segurado_cre;
   private $Honorarios_cre;
   private $Valor_cre;
   
   private $Numero_CNJ_Antigo_mon;
   private $Natureza_mon;
   private $UF_mon;
   private $Parte_contraria_mon;
   private $Segurado_mon;
   private $Vlr_Deferido_mon;
   private $Vlr_Da_causa_mon;
   private $Vlr_Condenação_mon;
   private $Honorarios_mon;
   private $Vlr_certidao_de_credito_mon;
   
   private $PASTA;
   private $SEGURADO_mon2;
   private $ASSINATURA_mon2;
   private $N_SIN_ADM_mon2;
   private $DT_SIN_mon2;
   private $N_PROC_JUD_CNJ_mon;
   private $N_ANTIGO_mon2;
   private $UF_CIDADE_mon2;
   private $COMARCA_mon2;
   private $FORO_mon2;
   private $VARA_mon2;
   private $HABILITANTE_mon2;
   private $VL_CERT_CRED_mon2;
   private $DT_CRED_mon2;
   private $OBSEVACAO_mon2;
   private $Vlr_condenacao_mon;
   
   private $Numero_CNJ_Antigo;
   private $Natureza;
   private $UF;
   private $Parte_contraria;
   private $Segurado;
   private $Vlr_deferido;
   private $Vlr_da_causa;
   private $Vlr_condenacao;
   private $Honorarios;
   private $Vlr_certidao_de_credito;
   private $Aba;
   private $Alteracao;
   private $Valor_Pedido;
   private $OBS;
   private $SINISTRO;
   private $Faixa_de_Probabilidade;
   private $login;
   private $ok;
   private $TITULAR;
   private $VALOR_ADMINISTRATIVO;
   private $beneficiario;
   private $idtitular;
   private $idbenefi;
   private $recente;
  
   

    public function getNumero_CNJ_Antigo_con(){
        return $this->Numero_CNJ_Antigo_con;
    }
    public function setNumero_CNJ_Antigo_con($Numero_CNJ_Antigo_con){
        $this->Numero_CNJ_Antigo_con = $Numero_CNJ_Antigo_con;
    }
    public function getNatureza_con(){
        return $this->Natureza_con;
    }
    public function setNatureza_con($Natureza_con){
        $this->Natureza_con = $Natureza_con;
    }
    public function getUF_con(){
        return $this->UF_con;
    }
    public function setUF_con($UF_con){
        $this->UF_con = $UF_con;
    }
    public function getParte_contraria_con(){
        return $this->Parte_contraria_con;
    }
    public function setParte_contraria_con($Parte_contraria_con){
        $this->Parte_contraria_con = $Parte_contraria_con;
    }
    public function getSegurado_con(){
        return $this->Segurado_con;
    }
    public function setSegurado_con($Segurado_con){
        $this->Segurado_con = $Segurado_con;
    }
    public function getValor_con(){
        return $this->Valor_con;
    }
    public function setValor_con($Valor_con){
        $this->Valor_con = $Valor_con;
    }
    public function getHonorarios_con(){
        return $this->Honorarios_con;
    }
    public function setHonorarios_con($Honorarios_con){
        $this->Honorarios_con = $Honorarios_con;
    }
    public function getid_con(){
        return $this->id_con;
    }
    public function setid_con($id_con){
        $this->id_con = $id_con;
    }
    public function getSINISTRO_lev(){
        return $this->SINISTRO_lev;
    }
    public function setSINISTRO_lev($SINISTRO_lev){
        $this->SINISTRO_lev = $SINISTRO_lev;
    }
    public function getSEGURADO_lev(){
        return $this->SEGURADO_lev;
    }
    public function setSEGURADO_lev($SEGURADO_lev){
        $this->SEGURADO_lev = $SEGURADO_lev;
    }
    public function getPARTE_CONTRARIA_lev(){
        return $this->PARTE_CONTRARIA_lev;
    }
    public function setPARTE_CONTRARIA_lev($PARTE_CONTRARIA_lev){
        $this->PARTE_CONTRARIA_lev = $PARTE_CONTRARIA_lev;
    }
    public function getVALOR_PEDIDO_lev(){
        return $this->VALOR_PEDIDO_lev;
    }
    public function setVALOR_PEDIDO_lev($VALOR_PEDIDO_lev){
        $this->VALOR_PEDIDO_lev = $VALOR_PEDIDO_lev;
    }
    public function getVALOR_ADMINISTRATIVO_lev(){
        return $this->VALOR_ADMINISTRATIVO_lev;
    }
    public function setVALOR_ADMINISTRATIVO_lev($VALOR_ADMINISTRATIVO_lev){
        $this->VALOR_ADMINISTRATIVO_lev = $VALOR_ADMINISTRATIVO_lev;
    }
    public function getHONORARIOS_lev(){
        return $this->HONORARIOS_lev;
    }
    public function setHONORARIOS_lev($HONORARIOS_lev){
        $this->HONORARIOS_lev = $HONORARIOS_lev;
    }
    public function getPOSSIVEL_lev(){
        return $this->POSSIVEL_lev;
    }
    public function setPOSSIVEL_lev($POSSIVEL_lev){
        $this->POSSIVEL_lev = $POSSIVEL_lev;
    }
    public function getPROVAVEL_lev(){
        return $this->PROVAVEL_lev;
    }
    public function setPROVAVEL_lev($PROVAVEL_lev){
        $this->PROVAVEL_lev = $PROVAVEL_lev;
    }
    public function getDIGITADOR_lev(){
        return $this->DIGITADOR_lev;
    }
    public function setDIGITADOR_lev($DIGITADOR_lev){
        $this->DIGITADOR_lev = $DIGITADOR_lev;
    }
    public function getid_lev(){
        return $this->id_lev;
    }
    public function setid_lev($id_lev){
        $this->id_lev = $id_lev;
    }
    public function getAPOLICE_h(){
        return $this->APOLICE_h;
    }
    public function setAPOLICE_h($APOLICE_h){
        $this->APOLICE_h = $APOLICE_h;
    }
    public function getENDOSSO_h(){
        return $this->ENDOSSO_h;
    }
    public function setENDOSSO_h($ENDOSSO_h){
        $this->ENDOSSO_h = $ENDOSSO_h;
    }
    public function getSINISTRO_h(){
        return $this->SINISTRO_h;
    }
    public function setSINISTRO_h($SINISTRO_h){
        $this->SINISTRO_h = $SINISTRO_h;
    }
    public function getDT_AVISO_h(){
        return $this->DT_AVISO_h;
    }
    public function setDT_AVISO_h($DT_AVISO_h){
        $this->DT_AVISO_h = $DT_AVISO_h;
    }
    public function getTITULAR_h(){
        return $this->TITULAR_h;
    }
    public function setTITULAR_h($TITULAR_h){
        $this->TITULAR_h = $TITULAR_h;
    }
    public function getCPF_h(){
        return $this->CPF_h;
    }
    public function setCPF_h($CPF_h){
        $this->CPF_h = $CPF_h;
    }
    public function getIMPORTANCIA_SEGURADA_h(){
        return $this->IMPORTANCIA_SEGURADA_h;
    }
    public function setIMPORTANCIA_SEGURADA_h($IMPORTANCIA_SEGURADA_h){
        $this->IMPORTANCIA_SEGURADA_h = $IMPORTANCIA_SEGURADA_h;
    }
    public function getCORRECAO_IGPM_h(){
        return $this->CORRECAO_IGPM_h;
    }
    public function setCORRECAO_IGPM_h($CORRECAO_IGPM_h){
        $this->CORRECAO_IGPM_h = $CORRECAO_IGPM_h;
    }
    public function getCORRECAO_TR_h(){
        return $this->CORRECAO_TR_h;
    }
    public function setCORRECAO_TR_h($CORRECAO_TR_h){
        $this->CORRECAO_TR_h = $CORRECAO_TR_h;
    }
    public function getid_h(){
        return $this->id_h;
    }
    public function setid_h($id_h){
        $this->id_h = $id_h;
    }
    public function getid(){
        return $this->id;
    }
    public function setid($id){
        $this->id = $id;
    }
    public function getNumero_CNJ_Antigo_tra(){
        return $this->Numero_CNJ_Antigo_tra;
    }
    public function setNumero_CNJ_Antigo_tra($Numero_CNJ_Antigo_tra){
        $this->Numero_CNJ_Antigo_tra = $Numero_CNJ_Antigo_tra;
    }
    public function getNatureza_tra(){
        return $this->Natureza_tra;
    }
    public function setNatureza_tra($Natureza_tra){
        $this->Natureza_tra = $Natureza_tra;
    }
    public function getUF_tra(){
        return $this->UF_tra;
    }
    public function setUF_tra($UF_tra){
        $this->UF_tra = $UF_tra;
    }
    public function getParte_contraria_tra(){
        return $this->Parte_contraria_tra;
    }
    public function setParte_contraria_tra($Parte_contraria_tra){
        $this->Parte_contraria_tra = $Parte_contraria_tra;
    }
    public function getSegurado_tra(){
        return $this->Segurado_tra;
    }
    public function setSegurado_tra($Segurado_tra){
        $this->Segurado_tra = $Segurado_tra;
    }
    public function getValor_tra(){
        return $this->Valor_tra;
    }
    public function setValor_tra($Valor_tra){
        $this->Valor_tra = $Valor_tra;
    }
    public function getHonorarios_tra(){
        return $this->Honorarios_tra;
    }
    public function setHonorarios_tra($Honorarios_tra){
        $this->Honorarios_tra = $Honorarios_tra;
    }
    
    
    public function getNumero_CNJ_Antigo_cre(){
        return $this->Numero_CNJ_Antigo_cre;
    }
    public function setNumero_CNJ_Antigo_cre($Numero_CNJ_Antigo_cre){
        $this->Numero_CNJ_Antigo_cre = $Numero_CNJ_Antigo_cre;
    }
    public function getNatureza_cre(){
        return $this->Natureza_cre;
    }
    public function setNatureza_cre($Natureza_cre){
        $this->Natureza_cre = $Natureza_cre;
    }
    public function getUF_cre(){
        return $this->UF_cre;
    }
    public function setUF_cre($UF_cre){
        $this->UF_cre = $UF_cre;
    }
    public function getParte_contraria_cre(){
        return $this->Parte_contraria_cre;
    }
    public function setParte_contraria_cre($Parte_contraria_cre){
        $this->Parte_contraria_cre = $Parte_contraria_cre;
    }
    public function getSegurado_cre(){
        return $this->Segurado_cre;
    }
    public function setSegurado_cre($Segurado_cre){
        $this->Segurado_cre = $Segurado_cre;
    }
    public function getHonorarios_cre(){
        return $this->Honorarios_cre;
    }
    public function setHonorarios_cre($Honorarios_cre){
        $this->Honorarios_cre = $Honorarios_cre;
    }
    public function getValor_cre(){
        return $this->Valor_cre;
    }
    public function setValor_cre($Valor_cre){
        $this->Valor_cre = $Valor_cre;
    }
    public function getNumero_CNJ_Antigo_mon(){
        return $this->Numero_CNJ_Antigo_mon;
    }
    public function setNumero_CNJ_Antigo_mon($Numero_CNJ_Antigo_mon){
        $this->Numero_CNJ_Antigo_mon = $Numero_CNJ_Antigo_mon;
    }
    public function getNatureza_mon(){
        return $this->Natureza_mon;
    }
    public function setNatureza_mon($Natureza_mon){
        $this->Natureza_mon = $Natureza_mon;
    }
    public function getUF_mon(){
        return $this->UF_mon;
    }
    public function setUF_mon($UF_mon){
        $this->UF_mon = $UF_mon;
    }
    public function getParte_contraria_mon(){
        return $this->Parte_contraria_mon;
    }
    public function setParte_contraria_mon($Parte_contraria_mon){
        $this->Parte_contraria_mon = $Parte_contraria_mon;
    }
    public function getSegurado_mon(){
        return $this->Segurado_mon;
    }
    public function setSegurado_mon($Segurado_mon){
        $this->Segurado_mon = $Segurado_mon;
    }
    public function getVlr_Deferido_mon(){
        return $this->Vlr_Deferido_mon;
    }
    public function setVlr_Deferido_mon($Vlr_Deferido_mon){
        $this->Vlr_Deferido_mon = $Vlr_Deferido_mon;
    }
    public function getVlr_Da_causa_mon(){
        return $this->Vlr_Da_causa_mon;
    }
    public function setVlr_Da_causa_mon($Vlr_Da_causa_mon){
        $this->Vlr_Da_causa_mon = $Vlr_Da_causa_mon;
    }
    public function getVlr_Condenação_mon(){
        return $this->Vlr_Condenação_mon;
    }
    public function setVlr_Condenação_mon($Vlr_Condenação_mon){
        $this->Vlr_Condenação_mon = $Vlr_Condenação_mon;
    }
    public function getHonorarios_mon(){
        return $this->Honorarios_mon;
    }
    public function setHonorarios_mon($Honorarios_mon){
        $this->Honorarios_mon = $Honorarios_mon;
    }
    public function getVlr_certidao_de_credito_mon(){
        return $this->Vlr_certidao_de_credito_mon;
    }
    public function setVlr_certidao_de_credito_mon($Vlr_certidao_de_credito_mon){
        $this->Vlr_certidao_de_credito_mon = $Vlr_certidao_de_credito_mon;
    }
    
    
    public function getPASTA(){
        return $this->PASTA;
    }
    public function setPASTA($PASTA){
        $this->PASTA = $PASTA;
    }
    public function getSEGURADO_mon2(){
        return $this->SEGURADO_mon2;
    }
    public function setSEGURADO_mon2($SEGURADO_mon2){
        $this->SEGURADO_mon2 = $SEGURADO_mon2;
    }
    public function getASSINATURA_mon2(){
        return $this->ASSINATURA_mon2;
    }
    public function setASSINATURA_mon2($ASSINATURA_mon2){
        $this->ASSINATURA_mon2 = $ASSINATURA_mon2;
    }
    public function getN_SIN_ADM_mon2(){
        return $this->N_SIN_ADM_mon2;
    }
    public function setN_SIN_ADM_mon2($N_SIN_ADM_mon2){
        $this->N_SIN_ADM_mon2 = $N_SIN_ADM_mon2;
    }
    public function getDT_SIN_mon2(){
        return $this->DT_SIN_mon2;
    }
    public function setDT_SIN_mon2($DT_SIN_mon2){
        $this->DT_SIN_mon2 = $DT_SIN_mon2;
    }
    public function getN_PROC_JUD_CNJ_mon(){
        return $this->N_PROC_JUD_CNJ_mon;
    }
    public function setN_PROC_JUD_CNJ_mon($N_PROC_JUD_CNJ_mon){
        $this->N_PROC_JUD_CNJ_mon = $N_PROC_JUD_CNJ_mon;
    }
    public function getN_ANTIGO_mon2(){
        return $this->N_ANTIGO_mon2;
    }
    public function setN_ANTIGO_mon2($N_ANTIGO_mon2){
        $this->N_ANTIGO_mon2 = $N_ANTIGO_mon2;
    }
    public function getUF_CIDADE_mon2(){
        return $this->UF_CIDADE_mon2;
    }
    public function setUF_CIDADE_mon2($UF_CIDADE_mon2){
        $this->UF_CIDADE_mon2 = $UF_CIDADE_mon2;
    }
    public function getCOMARCA_mon2(){
        return $this->COMARCA_mon2;
    }
    public function setCOMARCA_mon2($COMARCA_mon2){
        $this->COMARCA_mon2 = $COMARCA_mon2;
    }
    public function getFORO_mon2(){
        return $this->FORO_mon2;
    }
    public function setFORO_mon2($FORO_mon2){
        $this->FORO_mon2 = $FORO_mon2;
    }
    public function getVARA_mon2(){
        return $this->VARA_mon2;
    }
    public function setVARA_mon2($VARA_mon2){
        $this->VARA_mon2 = $VARA_mon2;
    }
    public function getHABILITANTE_mon2(){
        return $this->HABILITANTE_mon2;
    }
    public function setHABILITANTE_mon2($HABILITANTE_mon2){
        $this->HABILITANTE_mon2 = $HABILITANTE_mon2;
    }
    public function getVL_CERT_CRED_mon2(){
        return $this->VL_CERT_CRED_mon2;
    }
    public function setVL_CERT_CRED_mon2($VL_CERT_CRED_mon2){
        $this->VL_CERT_CRED_mon2 = $VL_CERT_CRED_mon2;
    }
    public function getDT_CRED_mon2(){
        return $this->DT_CRED_mon2;
    }
    public function setDT_CRED_mon2($DT_CRED_mon2){
        $this->DT_CRED_mon2 = $DT_CRED_mon2;
    }
    public function getOBSEVACAO_mon2(){
        return $this->OBSEVACAO_mon2;
    }
    public function setOBSEVACAO_mon2($OBSEVACAO_mon2){
        $this->OBSEVACAO_mon2 = $OBSEVACAO_mon2;
    }
    public function getVlr_condenacao_mon(){
        return $this->Vlr_condenacao_mon;
    }
    public function setVlr_condenacao_mon($Vlr_condenacao_mon){
        $this->Vlr_condenacao_mon = $Vlr_condenacao_mon;
    }
    public function getNumero_CNJ_Antigo(){
        return $this->Numero_CNJ_Antigo;
    }
    public function setNumero_CNJ_Antigo($Numero_CNJ_Antigo){
        $this->Numero_CNJ_Antigo = $Numero_CNJ_Antigo;
    }
    public function getNatureza(){
        return $this->Natureza;
    }
    public function setNatureza($Natureza){
        $this->Natureza = $Natureza;
    }
    public function getUF(){
        return $this->UF;
    }
    public function setUF($UF){
        $this->UF = $UF;
    }
    public function getParte_contraria(){
        return $this->Parte_contraria;
    }
    public function setParte_contraria($Parte_contraria){
        $this->Parte_contraria = $Parte_contraria;
    }
    public function getSegurado(){
        return $this->Segurado;
    }
    public function setSegurado($Segurado){
        $this->Segurado = $Segurado;
    }
    public function getVlr_deferido(){
        return $this->Vlr_deferido;
    }
    public function setVlr_deferido($Vlr_deferido){
        $this->Vlr_deferido = $Vlr_deferido;
    }
    public function getVlr_da_causa(){
        return $this->Vlr_da_causa;
    }
    public function setVlr_da_causa($Vlr_da_causa){
        $this->Vlr_da_causa = $Vlr_da_causa;
    }
    public function getVlr_condenacao(){
        return $this->Vlr_condenacao;
    }
    public function setVlr_condenacao($Vlr_condenacao){
        $this->Vlr_condenacao = $Vlr_condenacao;
    }
    public function getHonorarios(){
        return $this->Honorarios;
    }
    public function setHonorarios($Honorarios){
        $this->Honorarios = $Honorarios;
    }
    public function getVlr_certidao_de_credito(){
        return $this->Vlr_certidao_de_credito;
    }
    public function setVlr_certidao_de_credito($Vlr_certidao_de_credito){
        $this->Vlr_certidao_de_credito = $Vlr_certidao_de_credito;
    }
    public function getAba(){
        return $this->Aba;
    }
    public function setAba($Aba){
        $this->Aba = $Aba;
    }
    public function getAlteracao(){
        return $this->Alteracao;
    }
    public function setALteracao($Alteracao){
        $this->Alteracao = $Alteracao;
    }
    public function getValor_Pedido(){
        return $this->Valor_Pedido;
    }
    public function setValor_Pedido($Valor_Pedido){
        $this->Valor_Pedido = $Valor_Pedido;
    }
    public function getOBS(){
        return $this->OBS;
    }
    public function setOBS($OBS){
        $this->OBS = $OBS;
    }
    public function getSINISTRO(){
        return $this->SINISTRO;
    }
    public function setSINISTRO($SINISTRO){
        $this->SINISTRO = $SINISTRO;
    }
    public function getFaixa_de_Probabilidade(){
        return $this->Faixa_de_Probabilidade;
    }
    public function setFaixa_de_Probabilidade($Faixa_de_Probabilidade){
        $this->Faixa_de_Probabilidade = $Faixa_de_Probabilidade;
    }
    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getOk(){
        return $this->ok;
    }
    public function setOk($ok){
        $this->ok = $ok;
    }
    public function getTITULAR(){
        return $this->TITULAR;
    }
    public function setTITULAR($TITULAR){
        $this->TITULAR = $TITULAR;
    }
    public function getVALOR_ADMINISTRATIVO(){
        return $this->VALOR_ADMINISTRATIVO;
    }
    public function setVALOR_ADMINISTRATIVO($VALOR_ADMINISTRATIVO){
        $this->VALOR_ADMINISTRATIVO = $VALOR_ADMINISTRATIVO;
    }   
    public function getbeneficiario(){
        return $this->beneficiario;
    }
    public function setbeneficiario($beneficiario){
        $this->beneficiario = $beneficiario;
    }    
    public function getidtitular(){
        return $this->idtitular;
    }
    public function setidtitular($idtitular){
        $this->idtitular = $idtitular;
    }   
    public function getidbenefi(){
        return $this->idbenefi;
    }
    public function setidbenefi($idbenefi){
        $this->idbenefi = $idbenefi;
    }   
    public function getrecente(){
        return $this->recente;
    }
    public function setrecente($recente){
        $this->recente = $recente;
    }
}
