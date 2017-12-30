<?php
  class optionModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
       public function addOption($array=array()){

         $this->_query=$this->_db->prepare("insert into option_car values ('',?,?,?,?,'')");
            $this->_query->bind_param("ssss",$array['name'],$array['code'],$array['option'],$array['type']);
                if($this->_query->execute()){
                  return  $this->_query->insert_id;
                }

            return false;
       }
        public function addValueOption($array=array()){
         if(count($array)==3){
         $this->_query=$this->_db->prepare("insert into value_option values ('',?,?,?)");
            $this->_query->bind_param("iss",$array['id_op'],$array['value_op'],$array['type_op']);
                if($this->_query->execute()){
                  return true;
                }
            }
            return false;
       }
	    public function updateValueOption($array){
		$this->_query=$this->_db->prepare("update  value_option set  value_v = ? , type_v = ? where id_v = ? ");
            $this->_query->bind_param("ssi",$array['value_op'],$array['type_op'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }
            
            return false;	 
	 }
	   
      public function geValueOption($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from value_option where  option_id_v = $id ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
	
 public function getCatNameId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select code_ss from category where  id_ss = $id ");
        if($sql){
            $rows=array();

           $array=$sql->fetch_assoc();

          return  $array['code_ss'];
        }
        return false;
    }
public function getCode($tb,$name){
            $sql=$this->_db->query("select * from option_car where code_o='$tb'  ");
              if($sql){
                  $rows=$sql->fetch_assoc()  ;
                return  $rows[$name];
              }
              return false;
    }
    public function getOption($value=array()){
            $add=(isset($value['type']) and $value['type']!='')?" and type_o =  '".$value['type']."'":"";
            $add.=(isset($value['code']) and $value['code']!='')?" and code_o =  '".$value['code']."'":"";
			$add.=(isset($value['id']) and $value['id']!='')?" and id_o =  '".$value['id']."'":"";
            $sql=$this->_db->query("select * from option_car where id_o!='' $add  ");
              if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
              return false;
    }
    public function updateOption($array=array()){
        
         $this->_query=$this->_db->prepare("update  option_car set  name_o = ? where id_o = ?");
            $this->_query->bind_param("si",$array['name'],$array['id']);
                if($this->_query->execute()){
                  return true;
                }
            
            return false;
       }
 public function updateOption_code($array=array()){
        
         $this->_query=$this->_db->prepare("update  option_car set  option_o = ? where code_o = ?");
            $this->_query->bind_param("ss",$array['name'],$array['code']);
                if($this->_query->execute()){
                  return true;
                }
            
            return false;
       }
       public function color_update($array=array(),$id){
       
         $this->_query=$this->_db->prepare("update  option set name_o=? , code_o=? , option_o= ? where code_o = ?");
            $this->_query->bind_param("sss",$array['name'],$array['code'],$array['option'],$id);
                if($this->_query->execute()){
                  return true;
                }
            
            return false;
       }




    public function check($table , $name=null, $id=null){

    $option= (isset($id) and isset($name))?" where $name = '$id' ":'';
      $sql=$this->_db->query("select * from $table $option");
        if($sql){
          return  $sql->num_rows();
        }
        return false;
    }

      public function getCityId($id){
        $id=(int)$id;
      $sql=$this->_db->query("select * from city where  sub_c = $id ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

         public function get_value_option($value){
            $add=(isset($value['option_id']) and $value['option_id']!='')?" and option_id_v =  '".$value['option_id']."'":"";
 $add.=(isset($value['id']) and $value['id']!='')?" and id_v =  '".$value['id']."'":"";
            $sql=$this->_db->query("select * from value_option where id_v!='' $add  ");
              if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
              return false;
    }
	
	
	    public function addCategory($values=array()){


             $this->_query=$this->_db->prepare("insert into category values('',?,?,'') ");
           $this->_query->bind_param("ss",
                        $values['name'],
                        $values['form']

           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
       }
  public function getCategory($code=''){
    $add=(isset($code['id']) and $code['id']!='')? " and id_ss='".$code['id']."'":'';
            $sql=$this->_db->query("select * from category where id_ss!='' $add  ");
              if($sql){
                  $rows=$sql->fetch_assoc()  ;
                return  $rows;
              }
              return false;
    }
	public function add_option_category($values=array()){
			if(isset($values) and count($values)){
			 $this->_query=$this->_db->prepare("insert into category_list values('',?,?,?) ");
           $this->_query->bind_param("iii",
                        $values['category'],
						$values['option'],
                        $values['order']

           );
            if($this->_query->execute()){
                  return true;
                }

            	
			}
		return false;
		}
public function list_category($value=array()){
	
		$add="";
		$add .=(isset($value['category']) and $value['category']!='' )?" and category_id=".$value['category']:'';
	 $sql=$this->_db->query("select * from category_list where id_cl!='' $add  order by order_cl asc");
              if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
              return false;	
		
	
	}		
		
   public function getAll($code=''){
    $add=(isset($code['id']) and $code['id']!='')? " and id_ss='".$code['id']."'":'';
            $sql=$this->_db->query("select * from category where id_ss!='' $add  ");
              if($sql){
                  $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;

              }
              return false;
    }
	

  }

?>