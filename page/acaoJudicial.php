<head>
    <meta charset="utf-8">
<script>
    function total($x){
        var x='Clique aqui para ver duplicidades';
        document.getElementById('total').innerHTML=x;
    }  
    function contagem($msg,$atual){
        var atual=$atual;
        var msg="<br><i><font color=blue>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp buscando </font></i><font size=5>"+atual+"</font><i><font color=blue> registros </font></i>";//<font size=5>"+$msg+"</font>";
        document.getElementById('contagem').innerHTML=msg;
    }
    function contagem2($tempo){
        var tempo_=$tempo;
        var msg="<br><i><font color=#606060 size=1>"+tempo_+" segundos</font></i>";//<font size=5>"+$msg+"</font>";
        document.getElementById('tempo').innerHTML=msg;
    }
    function excluir($id){
       var y=confirm('Confirma a excusão?');
       var id=$id;
       if(y){
         location.href='index.php?page=delete2&id='+id+'&tabela=acoes_transitado_julgado_18102016';
       }
    }
    function atualiza(){
        var x=confirm('Esta ação poderá levar aproximadamento 15 minutos.\nContinua?');
        if(x){
            location.href='index.php?page=acaoJudicial&act=ver&atualiza=1';
        }
    }
function id(el) {
        document.getElementById('carregando').innerHTML='';
	return document.getElementById(el);
}
</script>
<style>
    .formulario{
        margin: 50px auto;
        width: 90%;
    }
    .botao input{
        margin-left: 5px;
        padding: 2px;
        float: right;
        background: -webkit-linear-gradient(bottom, #E0E0E0, #F9F9F9 10%);
        background: -moz-linear-gradient(bottom, #E0E0E0, #F9F9F9 10%);
        background: -o-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
        background: -ms-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
        background: linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
        border: 1px solid #CCCCCE;
        border-radius: 3px;
        box-shadow: 0 3px 0 rgba(0, 0, 0, .3),
                      0 2px 7px rgba(0, 0, 0, 0.2);
        color: #616165;
        font-family: "Trebuchet MS";
        font-size: 13px;
        font-weight: bold;
        line-height: 15px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        text-shadow:1px 1px 0 #FFF;
    }
    .botao input:hover{
        margin-left: 5px;
        padding: 2px;
        float: right;
        background: -webkit-linear-gradient(bottom, #E0E0E0, #F9F9F9 10%);
        background: -moz-linear-gradient(bottom, #E0E0E0, #F9F9F9 10%);
        background: -o-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
        background: -ms-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
        background: linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
        border: 1px solid #CCCCCE;
        border-radius: 3px;
        box-shadow: 0 3px 0 rgba(0, 0, 0, .3),
                      0 2px 7px rgba(0, 0, 0, 0.2);
        color: yellowgreen;
        font-family: "Trebuchet MS";
        font-size: 13px;
        font-weight: bold;
        line-height: 15px;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
        text-shadow:1px 1px 0 #FFF;
    }
    body{
        background-color: silver;
    }
    table{
         width: 100%;
         font-size: 10px;
    }
    table td{
        #color: white;
    }
    table th{
        background-color: green;
        color: white;
    }
    /*
    table td:hover{
        position: absolute;
        font-size: 18px;
        color: blue;
        background-color: white;
        text-align: center;
    }
    */
    .add:hover {
        background: blanchedalmond;
    }
    .voltar button{
        background: transparent; 
    }
    .voltar button:hover{
        background-color: white;
    }
    .edicao:hover{
        background-color: silver;
    }
    .moedas{   
        padding: 5px 10px;
    }
    a:link,a:visited{
        text-decoration: none;
        color: white;
    }
    .topo{
        position: absolute;
        right: 10px;
    }
    .btn{
         width: 100%;
         background: -moz-linear-gradient(bottom, #E0E0E0, #F9F9F9 70%);
         box-shadow: 0 3px 0 rgba(0, 0, 0, .3),
                       0 2px 7px rgba(0, 0, 0, 0.2);
    }
    .btn:hover{
        width: 100%;
        background: -moz-linear-gradient(bottom, #efedd3, #fdfdf8 70%);
    }
    .conteudo{
        position: absolute;
        top:1px;
    }
    .carregando{
        position: fixed;
        left: 39%;
        top: 130px;
     }
     form {
         font-size: 15px;
     }
     select{
         font-size: 11px;
     }
     .tempo{
         position: absolute;
         top: 30px;
         left: 15px;
     }
</style>
<a id="topo"></a>
</head>
<body>
<?php
$time = time(true);
function titulos(){
    $titulos=array(
        "Número CNJ / Antigo",
        'Natureza',
        'UF',
        'Parte contrária',
        'Segurado',
        'Beneficiário',
        'Faixa de Probabilidade',
        'Valor Deferido',
        'Valor da causa',
        'Valor condenação',
        'Valor Pedido',
        'Honorários',
        'OBS',
        'DUPLICIDADE',
        'Login',
        'Alteração',
        //'ABA',
    );
    return $titulos;
}
function conteudo($judi){
    $campos=array(
        $judi->getNumero_CNJ_Antigo(),
        $judi->getNatureza(),
        $judi->getUF(),
        $judi->getParte_contraria(),
        $judi->getSegurado(),
        $judi->getbeneficiario(),
        $judi->getFaixa_de_Probabilidade(),
        $judi->getVlr_deferido(),
        $judi->getVlr_da_causa(),
        $judi->getVlr_condenacao(),
        $judi->getValor_Pedido(),
        $judi->getHonorarios(),
        $judi->getOBS(),
        $judi->getSINISTRO(),
        $judi->getlogin(),
        $judi->getAlteracao(),
        //$judi->getAba(),
    );
    return $campos;
}
@$act=$_GET['act'];
$errors = array();
$judi = null;
$edit = array_key_exists('id', $_GET);
@$ordem = $_GET['ordem'];
if(@$ordem == 'Alteração'){
 $ordem = 'Alteracao';
}
@$atualiza = $_GET['atualiza'];
$cabecalho = 'A&Ccedil;&Otilde;ES TRANSITADO E JULGADO';
if(!isset($verificar)){
 $verificar=null;
}
if(!isset($atualiza)){
 $atualiza=null;
}
$totalDuplicidade=0;
/// padroes da tabela ///
$fundo='white';


   if ($edit) {
     $judi = Utils::getJudiByGetId2();
   } else {
    $Tododao=new TodoDao();
    $Todosearch=new TodoSearchCriteria();
    $Odbcdao=new OdbcDao();
    $Odbcsearch=new OdbcSearchCriteria();
    $Oracledao=new OracleDao();
    $Oraclesearch=new OracleSearchCriteria();
    
    $Judidao=new JudiDao();
    $Judisearch=new JudiSearchCriteria();
     echo "<div id=tempo class=tempo></div>";
        echo "<div class=carregando id=carregando>";
            echo '<img src="img/loading.gif" alt="" id="loading" height=55px />';
            echo "<i>POR FAVOR AGUARDE...</i>";
            echo "<br>";
            echo "<div id=contagem></div>";
        echo "</div>"; 
   }
 
    //////// Exibe tabela /////////
  if(@$act=='ver'){ 
      
        //echo "<div id=mostra class=conteudo style='display:none'>";
      
    $judis=$Judidao->listaAcao($Judisearch,$ordem);// tabela transito e julgado
    //$sinistrado=new Odbc();
    $titulos=titulos(); 
      echo "<div class=voltar><a href='index.php'><button title='Voltar'><img src='../web/img/action/back.png' height=15 title='Voltar'></button></a></div>";
      echo "<table border=1 align=center cellspacing=0 spanspacing=0 class=\"tabela\">";
      echo "<caption><h2>$cabecalho</h2></caption>";
    echo "<tr><th style=\"background-color: rgba(123, 123, 123, 0.5)\" colspan=12 align=left> Total de linhs ".  number_format(count($judis),'0','','.')."</th><th align=right colspan=3 style=\"background-color: rgba(123, 123, 123, 0.5)\"><a href='index.php?page=duplicado'><div id='total'></div></a></th><th style=\"background-color: rgba(123, 123, 123, 0.5)\" ><button  class=btn onclick=atualiza() title='Clique aqui para atualizar'><img src=img/atualizar.png height=13px></button></th></tr>";
      foreach($titulos as $titulo){
       $titulo_=(str_replace(' ','',$titulo));
          echo "<th class=moedas style= \"white-space: nowrap;\">";
          if($titulo != 'DUPLICIDADE' && $titulo != 'ALTERAÇÃO' && $titulo != 'Beneficiário'){
           echo "<a href=index.php?page=acaoJudicial&act=ver&ordem=".$titulo_.">";
            echo mb_strtoupper($titulo);
           echo "</a>";
          }elseif($titulo == 'ALTERAÇÃO'){
            echo "<a href=index.php?page=acaoJudicial&act=ver&ordem=Alteracao>";
                echo mb_strtoupper($titulo);
            echo "</a>";  
          }elseif($titulo == 'Beneficiário'){
            echo "<a href=index.php?page=acaoJudicial&act=ver&ordem=beneficiario>";
                echo mb_strtoupper($titulo);
            echo "</a>";  
          }else{
            echo mb_strtoupper($titulo);
          }
          echo "</th>";
      }
      $x=0; 
      $deferido=$causa=$condenacao=$honorario=$certidao=$pedido=null;
      
      $titularOld='inicial';
      $titular_=null;
      $atual=count($judis);
      foreach($judis as $judi){
       //echo '<pre>';
       //print_r($judi);
        echo "<div><script>contagem2('".(time(true) - $time)."');</script></div>";
          //// Procurando por duplicidade no administrativo ////          
          //if($x==330)die;
       if($atualiza == 1){
        if(!$judi->getSINISTRO() && $judi->getSegurado() != null){
         $Odbcsearch->setTITULAR(JudiValidator::tirarAcento('%'.$judi->getSegurado().'%'));
         $sinistrado=$Odbcdao->busca3($Odbcsearch, 'TITULAR');
         if($sinistrado){
         //echo '<pre>';
         //print_r($sinistrado);die;
           
          foreach($sinistrado as $keys => $item){
         
           if(count($sinistrado)>1){
             if(mb_strlen(trim($judi->getSegurado()),'utf8') == mb_strlen(utf8_encode(trim($item->getTITULAR())), 'utf8')){
                    $judi->setSINISTRO($item->getsinistro());
                    $judi->setTITULAR_h($item->getTITULAR());
                    $judi->setidtitular($item->getidtitular());               
             }else{
                if($judi->getParte_contraria()){
                 $Odbcsearch->setnome('%'.JudiValidator::tirarAcento($judi->getParte_contraria()).'%');
                 $beneficiarios=$Odbcdao->busca4($Odbcsearch, 'nome');
                  if(count($beneficiarios)>1){
                   foreach($beneficiarios as $beneficiario_){
                     if(mb_strlen(trim($judi->getParte_contraria()),'utf8') == mb_strlen(utf8_encode(trim($beneficiario_->getnome())),'utf8')){
                        $judi->setSINISTRO($beneficiario_->getsinistro());
                        $judi->setbeneficiario($beneficiario_->getnome());
                        $judi->setidbenefi($beneficiario_->getidbenefi());
                     }
                   }
                     if(!$judi->getbeneficiario()){
                        $judi->setSINISTRO($beneficiario_->getsinistro());
                        $judi->setbeneficiario($beneficiario_->getnome());
                        $judi->setidbenefi($beneficiario_->getidbenefi());
                     }
                  }else{
                       foreach($beneficiarios as $beneficiario_);
                       $judi->setSINISTRO($beneficiario_->getsinistro());
                       $judi->setbeneficiario($beneficiario_->getnome());
                       $judi->setidbenefi($beneficiario_->getidbenefi());
                  }
                 }
                }                
             //}
         }else{
            $judi->setSINISTRO($item->getsinistro());
            $judi->setTITULAR_h(utf8_encode($item->getTITULAR()));
            $judi->setidtitular($item->getidtitular());
         }
          //echo "<pre>";
          //die;
          //print_r($judi->getSegurado());
          //if('Pedro Dias Lopes'==$judi->getSegurado()){
           //die;
          //}
                //if(mb_strlen($judi->getSegurado(),'utf8') == mb_strlen(utf8_encode($item->getTITULAR(),'utf8'))){
                    
               // }else{
                    /*if('FRANCISCO GONÇALVES DA SILVA' == $judi->getSegurado()){
                     echo "<pre>";
                     print_r(utf8_encode($item->getTITULAR()));
                     echo "<br>";
                     echo mb_strlen($judi->getSegurado(),'utf8');
                     echo "<br>";
                     echo mb_strlen($item->getTITULAR(),'utf8');
                     //die;
                      
                    }*/
                //}
            }
          }else{
            if($judi->getParte_contraria()){
             $Odbcsearch->setnome('%'.JudiValidator::tirarAcento($judi->getParte_contraria()).'%');
             $beneficiarios=$Odbcdao->busca4($Odbcsearch, 'nome');
             if($beneficiarios > 1){
               foreach($beneficiarios as $beneficiario_){
                if(mb_strlen(utf8_encode(trim($beneficiario_->getnome())),'utf8') == mb_strlen(trim($judi->getParte_contraria()),'utf8')){
                   $judi->setSINISTRO($beneficiario_->getsinistro());
                   $judi->setbeneficiario($beneficiario_->getnome());
                   $judi->setidbenefi($beneficiario_->getidbenefi());
                }
                if(!$judi->getbeneficiario()){
                   $judi->setSINISTRO($beneficiario_->getsinistro());
                   $judi->setbeneficiario($beneficiario_->getnome());
                   $judi->setidbenefi($beneficiario_->getidbenefi());
                }
               }
             }else{
                foreach($beneficiarios as $beneficiario_);
                    $judi->setSINISTRO($beneficiario_->getsinistro());
                    $judi->setbeneficiario($beneficiario_->getnome());
                    $judi->setidbenefi($beneficiario_->getidbenefi());
             }
            }
          }
        }elseif(!$judi->getSINISTRO()){
            $Odbcsearch->setnome(JudiValidator::tirarAcento($judi->getParte_contraria()));
             $beneficiarios=$Odbcdao->busca4($Odbcsearch, 'nome');
             if(count($beneficiarios)>1){
                foreach($beneficiarios as $beneficiario_){
                  if(mb_strlen(trim($judi->getParte_contraria()),'utf8') == mb_strlen(utf8_encode(trim($beneficiario_->getnome())),'utf8')){
                       $judi->setSINISTRO($beneficiario_->getsinistro());
                       $judi->setbeneficiario($beneficiario_->getnome());
                       $judi->setidbenefi($beneficiario_->getidbenefi());
                  }else{
                   $judi->setSINISTRO($beneficiario_->getsinistro());
                   $judi->setbeneficiario($beneficiario_->getnome());
                   $judi->setidbenefi($beneficiario_->getidbenefi());   
                  }
                }
             }
          }else{
            $Odbcsearch->setsinistro($judi->getSINISTRO());
            $sinistros=$Odbcdao->busca3($Odbcsearch);
            foreach($sinistros as $sinistro_){
                //echo "<pre>";
                $sinistro=($sinistro_->getsinistro());
            }
            if(!isset($sinistro)){
                $judi->setOk(1);
            }
          }
           $atual--;
           $titularOld=$titular_; 
        ///// contagem dos processos /////
         echo "<script>contagem(".count($judis).",".$atual.")</script>";
        //// ///
       }
           
            //// Termino da busca ////
      
           ///// Construindo a tabela ////
       $campos=conteudo($judi);
       /*
       echo '<pre>';
       echo 'Judi<br>';
       print_r($judi);
       echo 'Sinistrado<br>';
       print_r($item);
       echo 'Beneficiarios<br>';
       print_r($beneficiario_);
       echo 'Campos<br>';
       print_r($campos);
        * 
        */
      echo "<tr>";
       foreach($campos as $key => $campo){
        if(preg_match("/^[0-9]/",$campo) && $campos[0] != $campo && $campos[13] != $campo){// passa somente valores monetarios e a data
            if($key == 15){//formata a data
                echo "<td align=right bgcolor=".$fundo.">";
                    echo date('H:i d/m/Y',$campo);
                echo "</td>";
            }else{//formata valores monetários
                echo "<td align=right bgcolor=".$fundo.">";
                    echo number_format($campo,'2',',','.');
                echo "</td>";
            }
        }elseif($key == 0 || $key == 1 || $key == 2 || $key == 6 || $key == 12 || $key == 14){
            echo "<td align=center bgcolor=".$fundo.">";
                echo mb_strtoupper($campo);
            echo "</td>";
        }elseif($key == 4){
            //echo '<pre>';
            //if(isset($item)){
                //print_r($item);
            //}
            //echo 'segurado - '.$judi->getSegurado().'('.mb_strlen(trim($judi->getSegurado()),'utf8').')';
            //echo '<br>';
            //echo 'titular - '.$judi->getTITULAR().'('.mb_strlen(trim($judi->getTITULAR()),'utf8').')';
            //echo '<br>';
            //echo '<pre>';
            //print_r($judi);
         if(mb_strlen(trim($judi->getSegurado()),'utf8') == mb_strlen(trim($judi->getTITULAR()),'utf8') || $judi->getTITULAR_h()){
             $judi->setTITULAR($judi->getTITULAR_h());
             $judi->setVALOR_ADMINISTRATIVO($judi->getCORRECAO_TR_h());
             $judi->setidtitular($judi->getidtitular());
            
             if($atualiza==1){///// Gravando Sinistro e Titular em Acoes /////
              $Judidao->saveJd2($judi);
             }
            echo "<td bgcolor=".$fundo.">";
                echo mb_strtoupper($campo);
            echo "</td>";
         }else{
          //echo '<pre>';
          //print_r($item->getTITULAR());
             if(mb_strlen(trim($judi->getTITULAR()),'utf8') <> 0){
                echo "<td bgcolor=yellow>";
                  echo mb_strtoupper($campo);
                echo "</td>";
             }else{
                echo "<td bgcolor=".$fundo.">";
                    echo mb_strtoupper($campo);
                echo "</td>"; 
             }
           //echo '<pre>';
          //print_r($sinistrado);
          //print_r($judi);die;
         }
        }elseif($key == 3 || $key == 5){
            if(mb_strlen(trim($judi->getbeneficiario()),'utf8') == mb_strlen(trim($judi->getParte_contraria()),'utf8')){
                echo "<td bgcolor=".$fundo.">";
                    echo mb_strtoupper($campo); 
                echo "</td>";
                    if($atualiza == 1){
                        $Judidao->saveJd2($judi);
                    } 
            }else{
               if($campo == null || $key == 3){
                 echo "<td bgcolor=".$fundo.">";
                    echo mb_strtoupper($campo); 
                 echo "</td>";
               }else{
                 echo "<td bgcolor=yellow>";
                    echo mb_strtoupper($campo);
                 echo "</td>";
               }
            }
        }elseif($key == 13){
            //echo '<pre>';
            //print_r($judi);
           if(isset($item) || isset($beneficiario_)){
                echo "<td bgcolor=".$fundo.">";
                 echo mb_strtoupper($campo);
                echo "</td>"; 
           }else{
               echo "<td bgcolor=".$fundo.">";
               echo "</td>";
           }
        }
        switch($key){
          case 7:
           $deferido=$deferido+$campo;
           break;
          case 8:
           $causa=$causa+$campo;
           break;
          case 9:
           $condenacao=$condenacao+$campo;
           break;
          case 10:
           $honorario=$honorario+$campo;
           break;
          case 11:
           $pedido=$pedido+$campo;
           break;
        }
       }
     ///// EDIÇÃO /////
     
       $id=$judi->getId();
       echo "<td class=edicao ><a href='index.php?page=acaoJudicial&act=cadastro&id=".$judi->getId()."' ><img src='../web/img/lapis.gif' height=20 title='Fazer Altera&ccedil;&otilde;es'/></a></td>";
       echo "<td class=edicao onclick=excluir($id)>&nbsp<img src='../web/img/excluir.png' height=13 title='Excluir Linha'/>&nbsp</td>";
       
     //// FIM EDIÇão //// 
       echo "</tr>";
       unset($sinistro,$titular);
       $x++;
        ///// contagem dos processos /////
         echo "<script>contagem(".count($judis).",".$atual.")</script>";
        //// ///
          $judi=new Judi();
          $sinistrado=new Odbc();
     }   
     echo "<tr><th class=moedas style=\"background-color: #556B2F\" colspan=7 align=right>TOTAIS</th><th style=\"background-color: #556B2F\" align=right>R$ ".number_format($deferido,'2',',','.')."</th><th style=\"background-color: #556B2F\" align=right>R$ ".number_format($causa,'2',',','.')."</th><th style=\"background-color: #556B2F\" align=right>R$ ".number_format($condenacao,'2',',','.')."</th><th style=\"background-color: #556B2F\" align=right>R$ ".number_format($honorario,'2',',','.')."</th><th style=\"background-color: #556B2F\" align=right>R$ ".number_format($pedido,'2',',','.')."</th><th colspan=6 style=\"background-color: #556B2F\"></th>";
     echo "</tr></table>";
     echo "<script>
            total($totalDuplicidade);            
           </script>";
     echo "<a href='#topo' class=topo><img src='img/setacima.ico' title='Voltar ao Topo' height=20px ></a>";
     
     
        echo "<script>id('mostra').style.display = 'block';</script>";
     die;
  }
     //////// Fim Exibição /////////
     
     /////// Cadastro /////// 
  if(@$act=='cadastro'){
   echo "<div class=formulario>";
   echo "<form action='index.php?page=grava2' method=POST>";
    echo "<fieldset>";
    echo "<legend><h3>$cabecalho (edi&ccedil;&atilde;o)</h3></legend>";
        $titulos=titulos();
        //$x=0;
        //echo "<pre>";
        //print_r($titulos);die;
        foreach($titulos as $chaves => $titulo){
          switch($chaves){
              case 0:
               if($edit){
                echo "<input type=hidden name=id value=".Utils::escape($judi->getId()).">";
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=30 name='Numero_CNJ_Antigo' value='".Utils::escape($judi->getNumero_CNJ_Antigo())."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=30 name='Numero_CNJ_Antigo'>";
               }
                break;
              case 1:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=15 name='Natureza' value='".Utils::escape($judi->getNatureza())."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=15 name='Natureza'>";
               }
                break;
              case 2:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=20 maxlength=20 name='UF' value='".Utils::escape($judi->getUF())."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=2 maxlength=2 name='UF'>";
               }
                break;
              case 3:
               if($edit){
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text size=50 name='Parte_contraria' value='".Utils::escape($judi->getParte_contraria())."'>";
               }else{
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text size=50 name='Parte_contraria'>";
               }
                break;
              case 4:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=50 name='Segurado' value='".Utils::escape($judi->getSegurado())."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=50 name='Segurado'>";
               }
                break;
              case 5:
               if($edit){
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text size=50 name='beneficiario' value='".Utils::escape($judi->getbeneficiario())."'>";
               }else{
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text name='beneficiario'>";
               }
                break;
              case 6:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=30 name='faixa_de_probabilidade' value='".Utils::escape($judi->getFaixa_de_Probabilidade())."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text size=30 name='faixa_de_probabilidade'>";
               }
                break;
              case 7:
               if($edit){
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text name='Vlr_deferido' value='".number_format(JudiValidator::trocavirgula(Utils::escape($judi->getVlr_deferido())),'2',',','.')."'>";
               }else{
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text name='Vlr_deferido'>";
               }
                break;
              case 8:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='Vlr_da_causa' value='".number_format(JudiValidator::trocavirgula(Utils::escape($judi->getVlr_da_causa())),'2',',','.')."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='Vlr_da_causa'>";
               }
                break;
              case 9:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='Vlr_condenacao' value='".number_format(JudiValidator::trocavirgula(Utils::escape($judi->getVlr_condenacao())),'2',',','.')."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='Vlr_condenacao'>";
               }
                break;
              case 10:
               if($edit){
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text name='Valor_Pedido' value='".number_format(JudiValidator::trocavirgula(Utils::escape($judi->getValor_Pedido())),'2',',','.')."'>";
               }else{
                echo "<br><br>&nbsp&nbsp ".$titulo.": <input type=text name='Valor_Pedido'>";
               }
                break;
              case 11:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='honorarios' value='".number_format(JudiValidator::trocavirgula(Utils::escape($judi->getHonorarios())),'2',',','.')."'>";
               }else{
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='honorarios'>";
               }
                break;
              case 12:
               if($edit){
                echo "&nbsp&nbsp Origem: <input type=text name='obs' value='".Utils::escape($judi->getOBS())."'>";
               }else{
                echo "&nbsp&nbsp Origem: <input type=text name='obs'>";
               }
                break;
              case 13:
               if($edit){
                echo "<br><br>&nbsp&nbsp Duplicidade: <input type=text name='sinistro' value='".Utils::escape($judi->getSINISTRO())."'>";
               }else{
                echo "<br><br>&nbsp&nbsp Duplicidade: <input type=text name='sinistro'>";
               }
                break;
              case 14:
               if($edit){
                //echo "&nbsp&nbsp ".$titulo.": ";
                //echo "<select name='login' >";
                  //echo "<option selected value='".Utils::escape($judi->getAba())."'>";
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='sinistro' value='".Utils::escape($judi->getlogin())."' disabled>";
                    //echo Utils::escape(date('H:i d/m/Y',$judi->getAlteracao()));
                    //echo "</option>";
                  //echo "<option value='IMPRESS&Atilde;O'>IMPRESS&Atilde;O</option>";
               }else{
                //echo "&nbsp&nbsp ".$titulo.": ";
                //echo "&nbsp&nbsp ".$titulo.": <input type=text name='sinistro'>";
                //echo "<select name=Aba >";
                  //echo "<option value='IMPRESS&Atilde;O'>IMPRESS&Atilde;O</option>";
                //echo "</select>";
               }
                break; 
              case 15:
               if($edit){
                echo "&nbsp&nbsp ".$titulo.": <input type=text name='sinistro' value='".Utils::escape(date('H:i\h \d\e d/m/Y',$judi->getAlteracao()))."' disabled>";
               }else{
                //echo "&nbsp&nbsp ".$titulo.": <input type=text name='sinistro'>";
               }
                break;           
          }
          //$x++;
        }
        echo "</fieldset>";
           echo "<input type=hidden name=Aba value='IMPRESS&Atilde;O'>";
        echo "<div class=botao>";
        echo "<input type=submit name=save value=";
            if($edit){
                echo " EDITAR >";
            }else{
                echo " GRAVAR >";
            }
        echo "<input type=submit name=cancel value=CANCELAR>";
        echo "</div>";
     echo "</form>";
   echo "</div>";
  }
  /////// Fim cadastro ///////
?>
</body>