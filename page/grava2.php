<style>
    .gravando{
        margin: 15% auto;
    }
</style>
<?php
    function redirecionar($tempo,$url, $mensagem){
        header("Refresh: $tempo; url=$url");
        echo "<div class=gravando>";
        echo '<center>'.$mensagem.  '</center><br/>';
        echo '<center><img src="../web/img/escrevendo.gif" alt="" height=50 /><br/><br/><tt><i>gravando...</i></tt></center>';
        echo "</div>";
    }
    $errors = array();
    $judi = new Judi();
    //$judi = null;
    $edit = array_key_exists('id', $_GET);
    //echo "<pre>";
    //print_r($_GET);
    //print_r($_POST);die;
    
    if (array_key_exists('cancel', $_POST)) {
    // redirect
        Utils::redirect('acaoJudicial', array('id' => $judi->getId(),'act' => 'ver'));
    }else{
        //echo "<pre>";
        //PRINT_R($judi);die;
        $judi->setNumero_CNJ_Antigo($_POST['Numero_CNJ_Antigo']);
        $judi->setNatureza($_POST['Natureza']);
        $judi->setUF($_POST['UF']);
        $judi->setParte_contraria($_POST['Parte_contraria']);
        $judi->setSegurado($_POST['Segurado']);
        $judi->setbeneficiario($_POST['beneficiario']);
        $judi->setFaixa_de_Probabilidade($_POST['faixa_de_probabilidade']);
    $judi->setVlr_deferido(JudiValidator::trocavirgula($_POST['Vlr_deferido']));
        $judi->setVlr_da_causa(JudiValidator::trocavirgula($_POST['Vlr_da_causa']));
        $judi->setVlr_condenacao(JudiValidator::trocavirgula($_POST['Vlr_condenacao']));
        $judi->setValor_Pedido(JudiValidator::trocavirgula($_POST['Valor_Pedido']));
        $judi->setHonorarios(JudiValidator::trocavirgula($_POST['honorarios']));
        $judi->setOBS($_POST['obs']);
        $judi->setSINISTRO($_POST['sinistro']);
        $judi->setAba($_POST['Aba']);
        @$judi->setid($_POST['id']);
        //@$judi->setAlteracao($_POST['Alteracao']);
        @$judi->setlogin(getenv("USERNAME"));
        //print_r($judi);die;
    
        $Tododao=new TodoDao();
        $Judidao=new JudiDao();
        
        //echo "<pre>";
        //print_r($judi);die;
    
        $judi->setrecente(1);
        $Judidao->saveJd2($judi);
    
        //print_r(mysql_affected_rows()); 
        redirecionar('1','index.php?page=acaoJudicial&act=ver','AGUARDE');
        //echo "<img src='../web/carregando.gif' />";
        //echo "Cadastro realizado com sucesso";
        //sleep(10);
        //echo "<script>history.go(-1)</script>";
    }
    die;
     //elseif (array_key_exists('save', $_POST)) {
        $data = array(
            'title' => $_POST['odbc']['title'],
            'due_on' => $_POST['odbc']['due_on_date'] . ' ' . @$_POST['odbc']['due_on_hour'] . ':' . @$_POST['odbc']['due_on_minute'] . ':00',
            'priority' => $_POST['odbc']['priority'],
            'description' => @$_POST['odbc']['description'],
            'comment' => @$_POST['odbc']['comment'],
            'descricao' => $_POST['odbc']['descricao'],
            'numero' => $_POST['odbc']['numero'],
            'origem' => $_POST['odbc']['origem'],
            'tipoacao' => $_POST['odbc']['tipoacao'],
            'processo' => $_POST['odbc']['processo'],
            'identificador' => $_POST['odbc']['identificador'],
            'causa' => $_POST['odbc']['causa'],
            'imediata' => $_POST['odbc']['imediata'],
            'corretiva' => $_POST['odbc']['corretiva'],
            'implementador' => $_POST['odbc']['implementador'],
            'eliminacao' => $_POST['odbc']['eliminacao']. ' ' . date("H").":".$_POST['odbc']['eliminacao_min'] . ':00',
            'eliminacao_novo' => $_POST['odbc']['eliminacao_novo']. ' ' . date("H").":".$_POST['odbc']['eliminacao_novo_min'] . ':00',
            'reg_eficacia' => $_POST['odbc']['reg_eficacia'],
            'resp_verificacao' => $_POST['odbc']['resp_verificacao'],
            'eficaz_data' => $_POST['odbc']['eficaz_data']. ' ' . date("H").":".$_POST['odbc']['eficaz_data_min'] . ':00',
            'novo_rnc' => $_POST['odbc']['novo_rnc'],
            'eficaz' => @$_POST['odbc']['eficaz']
    );
    // mapear
        OdbcMapper::map($odbc, $data);
    // validar
        $errors = OdbcValidator::validate($todo);
  
        if (empty($errors)) {
        // gravar
            $dao = new OdbcDao();
            $odbc = $dao->save($odbc);
            Flash::addFlash('RNC salvo com sucesso.');
        // redirecionar
            Utils::redirect('detail', array('id' => $odbc->getId()));
        }
    //}
?>

