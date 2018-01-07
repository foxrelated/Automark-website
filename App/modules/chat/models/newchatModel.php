<?php
  class newchatModel extends models{
    private $_query,
            $_resulte,
            $_count;
    public function __construct(){
      parent::__construct();
    }
		public function index(){
			
			
		}
  
      public function countChat($val){
           
        $add=(isset($val['sender']) and  $val['sender']!='')?' and sender_id =  '.$val['sender']:'';
        $add.=(isset($val['user']) and $val['user']!='')?' and user_id =  '.$val['user']:'';
        $add.=(isset($val['type']) and $val['type']!='')?" and type_chat =  '".$val['type']."' ":'';
        $add.=(isset($val['sub']) and $val['sub']!='')?' and sub_id =  '.$val['sub']:'';
        
        $mysql=$this->_db->query("select sub_id,sender_id,user_id from chat where id_chat !=''   $add ");
        
          if($mysql){
            $data= $mysql->fetch_array();
            if(count($data)>0)
            return $data; 
          }
          return false;
      }
      public function addChatDb($val){
          
           $this->_query=$this->_db->prepare("insert into chat (from,to,message,sent,recd) values (?,?,?,?,?)");
               $this->_query->bind_param("ssssi",
                            $val['from'],
                            $val['to'],
                            $val['message'],
                            $val['sent'],
                            
                            $val['recd']
               );
            if($this->_query->execute()){
                  return  $this->_db->insert_id;
                } 
          echo $this->_query->error ;
      }
      public function starchat($val){
          if($val['sub']=='new'){
              $data_chat=$this->countChat(array('sender'=>$val['sender'],'user'=>$val['user']));
              $val['sub']=$data_chat['sub_id'];
          }else{
                $data_chat=$this->countChat(array('sub'=>$val['sub']));
                
            }
          if(isset($data_chat['sub_id']) and $data_chat['sub_id']!=''){
            $add_chat= $this->addChatDb( array(
                        'sender'=>$data_chat['sender_id'],
                        'user'=>$data_chat['user_id'],
                        'message'=>$val['chatText'],
                        'send'=>$val['send'],
                        'mazad_id'=>$val['mazad_id'],
                        'time'=>time(),
                        'type'=>$val['type'],
                        'status'=>1,
                        'sub'=>$val['sub'],
                        ));
              
              return array('status'=>1,'insertID'=>$add_chat,'name'=>'saad','gravatar'=>md5(strtolower(trim($val['sender']))));  
          }
          
        if( $add_chat=$this->addChatDb( array(
                        'sender'=>$val['sender'],
                        'user'=>$val['user'],
                        'message'=>$val['chatText'],
                        'send'=>$val['send'],
                        'mazad_id'=>$val['mazad_id'],
                        'time'=>time(),
                        'type'=>$val['type'],
                        'status'=>1,
                        'sub'=> $this->_db->code_max('sub_id','chat')
                        ))){
             return array('status'	=> 1,'insertID'=> $add_chat,'name'=>'saad','gravatar'=>md5(strtolower(trim($val['sender']))));
        }
           
      }
      
      public function getChats($array){
          
       $add='';
       $add.=(isset($array['sender']))?" and sender_id = ".$array['sender']:'';
       $add.=(isset($array['user']))?" and user_id = ".$array['user']:'';
       $add.=(isset($array['dataOr']) and $array['dataOr']!='')?' and (sender_id='.$array['dataOr'].' or user_id='.$array['dataOr'].')':'';
       $add.=(isset($array['lastID']))?" and id_chat > ".$array['lastID']:'';
       $add.=(isset($array['type']))?" and type_chat = '".$array['type']."' ":'';
       $add.=(isset($array['status']))?" and status_chat = ".$array['status']:'';
       $add.=(isset($array['sub']))?" and sub_id = ".$array['sub']:'';
       $add.=' order by id_chat asc';
       $add.=(isset($array['limitend']))?" limit ".$array['limitend']:'';
        
      $sql=$this->_db->query("select * from old_chat inner join users on (chat.send_id=users.id_u) where  id_chat!='' $add ");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                $ass=array(
                    'id'=>$array['id_chat'],
                    'author'=>$array['name_u'],
                    'gravatar'=>system::_data("url_site").'Public/uploads/'.$array['image_u'],
                    'text'=>$array['message_chat'],
                    'time'=>array(
                            'hours'		=> gmdate('H',strtotime($array['time_chat'])),
                            'minutes'	=> gmdate('i',strtotime($array['time_chat']))
                        ),
                    'ts'=>$array['time_chat'],
                );
                
                  $rows[]=$ass;
            }
          return  array('chats'=>$rows);
        }
        return false;
      } 
      
      public function getCountChats($array){
      
       $add='';
       $add.=(isset($array['sender']))?" and sender_id = ".$array['sender']:'';
       $add.=(isset($array['user']))?" and user_id = ".$array['user']:'';
       $add.=(isset($array['send']))?" and send_id != ".$array['send']:'';
       $add.=(isset($array['dataOr']) and $array['dataOr']!='')?' and (sender_id='.$array['dataOr'].' or user_id='.$array['dataOr'].')':'';
       $add.=(isset($array['type']))?" and type_chat = '".$array['type']."' ":'';
       $add.=(isset($array['status']))?" and status_chat = ".$array['status']:'';
       $add.=(isset($array['sub']))?" and sub_id = ".$array['sub']:'';
      $sql=$this->_db->query("select  count(*) as c  from chat  where id_chat!=''   $add ");
        if($sql){
           $rows=$sql->fetch_row();
           
          return  $rows[0];
        }
        return false;
      }
      
      public function editStatusChte($array=array()){

			$this->_query=$this->_db->prepare("update old_chat set status_chat=? where sub_id=? and send_id != ?  ");
            $this->_query->bind_param("iii",$array['status'],$array['sub'],$array['send']);
                if($this->_query->execute()){
                  return true;
                }

            return false;
       }
    public function getAll($array=''){
      
       $add='';
       $add.=(isset($array['from']))?" and chat.from = "."'".$array['from']."'":'';
       $add.=(isset($array['to']))?" and to = ".$array['to']:'';
       
       $add.=(isset($array['message']))?" and message = ".$array['message']:'';
       //$add.=(isset($array['listGroup']) and $array['listGroup']==1)?' group by id ':'';
       $add.=' order by id desc ';

        $add.=(isset($array['limitend']))?" limit ".$array['limitend']:'';      
      $sql=$this->_db->query("select * from chat inner join users on (chat.from=users.username) where  id!='' $add ");
      //var_dump($sql);die;
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }
      public function getTentAll($array=null){
        $add='';
        $add.=(isset($array['limitend']))?" limit ".$array['limit']:'';
      $sql=$this->_db->query("select * from order_cars where code ='rent'  $add");
        if($sql){
            $rows=array();

            while($array=$sql->fetch_array()){
                  $rows[]=$array;
            }
          return  $rows;
        }
        return false;
    }

          public function active($values){

            $this->_query=$this->_db->prepare("update  order_cars set
						status=?
						where id = ?
					");
           $this->_query->bind_param("ii",
                        $values['status'],
                        $values['id']
           );
            if($this->_query->execute()){
                  return true;
                }

            return false;
       }
public function getId($id){
      $id=(int)$id;
      $sql=$this->_db->query("select * from order_cars where  id = $id ");
        if($sql){
            $rows=array();
            $array=$sql->fetch_assoc();
          return  $array;
        }
        return false;
    }
   public function remove($id){
       $mysql=$this->_db->prepare("delete from order_cars where id = ?");
       $mysql->bind_param("i",$id);
        if( $mysql->execute()){
          return true;
        }
        return false;
     }


  }

?>