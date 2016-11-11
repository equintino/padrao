<?php
//phpinfo();
    $tabela1='sinipend';
    $tabela2='Beneficiarios';
    @$inicio=$_GET['inicio'];
    
    if(@$_GET['certificado']!=null){
        $campo='endosso';
        $busca=$_GET['certificado'];
        $certificado=$busca;
        $busca=OdbcValidator::removePonto($busca);
        $busca=OdbcValidator::mask($busca,"####.##.##.########");
    }elseif($_GET['cpf']){
        $campo='cpf';
        $busca=OdbcValidator::removePonto($_GET['cpf']);
        $cpf=$busca;
    }
    //print_r($dao->listaCampo2($tabela1,$campo,$busca,$pagAtual));
    //echo "<br><br>";
    //print_r($dao->listaCampo($tabela2,$campo,$busca,$pagAtual));die;
    
    if($dao->listaCampo2($tabela1,$campo,$busca,$pagAtual) || $dao->listaCampo($tabela2,$campo,$busca,$pagAtual)){
     $pesquisa=$dao->listaCampo2($tabela1,$campo,$busca,$pagAtual);
     //print_r($pesquisa);
    }else{
     $busca=OdbcValidator::mask($cpf,"###.###.###-##");
     $pesquisa=$dao->listaCampo2($tabela1,$campo,$busca,$pagAtual);
    }
    echo "<div class=informacoes>";
    echo "<h3>SINISTRADO</h3>";
    echo "<div class=sinistrado >";
    if($pesquisa){
        //print_r($pesquisa);die;
        foreach($pesquisa as $item){
            $cpf1=OdbcValidator::removePonto($item['CPF']);
            echo "<label>Certificado: </label>";
            echo $item['ENDOSSO'];
            echo "<br>";
            echo "<label>Sinistro: </label>";
            echo $item['SINISTRO'];
            echo "<br>";
            echo "<label>Sinistrado: </label>";
            echo $item['TITULAR'];
            echo "<br>";
            echo "<label>Cpf: </label>";
                if(strlen($cpf1) != 11){
                    $cor="color=red";
                }else{
                    $cor="color=black";
                }
            echo "<font $cor>";
            echo OdbcValidator::mask($cpf1,'###.###.###-##');
            echo "</font>";
            echo "<br><br>";
            $certificado_[]= $item['ENDOSSO'];
        }
        $limite=count($dao->listaCampo3($tabela1,$campo,$busca,$pagAtual));
        //var_dump($limite);die;
        if($limite < 4){
         $proximo='<button disabled>';
        }else{
         $proximo='<button>';
        }
        $pagAtual=$item['idtitular'];
        
        if($inicio=='sim'){
          $botao="<button disabled>";
        }else{
          $botao="<button onclick=history.go(-1)>";
        }
        echo $botao."ANTERIOR</button>";
        echo "<a href=\"teste3.php?certificado=".$certificado."&cpf=$cpf&act=informacoes&abrir=1&pagAtual=$pagAtual \">".$proximo." PR&Oacute;XIMO</button></a>";
        echo "</div>";
    }else{
        echo "N&atilde;o encontrado nenhum resultado.";
    }
    echo "<h3>BENEFICI&Aacute;RIO(S)</h3>";
    echo "<div class=beneficiario>";
    if($campo=='endosso'){
   for($x=0;$x<count(@$certificado_);$x++){
    if($dao->listaCampo($tabela2,$campo,$certificado_[$x],$pagAtual)){
        foreach($dao->listaCampo($tabela2,$campo,$certificado_[$x],$pagAtual) as $item){
            $cpf2=  OdbcValidator::removePonto($item['cpf']);
            echo "<label>Certificado: </label>";
            echo $item['endosso'];
            echo "<br>";
            echo "<label>Sinistro: </label>";
            echo $item['sinistro'];
            echo "<br>";
            echo "<label>Cobertura: </label>";
            echo $item['tpcobertura'];
            echo "<br>";
            echo "<label>Valor a indenizar: </label>";
            echo number_format($item['vlindeniza'],'2',',','.');
            echo "<br>";
            echo "<label>Benefici&aacute;rio: </label>";
            echo $item['nome'];
            echo "<br>";
            echo "<label>Cpf: </label>";
                if(strlen($cpf2)!=11){
            //print_r(strlen($item['cpf']));
                    $cor="color=red";
                }else{
                    $cor="color=black";
                }
            echo "<font $cor>";
            echo OdbcValidator::mask($cpf2,'###.###.###-##');
            echo "</font>";
            echo "<br><br>";
        }
     }
   }
        echo "</div>";
    }else{
    if($dao->listaCampo4($tabela2,$campo,$busca,$pagAtual)){
        foreach($dao->listaCampo4($tabela2,$campo,$busca,$pagAtual) as $item){
         $cpf3=OdbcValidator::removePonto($item['cpf']);
            echo "<i>Certificado: </i>";
            echo $item['endosso'];
            echo "<br>";
            echo "<i>Sinistro: </i>";
            echo $item['sinistro'];
            echo "<br>";
            echo "<i>Cobertura: </i>";
            echo $item['tpcobertura'];
            echo "<br>";
            echo "<i>Valor a indenizar: </i>";
            echo number_format($item['vlindeniza'],'2',',','.');
            echo "<br>";
            echo "<i>Benefici&aacute;rio: </i>";
            echo $item['nome'];
            echo "<br>";
            echo "<i>Cpf: </i>";
            echo OdbcValidator::mask($cpf3,'###.###.###-##');
            echo "<br><br>";
        }
        echo "</div>";
    }
    }
    echo "</div>";
?>