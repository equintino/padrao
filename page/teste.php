<!doctype html>
<!--<html lang="en">-->
<head>
	<meta charset="UTF-8">

<style>
#loading { 
	display: block;
	width: 200px;
}
.content { margin: 0 auto; }
#all {
	width: 1680px; overflow: hidden;
}
.listaBanco{
    margin: 50px 100px;
    width: 80%;
}
</style>
</head>
<body>
<?php 
 
@$act=$_GET['act'];
$errors = array();
$judi = null;
$edit = array_key_exists('id', $_GET);
@$ordem = $_GET['ordem'];
@$atualiza = $_GET['atualiza'];
 if(array_key_exists('banco', $_POST)){
    $banco_=$_POST['banco'];
 }
 if(array_key_exists('act', $_GET)){
    $act=$_GET['act'];
 }

    $Tododao=new TodoDao();
    $Todosearch=new TodoSearchCriteria();
    $Odbcdao=new OdbcDao();
    $Odbcsearch=new OdbcSearchCriteria();
    $Oracledao=new OracleDao();
    $Oraclesearch=new OracleSearchCriteria();
    $PaiDao=new PaiDao();
    
    $Judidao=new JudiDao();
    $Judisearch=new JudiSearchCriteria();
    
    echo '<div class=listaBanco >';
    echo '<form action=index.php?page=teste&act=1 method=POST>';
    $bancos=$PaiDao->listaDb();
    echo '<table class=listaBanco><select name="banco" onchange=submit()>';
      echo "<option selected>$banco_</option>";
    foreach($bancos as $banco){
      echo '<option value="'.$banco['Database'].'">';
        echo $banco['Database'];
      echo '</option>';
    }
    echo '</select>';
    echo '<br>';
    if($act==1){
        $tabelas=($PaiDao->listaTabela($banco_));
        foreach($tabelas as $tabela){
          echo ($tabela["Tables_in_$banco_"]);
          echo '<br>';
        }
    }
    echo '</table>';
    echo '</form>';
    echo '</div>';
?>
</body>
</html>

