<?php
/**
 * Validator for {@link Todo}.
 * @see TodoMapper
 */
final class OdbcValidator {

    private function __construct() {
    }

    /**
     * Validate the given {@link Todo} instance.
     * @param Todo $todo {@link Todo} instance to be validated
     * @return array array of {@link Error} s
     */
    public static function validate(Odbc $odbc) {
        $errors = array();
        if (!$odbc->getCreatedOn()) {
            $errors[] = new Error('createdOn', 'Empty or invalid Created On.');
        }
        if (!$odbc->getLastModifiedOn()) {
            $errors[] = new Error('lastModifiedOn', 'Empty or invalid Last Modified On.');
        }
        
        if (!trim($odbc->getTitle())) {
            $errors[] = new Error('title', 'Título em branco.');
        }
        if (!trim($odbc->getNumero())) {
            $errors[] = new Error('numero', 'Necessário inserir o número de registro.');
        }
        /*
        if (!$todo->getDueOn()) {
            $errors[] = new Error('dueOn', 'Empty or invalid Due On.');
        }
         */
        if (!trim($odbc->getPriority())) {
            $errors[] = new Error('priority', 'Priority cannot be empty.');
        } elseif (!self::isValidPriority($odbc->getPriority())) {
            $errors[] = new Error('priority', 'Invalid Priority set.');
        }
        if (!trim($odbc->getStatus())) {
            $errors[] = new Error('status', 'Status cannot be empty.');
        } elseif (!self::isValidStatus($odbc->getStatus())) {
            $errors[] = new Error('status', 'Invalid Status set.');
        }
        return $errors;
    }
    public static function validaCentavos($centavos){
      //echo "passei aqui";
      return intval($centavos);
    }
    public static function removePonto($dado){
        $dado_=preg_replace( '#[^0-9]#', '', $dado );
        return $dado_;
    }

    /**
     * Validate the given status.
     * @param string $status status to be validated
     * @throws Exception if the status is not known
     */
    public static function validateStatus($status) {
        if (!self::isValidStatus($status)) {
            throw new Exception('Unknown status: ' . $status);
        }
    }

    /**
     * Validate the given priority.
     * @param int $priority priority to be validated
     * @throws Exception if the priority is not known
     */
    public static function validatePriority($priority) {
        if (!self::isValidPriority($priority)) {
            throw new Exception('Unknown priority: ' . $priority);
        }
    }

    private static function isValidStatus($status) {
        return in_array($status, Todo::allStatuses());
    }

    private static function isValidPriority($priority) {
        return in_array($priority, Todo::allPriorities());
    }
    
    public static function mask($val, $mask){
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++){
	 if($mask[$i] == '#'){
            if(isset($val[$k]))
                $maskared .= $val[$k++];
         }else{
            if(isset($mask[$i]))
            $maskared .= $mask[$i];
         }
        }
	 return $maskared;
    }
    public static function mes($data){    
      /// extraindo mes ///
      if(substr($data,-7,1) == "/" ){
        $mes='0'.substr($data,-6,1);
      }else{
        $mes=substr($data,-7,2);
      }
      return $mes;
    }
    public static function ano($data){   
      /// extraindo ano ///
        $ano = substr($data,-4,4);           
      /// fim data ///
      return $ano;
    }
    public static function data($data){    
      /// extraindo dia ///
      if(strlen(strstr($data,'/',true))==1){
        $dia='0'.strstr($data,'/',true);
      }else{
        $dia=strstr($data,'/',true);
      }
      /// extraindo mes ///
      if(substr($data,-7,1) == "/" ){
        $mes='0'.substr($data,-6,1);
      }else{
        $mes=substr($data,-7,2);
      }
      /// extraindo ano ///
        $ano = strrchr($data,"/");           
      /// fim data ///
        $data=$dia.'/'.$mes.$ano;
      return $data;
    }
    public static function tirarAcento($string){  
      return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","_ _ _ _ _ _ _ _ _ _ _ _ _ _"),$string);
    }
}
?>