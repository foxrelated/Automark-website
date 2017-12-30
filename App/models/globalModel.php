<?php

class globalModel extends models{
       private $_error;
       private $_query;
       private $_resulte;
       private $_count;
     public  function __construct(){
       parent::__construct();
    }

    public  function query($sql,$param=array()){
      $this->_error=false;
            if(system::get('mysql/typeDB')==='mysqli'){
                if($this->_query=$this->_db->prepare($sql)){

                      if(count($param)){

                           $value='';
                                    $x=1;
                        foreach($param as $p){
                               $this->_query->bindparam($x,$p);


                             $x++;
                        }
                           //    echo   $params=$value.','.implode(", ",$param);
                         //$this->_query->bind_param($params);
                      }
                if($this->_query->execute()){
                            $res=$this->_query->get_result();
                          $this->_resulte=$res->fetch_array();
                         // $this->_count=$res->param_count();

                }else{
                          $this->_error=true;
                        }


                }
            }
            if(system::get('mysql/typeDB')==='pdo'){
                if($this->_query=$this->_db->prepare($sql)){
                    if(count($param)){
                        $x=1;
                        foreach($param as $p){
                             $this->_query->bindValue($x,$p);
                             $x++;
                        }
                    }
                        if($this->_query->execute()){
                            $this->_resulte=$this->_query->fetchAll();
                            $this->_count=$this->_query->rowCount();
                        }else{
                          $this->_error=true;
                        }
                }
        }
        return $this;
    }
private function action($action,$table,$where=array()){
  $more='';
  $value=array();
 if(count($where)==3){
      $operators=array('!=','=','<','>','>=','<=');

      $field        =$where[0];
      $operator     =$where[1];
      $value        =array($where[2]);

                             //,array('id_u','=','1')

       if(in_array($operator,$operators)){
                $more= " where {$field} {$operator} ?";
            }
      }
            $sql="{$action} from {$table}  {$more}";
                if($this->query($sql,$value)){
                  return $this;
                }

    return false;

}

public function insert($table,$fields=array()){
        if(count($fields)){
            $array_kay=array_keys($fields);
            $value='';
            $x=1;
            foreach($fields as $field){
                    $value.=" ? ";
                    if($x<count($fields)){
                        $value.=",";
                    }
                    $x++;
                }
            $sql="insert into {$table} (`".implode('`, `',$array_kay)."`) values ({$value}) ";
            if($this->query($sql,$fields)->error()){
               return true;
            }
}
        return false;
}
public function get($table ,$where=''){
       return  $this->action('select *',$table,$where);
}

public function delete($table ,$where){
       return  $this->action('delete ',$table,$where); 
}

  public function frist(){
    return $this->_resulte[0];
  }
  public function error(){
    return $this->_error;
  }
  public function resulte(){
    return  $this->_resulte;
  }
  public function count(){
    return $this->_count;
  }
}

?>