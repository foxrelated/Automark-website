<?php
  class carsModel extends models{
  private $_query;


      public function getAll($id=null,$status=''){
		  
	  $id =(isset($id) and $id!='')? " where category_c = '".$id."'" :" ";
      $status=(isset($status) and $status!='')? " and status_c = '".$status."'" :" ";
      $sql=$this->_db->query("select * from cars $id $status order by id_c desc");
        if($sql){
            $rows=array();
 
            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
     public function getId($id,$act=null){
	 $add=(isset($act) and $act=='on')?" and act_c = 1":'';
       $id=(int)$id;
      $sql=$this->_db->query("select * from  cars inner JOIN users on cars.id_user=users.id_u where id_c =$id $add limit 1 ");
        if($sql){
              $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }
	
      
	 public function get_cars_meta($id){
	
      $sql=$this->_db->query("select * from  cars_meta inner join option_car  on cars_meta.code_m=option_car.code_o where cars_meta.id_cars_m =$id  and option_car.type_o='form'");
	  echo 	$this->_db->error;
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
		
			return  $rows;
        }
        return false;
    }
	public function remove_cars_meta($id){
		
      return $this->_db->query("delete from  cars_meta where id_cars_m = $id ");
	}
    public function dataUser($id){


      $sql=$this->_db->query("select users.email_u,users.name_u,users.lastname_u,users.mobile_u from cars inner JOIN users on cars.id_user=users.id_u   where cars.id_c = $id  limit 1 ");
        if($sql){
           $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }
         public function getlimit($type='',$limit='',$dir='',$id=null,$act='',$vzt=''){
       $add='';
	   if(is_array($type) and count($type)>0){
		 $add.=(isset($type['type']) and $type['type']=='city')?' and city_c= '.$type['id']:'';  
		 $add.=(isset($type['type']) and $type['type']=='model')?' and type_c= '.$type['id']:'';  
		 $add.=(isset($type['type']) and $type['type']=='category')?' and category_c= '.$type['id']:'';  
		 $add.=(isset($type['type']) and $type['type']=='users')?' and id_user= '.$type['id']:'';  
	  
	  }else{
       $add.=($type=='bay')?' and features_c=1 ':'';
       $add.=($type=='rental')?' and type_ads_c=3 ':'';
       $add.=($type=='offers')?' and type_ads_c=4 ':'';
       $add.=($type=='features')?' and features_c=2 ':'';
       $add.=($type=='category')?' and category_c= '.(int)$id:'';
       $add.=($type=='shows')?' and shows_c= '.(int)$id:'';
       $add.=($type=='users')?' and id_user= '.(int)$id:'';
       $add.=($type=='model')?' and type_c= '.(int)$id:'';
	   }
       $add.=($act=='on')?' and act_c=1 ':'';
        $add.=($vzt=='vzt')?' order by vzt_c  ':' order by id_c ';
	     
       $lim=(isset($limit) and $limit!='' and is_numeric($limit) and $limit>0)?" limit $limit  ":'';
       $lim.=(isset($limit['limit_end']) and $limit['limit_end']!='' and is_numeric($limit['limit_end']))?" limit ".$limit['limit_start']." ,".$limit['limit_end']:'';
      $sql=$this->_db->query("select * from  cars inner JOIN users on cars.id_user=users.id_u where id_c!='' $add  $dir $lim");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
  public function getIdU($id,$user){

       $id=(int)$id;
       $user=(int)$user;
      $sql=$this->_db->query("select * from  cars inner JOIN users on cars.id_user=users.id_u where id_c =$id and id_user =  $user limit 1 ");
        if($sql){
           $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }

    public function search($value=array(),$limitst=null,$limitend=null){
    /*
      $arraySearch=array(
                "model"=>isset($getSearch['model'])?$getSearch['model']:'',
                "submodel"=>isset($getSearch['submodel'])?$getSearch['submodel']:'',
                "type"=>isset($getSearch['type'])?$getSearch['type']:'',
                "pricemin"=>isset($getSearch['pricemin'])?$getSearch['pricemin']:'',
                "pricemax"=>isset($getSearch['pricemax'])?$getSearch['pricemax']:'',
                "city"=>isset($getSearch['city'])?$getSearch['city']:''
                );

    */
            //$this->_db->real_escape_string($id)
       $add='';
       $add.=(!empty($value['title']))? " and  title_c  like('%".$value['title']."%')":'';
       $add.=(!empty($value['model']))? " and  type_c= ".(int)$value['model']:'';
       $add.=(!empty($value['submodel']))? " and  model_c= ".(int)$value['submodel']:'';
       $add.=(!empty($value['type']))? " and  type_ads_c= ".(int)$value['type']:'';
       $add.=(!empty($value['pricemin']))? " and  price_c >= ".(int)$value['pricemin']:'';
       $add.=(!empty($value['pricemax']))? " and  price_c <= ".(int)$value['pricemax']:'';
       $add.=(!empty($value['country']))? " and  Country_c = ".(int)$value['country']:'';
       $add.=(!empty($value['city']))? " and  city_c = ".(int)$value['city']:'';
       $add.=(!empty($value['years']))? " and  year_c = ".(int)$value['years']:'';

       $limit=(isset($limitend) and $limitend!='')?" limit  $limitst $limitend  ":'';
      $sql=$this->_db->query("select * from  cars  where id_c!='' $add order by id_c desc $limit");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

    public function generalsearch($value=array(),$limitst=null,$limitend=null){
    /*
      $arraySearch=array(
                "model"=>isset($getSearch['model'])?$getSearch['model']:'',
                "submodel"=>isset($getSearch['submodel'])?$getSearch['submodel']:'',
                "type"=>isset($getSearch['type'])?$getSearch['type']:'',
                "pricemin"=>isset($getSearch['pricemin'])?$getSearch['pricemin']:'',
                "pricemax"=>isset($getSearch['pricemax'])?$getSearch['pricemax']:'',
                "city"=>isset($getSearch['city'])?$getSearch['city']:''
                );

    */
            //$this->_db->real_escape_string($id)
       $add='';
       $add.=(!empty($value['category']))? " and  category_c  like('%".$value['category']."%')":'';
       $add.=(!empty($value['model']))? " and  type_c= ".(int)$value['model']:'';              
       $add.=(!empty($value['pricemin']))? " and  price_c >= ".(int)$value['pricemin']:'';
       $add.=(!empty($value['pricemax']))? " and  price_c <= ".(int)$value['pricemax']:'';
       $add.=(!empty($value['yearsemin']))? " and  year_c >= ".(int)$value['yearsemin']:'';
       $add.=(!empty($value['yearsemax']))? " and  year_c <= ".(int)$value['yearsemax']:'';
       $add.=(!empty($value['desemin']))? " and  odometer_c >= ".(int)$value['desemin']:'';
       $add.=(!empty($value['desemax']))? " and  odometer_c <= ".(int)$value['desemax']:'';
       $add.=(!empty($value['country']))? " and  Country_c = ".(int)$value['country']:'';
       $add.=(!empty($value['city']))? " and  city_c = ".(int)$value['city']:'';
       $add.=(!empty($value['status']))? " and  status_c = ".(int)$value['status']:'';

       $limit=(isset($limitend) and $limitend!='')?" limit  $limitst $limitend  ":'';
      $sql=$this->_db->query("select * from  cars  where id_c!='' $add order by id_c desc $limit");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

    public function showssearch($value=array(),$type='',$limit='',$dir='',$id=null,$act='',$vzt=''){
      $add='';
     $add.=(!empty($value['model']))? " and  type_c= ".(int)$value['model']:'';
     $add.=(!empty($value['year']))? " and  year_c= ".(int)$value['year']:'';
     $add.=($type=='shows')?' and shows_c= '.(int)$id:'';
     
       $add.=($act=='on')?' and act_c=1 ':'';
        $add.=($vzt=='vzt')?' order by vzt_c  ':' order by id_c';
        if(!empty($value['orderyear']) && $value['orderyear'] == "من الأقدم إلى الأحدث"){
          $dir = "asc";
        }
        if(!empty($value['orderyear']) && $value['orderyear'] == "من الأحدث إلى الأقدم"){
          $dir = "desc";
        }
       $add.=(!empty($value['orderyear']))? ", year_c":'';
       $lim=(isset($limit) and $limit!='' and is_numeric($limit) and $limit>0)?" limit $limit  ":'';
       $lim.=(isset($limit['limit_end']) and $limit['limit_end']!='' and is_numeric($limit['limit_end']))?" limit ".$limit['limit_start']." ,".$limit['limit_end']:'';
       
       $sql=$this->_db->query("select * from  cars inner JOIN users on cars.id_user=users.id_u where id_c!='' $add  $dir $lim");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

    public function specificsearch($value=array(),$limitst=null,$limitend=null){
    
       $add='';
       $add.=(!empty($value['q']))? "and title_c  like('%".$value['q']."%')":'';

       $limit=(isset($limitend) and $limitend!='')?" limit  $limitst $limitend  ":'';
       $s = "select * from  cars  where id_c!='' $add order by id_c desc $limit";
       
      $sql=$this->_db->query("select * from  cars  where id_c!='' $add order by id_c desc $limit");
      
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
            
          return  $rows;
        }
        return false;
    }
  public function insert($values=array()){
				
	$this->_query=$this->_db->prepare("insert into cars (title_c,type_c,model_c,category_c,year_c,price_c,Country_c,city_c,features_c,images_c,type_ads_c,description_c,dateadd_c,id_user,end_c,act_c,vzt_c) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
           $this->_query->bind_param("siiiisiiissssiiii",
                        $values['title_c'],
                        $values['modelcar'],
                        $values['model'],
                        $values['catagory'],
                        $values['years'],
                        $values['price_c'],
                        $values['country'],
                        $values['city'],
                        $values['features'],
                        $values['images_c'],
                        $values['type'],
                        $values['description_c'],
                        $values['dateadd'],
                        $values['iduser'],
                        $values['end'],
                        $values['act'],
                        $values['vzt_c']
           );
            if($this->_query->execute()){
                  return $this->_db->insert_id;
                }
            return false;
       }

  public function insertcarfavorite($values=array()){
    
    $this->_query=$this->_db->prepare("insert into users_cars_favorite (user_id,car_id) values (?,?)");
    if(!$this->_query->bind_param("ii",
                        $values['user_id'],
                        $values['car_id']
           ))echo $this->_db->error;
     
      if($this->_query->execute()){
      
                  return $this->_db->insert_id;
                }

      return false;

  }

  public function getcarfavorite($userid,$carid){
       $userid=(int)$userid;
       $carid=(int)$carid;
      $sql=$this->_db->query("select * from  users_cars_favorite where user_id =$userid And car_id=$carid ");
        if($sql){
              $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }
       public function add_meta_cars($values){
        
			      $this->_query=$this->_db->prepare("insert into cars_meta (id_cars_m,code_m,value_m) values (?,?,?)");
           $this->_query->bind_param("iss",
                        $values['id'],
                        $values['code'],
                        $values['value']
           );
           
            if($this->_query->execute()){
                  return true;
                }

            return false;
	   } 
    public function addMazadCars($values){
			      $this->_query=$this->_db->prepare("insert into mazad (user_id,cars_id,price_mazad,comment_mazad,status_mazad,time_mazad) values (?,?,?,?,?,?)");
           $this->_query->bind_param("iissii",
                        $values['user_id'],
                        $values['cars_id'],
                        $values['price'],
                        $values['comment'],
                        $values['status'],
                        $values['time']
           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
	   } 
    public function selectMazadCars($id){

      $add=isset($id['cars_id'])?' cars_id = '.$id['cars_id']:'';
      $add.=isset($id['user_id'])?' and user_id = '.$id['user_id']:'';
      $add.=' order by mazad_id desc ';
        
      $sql=$this->_db->query("select  status_mazad,mazad_id,price_mazad,user_id,name_u,cars_id,comment_mazad,time_mazad  from  mazad inner JOIN users on mazad.user_id=users.id_u where $add   ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
   public function getMaxmazad($id){

      $add = isset($id['id'])?' mazad_id = '.$id['id']:'';
      $add.= isset($id['cars_id'])?' cars_id = '.$id['cars_id']:'';
      $add.= isset($id['user_id'])?' and user_id = '.$id['user_id']:'';
      $add.=' order by price_mazad desc ';
       
      $sql=$this->_db->query("select    status_mazad,title_c,price_mazad,user_id,name_u,cars_id,comment_mazad,time_mazad,price_c  from  mazad inner JOIN users on mazad.user_id=users.id_u inner join cars on mazad.cars_id=cars.id_c where $add  limit 1 ");
        if($sql){
           $rows=$sql->fetch_assoc();
          return  $rows;
        }
        return false;
    }
     
      	    public function updateMazad($values=array()){
            $this->_query=$this->_db->prepare("update  mazad set
						status_mazad=?
						where mazad_id = ?
					");					
           $this->_query->bind_param("ii",
                        $values['status'],
                        
						$values['id']
           );
            if($this->_query->execute()){
               return true;
                }else{
                    echo $this->_query->error ;
  
                }
            return false;
       } 
      
      public function updateMazadcars($values=array()){
            $this->_query=$this->_db->prepare("update  cars set
						status_c=?
						where id_c = ?
					");

  							
           $this->_query->bind_param("ii",
                        $values['status'],
                        
						$values['id']
           );
            if($this->_query->execute()){
               return true;
                }else{
                    echo $this->_query->error ;
  
                }
            return false;
       }    public function updateMazadCarsOfDate($values=array()){
		 
			  $add=(isset($values['end_date']) and $values['end_date']!='')?' and  end_c < '.$values['end_date']:'';
            $this->_query=$this->_db->prepare("update  cars set
								status_c=?
						  where id_c!='' and  (status_c=1 or status_c='') $add
					");

  							
           $this->_query->bind_param("i",
                        $values['status']
           );
            if($this->_query->execute()){
               return true;
                }else{
                    echo $this->_query->error ;
  
                }
            return false;
       }

      public function getCountDB($data){
      
       $add=(isset($data['add']))?$data['add']:'';
      $sql=$this->_db->query("select  count(*) as c  from  ".$data['data']."  where  ".$data['table']." = '".$data['val']."'  $add ");
        if($sql){
           $rows=$sql->fetch_row();
           
          return  $rows[0];
        }
        return false;
      }
	    public function update($values=array()){


            $this->_query=$this->_db->prepare("update  cars set
						title_c=?,
						type_c=?,
						model_c=?,
						year_c=?,
						price_c=?,
						Country_c=?,
						city_c=?,
						features_c=?,
						images_c=?,
						type_ads_c=?,
						shows_c=?,
						description_c=?,
						act_c=?
						where id_c = ?
					");

  							
           $this->_query->bind_param("siisssssssssii",
                        $values['title_c'],
                        $values['modelcar'],
                        $values['model'],
                        $values['years'],
                        $values['price_c'],
                        $values['country'],
                        $values['city'],
                        $values['features'],
                        $values['images_c'],
                        $values['type'],
                        $values['shows'],
                        $values['description_c'],
                        $values['act'],
						$values['id']
           );
            if($this->_query->execute()){
               return true;
                }else{
  echo $this->_query->error ;
  
  }
            return false;
       }

	    public function updateU($values=array()){


            $this->_query=$this->_db->prepare("update  cars set
						title_c=?,
						type_c=?,
						model_c=?,
						model_sub_c=?,
						year_c=?,
						color_c=?,
						odometer_c=?,
						transmission_c=?,
						status_c=?,
						body_c=?,
						form_c=?,
						price_c=?,
						Country_c=?,
						city_c=?,
						features_c=?,
						images_c=?,
						type_ads_c=?,
						shows_c=?,
						description_c=?,
						special_c=?

						where id_c = ?
					");
           $this->_query->bind_param("siiiisssssssiiississi",
                        $values['title_c'],
                        $values['modelcar'],
                        $values['model'],
                        $values['modelsub'],
                        $values['years'],
                        $values['color'],
                        $values['odometer'],
                        $values['transmission'],
                        $values['status'],
                        $values['body'],
                        $values['form'],
                        $values['price'],
                        $values['country'],
                        $values['city'],
                        $values['features'],
                        $values['imagemsh'],
                        $values['type'],
                        $values['shows'],
                        $values['des'],
                        $values['special'],
						$values['id']
           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
		}
		
		public function getComment($id=''){
			$add=(isset($id['id']) and $id['id']!='')?" and comments.id_com = '".$id['id']."'":'';
			$add=(isset($id['car']) and $id['car']!='')?" and comments.id_car = '".$id['car']."'":'';
			$add.=(isset($id['user']) and $id['user']!='')?" and comments.id_user = '".$id['user']."'":'';
			$add.=(isset($id['act']) and $id['act']!='')?" and comments.act_com = '".$id['act']."'":'';
			$add.=(isset($id['order']) and $id['order']!='')?" order by '".$id['order']."'":' order by comments.id_com ';
			$add.=(isset($id['limit']) and $id['limit']!='')?" limit '".$id['limit']."'":'';
				
				
				$sql=$this->_db->query("select * from  comments left JOIN users  on comments.id_user= users.id_u  where id_com!='' $add ");
				
				
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;	
			}
			

			public function addCommentId($values){
			      $this->_query=$this->_db->prepare("insert into comments values ('',?,?,?,?,?,?,?,?,?)");
				  
           if(!$this->_query->bind_param("sssssssss",
                        $values['title'],
                        $values['subject'],
                        $values['ip'],
						$values['id_user'],
						$values['id_car'],
						$values['time'],
						$values['act'],
						$values['name'],
						$values['email']
			))echo $this->_query->error ;
		   
  
            if($this->_query->execute()){
                  return true;
                }

            return false;
	   } 
	   	public function addSapmId($values){
			 $this->_query=$this->_db->prepare("insert into spam_system values ('',?,?,?,?,?,?,?,?)");
				  
           if(!$this->_query->bind_param("ssssssss",
                        $values['type_ss'],
                        $values['subject'],
                        $values['ip'],
						$values['id_user'],
						$values['id_car'],
						$values['time'],
						$values['id_comment'],
						$values['type_car']
			))echo $this->_query->error ;
		   
  
            if($this->_query->execute()){
                  return true;
                }
				
echo $this->_query->error ;
            return false;
		
		}
       public function active($values){

            $this->_query=$this->_db->prepare("update  cars set
						act_c=?
						where id_c = ?
					");
           $this->_query->bind_param("ii",
                        $values['act'],
                        $values['id']
           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
       }
     public function remove($id){
       $mysql=$this->_db->prepare("delete from cars where id_c = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }


      public function del($id){
       $mysql=$this->_db->prepare("delete from cars where id_c = ? and id_user = ?");
       $mysql->bind_param("ii",$id['id'],$id['user']);
        if($mysql->execute()){
          return true;
        }
        return false;
     }


      public function updateVzt($values=array()){
               $this->_query=$this->_db->prepare("update  cars set  vzt_c=vzt_c + 1
						where id_c = ?
					");
              $this->_query->bind_param("i",$values['id']);
              if($this->_query->execute()){
                  return true;
              }
            return false;
       }

  }

?>