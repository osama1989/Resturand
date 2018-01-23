<?php
include_once('config.php');


 
 class role 
 
 {
     protected $name;
	 public $number;
	 public $permission=array();
	 public $permission_object=array();
 
      public function set($num)
      {
         $this->number=$num;  
	    
	  }	  
	 

  public function __construct($role_id)
     {
           	 
	    //$permission_object = array();
	    $prev= array(); 
	    $prev[1]= new control_user();
	    $prev[2]= new Role_Based_Access_Control ();
	    $prev[3]=  new project_management ();
		
        $prev[4]=  new resource_mangment();
       	$prev[5]=  new Control_task();
		$prev[6]=  new visor_task();
			
		
		 
		
		$this->number=$role_id;		
		
		//$this->$permission = array();
		 if( !empty($role_id))
		 {
		$result = dbQuery('select permission_id FROM permission_role 
                          
                         WHERE role_id ='.$role_id);
		
		 
         $result1 = dbQuery("select* from  permissions ");

          while ($arr = mysql_fetch_array($result1))
            {
			
			  $this->permission[$arr['id']]=false;
			
			}

	      while ($arr1 = mysql_fetch_array($result))
		  
		  {
		  
		  
		     $this->permission[$arr1['permission_id']]=true;
		  
		  
		  
		  }
	  
          $j=0;	  
		
		for($i=1;$i<=count($this->permission);$i++)
          {
		     
		    
		    if($this->permission[$i]==true ) 
		     {
			 $this->permission_object[]=$prev[$i];
			 
			 }
		  
		  
		  }		
       // errorMessage( count($this->permission_object));
	 
	 
	 
	 
	 
	 }
	 
	 }	 
    
   
 
 
 
 
 
 
 }
 
  
class user 
{
		
     public $role_array=array();
	 
	 public $username;
	 public $id;
	 
              
    
	
	
	
	public function set_role(role $rol)
      {
         $this->role_array[]=$rol;  
	    
	  }	  
    	  
	  public static function get_user()
	  {
	  
	   $my_user= new user;
       if(isset( $_SESSION['user']['name'] ))        	 
	   {
	   $my_user->name=$_SESSION['user']['name'];
	   $my_user->id=$_SESSION['user']['id'];
	     if(!dbNumRows('user_role' , '`User_id`='.$my_user->id ) )
			{
			
			     errorMessage('none');
			
			
			}
	      
		 // errorMessage($_SESSION['role']['count']);
        // errorMessage($_SESSION['user']['role1']);	    
		 
		  
		 for( $i=1;$i<=$_SESSION['role']['count'];$i++)
             {
			   
			   $index=(string)$i; 
	             if( isset($_SESSION['user']['role'.$index]))
               {				
				$my_role=new role($_SESSION['user']['role'.$index]);		    
			     //$my_role->set($_SESSION['user']['role'.$index]);
                 $my_user->role_array[]=$my_role;     			 
              }
			  // 
			  //errorMessage($_SESSION['user']['role'.$index]);			  
			
			}		 
       

	 }
	     return $my_user;
	 
	 }
	
	public  static function  signIn($POST,$dots)
   {
   //$x = dbQuery('select * from user where usersname like '.mysql_real_escape_string($_POST['username_input']).' and password like '.md5($_POST['password_input']))
		
		
		if (!dbNumRows('user', '`username` like "'.mysql_real_escape_string($POST['username_input']).'" and `password` like "'.md5($POST['password_input']).'"'))
		{
			errorMessage( " يرجى تسجيل الدخول");
			redirect('signIn.php');
		}
		else
		{
			$result = dbQuery('select * from `user` where `email	` like "'.mysql_real_escape_string($POST['username_input']).'" and `password` like "'.md5($POST['password_input']).'"');
			$arr = mysql_fetch_array($result);
			$_SESSION['user']['name'] = $arr['username'];
			$_SESSION['user']['id'] = $arr['id'];
			$x=$arr['id'];
			
			//setcookie('x', $_SESSION['user']['name'], time()+ 100, '/');
			
			
			
			
			
			$result = dbSelectRows('user_role','User_id ='.$arr['id'] );
			
		     
			  
			  //$arr1 = mysql_fetch_array($result);
			 
              //$_SESSION['user']['role1']=$arr1['Role_Id'];			  
			  
			 //successMessage( $arr1['Role_Id']);
			       
                 //  if(!empty($arr1))
   				  //{
   				    //$role3= new role( $arr1['Role_Id']);
				    //$role3->set($arr1['Role_Id']);   
			       
					//if ( $role3 instanceof role)
				  //$my_user1->role_array[]=$role3;
                  //  $my_user->set_role($role3);
				//successMessage($my_user1->role_array[0]->number); 
					
					//successMessage( $arr1['Role_Id']);			     
				 //} 
	     	
			$i=0;
			while ($result1 = mysql_fetch_array($result))
			{
                 
			    if(!empty($result1['Role_Id']))
       			{
    				$i++;
					$index=(string)$i; 			     
				  
			      $_SESSION['user']['role'.$index]=$result1['Role_Id'];
                
                   $_SESSION['role']['count']=$i;
				}  			     
			       	 
				// if(!empty($result1['Role_Id']) )
                 //{				 
				   // $role2=new role($result1['Role_Id']);
				  
				    //$role2->set($result1['Role_Id']);   
			        //$my_user1->role_array[]=$role2;
					
					
					
					
					//$my_user->set_role(role2);
			        
			     //}
			}
			 
              
			  			
			 
			// successMessage($my_user->role[0]->number);
			 // $my_user->set_role($role1);

			  
			
			
			 successMessage(" تم تسجيل الدخول بنجاح");
			
			//$_SESSION['user']['privilege'] = $arr['privilege'];
			
		 		//$s = urlencode(serialize($my_user));
 
			 redirect($dots.'index.php');
		    
			  
		      		
		
    
	
	}
      
      
   }


     public static function   signUp($POST)
   
    {

     if (dbNumRows('user', 'username like "'.$POST['username_input'].'"'))
		{
			errorMessage('اسم المستخدم الذي أدخلته موجود مسبقاً');
		
		}
		else
		if ($POST['password_input'] != $POST['repassword_input'])
		{
			errorMessage('كلمة المرور وتأكيدها غير متطابقين');
		
		}
		else
		if (strlen($POST['password_input'])<5)
		{
			errorMessage('يجب أن تكون كلمة المرور 5 محارف على الأقل');
		
		}
		else
		if (!myReg::isMail($POST['mail_input']))
		{
			errorMessage('الإيميل يجب أن يكون بالصيغة الصحيحة');
		
		}
		
		else
		
		{
		    dbInsert('user', array('username', 'password', 'mail','Firstname','Lastname'), array($POST['username_input'], md5($POST['password_input']), $POST['mail_input'],$POST['Firstname_input'],$POST['Lastname_input']));
			successMessage('تم تسجيلك في الموقع بنجاح');
			redirect('signIn.php');
		}
	
		
	
    


    }


   function Edit($POST,$dots)
   
    {
  
     if (!myReg::isMail($POST['mail_input']))
		{
			errorMessage('الإيميل يجب أن يكون بالصيغة الصحيحة');
		}
		else
		{
			dbUpdate('user', array('mail'), array($POST['mail_input']), 'id='.$_SESSION['user']['id']);
			successMessage('تم تعديل بياناتك بنجاح');
			redirect($dots.'index.php');
		
		}
  
  
  
  
  
  
  
  
  
  
  
  
  
   }











   public function has_role($role_id)
   {
    
	  foreach( $this->role_array as $value )
	
	     {
		 
		   if($value->number==$role_id)
		 
		     return true;
		 
		 }
	
	 return false; 
	
	  }
   
 }
 
 
  
 
 class  Permission
    {
            
 
         public $name;
         protected $number;
         public $link;
 
      
	
	
	
	}

  class Control_user extends Permission
    {
          
	 public $link;
     public static $x=1;
		  
     
	 public function __construct()
	  {
	  
	  
         $this->link='admin/user/index.php';	  
	     $this->name="التحكم في المستخدمين";
	  
	  }
	  
	  
	    public static function delete_user($GET,$dots)
	  {
	    dbDelete('user', 'id='.$GET);
		successMessage('تم حذف هذا العضو بنجاح');
		redirect('index.php');
	  
	  }
	    public static function Edit_role_user($role_id,$user_id)
	  {
	  
	    dbInsert('user_role',array('User_id','Role_Id'),array($user_id,$role_id)); 
	    successMessage('تم تعديل بياناتك بنجاح');
	    redirect('index.php');
	  
	  
	  }
       
        public static  function Delete_role_user($role_id,$user_id)
	 
    	 {
	  
	     // successMessage($user_id);
    	  dbDelete('user_role','User_id='.$user_id .' '.'and Role_Id ='.$role_id ); 
	      successMessage('تم حذف الصلاحية بنجاح');
	      redirect('index.php');
	  
	  
	    }
     
	 
	}  




 
 
 
 
 
 
 class Role_Based_Access_Control extends  Permission
    
 {
    public $link;
    public static $x=2;
   
  public function __construct()
	  {
	  
	  
         $this->link='admin/user/role_mange.php';	  
	  
        $this->name=" التحكم في الصلاحيات";	  
	  }
   
       public static function insert_Role($POST)
	 
        {
	
	
	      dbInsert('role',array('name'),array($POST['role_input']));
	       $arr=dbselectRow('role' , 'name like "'.mysql_real_escape_string($POST['role_input']).'"');
            
          $arr1=$POST['formDoor'];			
		 foreach($arr1 as $value)
		  {
		   
		  self::insertPerm_role1( $arr['id'],$value);
		  
		  }
	     
		   successMessage('تم اضافة الصلاحية بنجاح');
	        redirect('role_mange.php');
		 
		 
		 }
  
      public  function insertPerm_role1($role_id, $perm_id) 
   
   
      {
    
	     dbInsert('permission_role',array('role_id','permission_id'),array($role_id, $perm_id) );

	
       }   
  

  public  function insertPerm_role($perm_id,$role_id) 
   
   
      {
    
	     dbInsert('permission_role',array('role_id','permission_id'),array($role_id, $perm_id) );

	      successMessage('تم اضافة الصلاحية بنجاح');
	        redirect('role_mange.php');
       }
   
    public static function insertPerm($role_name)
    
    	{
	
	  
	  dbInsert(permissions,array('desc'),array($role_name));
	
	
    	} 
	public static function delete_perm($prem_id,$role_id)
	{
	
	 dbDelete(permission_role,'permission_id = '.$prem_id. ' and role_id='.$role_id); 
      successMessage("تم حذف الصلاحية بنجاح");
	        redirect('role_mange.php');	
	//dbDelete(permissions,'id='.$prem_id);	
	
	  
	}
	
	
   
   
   public static function delete_Role($role_id)
	    {
 	
	
	    dbDelete(user_role,'role_id='.$role_id);
	    dbDelete(permission_role,'role_id = '.$role_id);   
        dbDelete(role,'id='.$role_id );	
	  
	      successMessage('تم حذف الصلاحية بنجاح');
	      redirect('role_mange.php');
 
	  }
 


 }
 
  class project_management   extends Permission 
  
    {
	   public $name ;
   	   public $link;
	   public static $x=3;
	   public function __construct()
	  {
	  
	  
         $this->link='admin/user/project_mangment.php';	  
	  
	     $this->name="  ادارة المشاريع ";
	  
	  }

	  public static function add_project($POST)
      
	  {
	       $date = explode('/', $POST['SelectedDate']);
          // $time = mktime(0,0,0,$date[0],$date[1],$date[2]);
          // $mysqldate = date( 'Y-m-d H:i:s', $time );
	  
	        dbInsert('project', array('name', 'special_describtion','cost','period','type'), array($POST['project_input'], $POST['Descriptions_input'],$POST['cost_input'],$POST['time_input'],$POST['type_input']));
			$arr=dbQuery('select * from project where name like "'.mysql_real_escape_string($POST['project_input']).'"');
			$arr1= mysql_fetch_array($arr);
			dbInsert('project_user', array('Project_id','User_id') , array($arr1['id'],$POST['manger_input'] ) );
			successMessage('تم اضافة مشروع بنجاح');
				     
		    $arr2=$POST['formDoor'];
			//successMessage("lolopo");
			
			if(!empty($arr2) )
			{
			    foreach(  $arr2 as $value )
			    dbInsert('project_user',array('Project_id','User_id') , array($arr1['id'], $value) ); 
			
			}
	         
			redirect('project_mangment.php');
   
	  }	   
	
	 public static function delete_project($id)
	   {
	 
	 
	   
   	    dbDelete('project','id='.$id ); 
	    successMessage(' تم حذف المشروع بنجاح ');
	    redirect('project_mangment.php');
	 
	 
	 
	  }
	
	
	 public  static function edit_project($POST,$id)
      
	  {
	 
           $date = explode('/', $POST['SelectedDate']);
           $time = mktime(0,0,0,$date[0],$date[1],$date[2]);
           $mysqldate = date( 'Y-m-d H:i:s', $time );
	  
	       dbUpdate('project', array('name', 'special_describtion','cost','period','type'), array($POST['project_input'], $POST['Descriptions_input'],$POST['cost_input'],$POST['time_input'],$POST['type_input']),'id='.$id);
		   dbInsert( 'project_user',array('Project_id','User_id') ,array( $id,$POST['manger_input']));
		   dbInsert( 'project_user',array('Project_id','User_id') ,array( $id,$POST['watch_input']));
		   successMessage('تم تعديل المشروع بنجاح');
		   redirect('project_mangment.php');
	     
	         
			   
	  }	   
	
	
	
	
	
	
	
	}
 
  class resource_mangment extends Permission 
  
    {
	   public $name ;
   	   public $link;
	   public static $x=4;
	   public function __construct()
	  {
	  
	  
         $this->link='manger/user/resource_mangment.php';	  
	  
	     $this->name=" ادارة الموارد ";
	  
	  }
  
    public static function add_resource_type($POST)
	{
	
	 dbInsert('resource_type',array('name'),array($POST));
	
	         successMessage('تم اضافة صنف بنجاح');
				     
		    	         
			  redirect('resource_mangment.php');
	
	}
	
	
	
	
	public static function add_resource($POST)
      
	  {
	      
	  
	        dbInsert('resource_repository', array('name','cost','count','type','id_type','work_day','busy'), array($POST['name_input'], $POST['cost_input'],$POST['count_input'],$POST['type_input'],$POST['type2_input'],$POST['power_input'],$POST['count_input']));
			
             successMessage('تم اضافة مورد بنجاح');
				     
		    	         
			  redirect('resource_mangment.php');
   
	 }	   
  
  
    public static function edit_resource($POST,$id)
      
	  {
	        dbUpdate('resource_repository', array('name','cost','count','type','id_type','work_day','busy'), array($POST['name_input'], $POST['cost_input'],$POST['count_input'],$POST['type_input'],$POST['type2_input'],$POST['power_input'],$POST['count_input']),'id='.$id);
			
             successMessage('تم تعديل المورد بنجاح');
				     
		    	         
			  redirect('resource_mangment.php');
	  
	         
   
	 }	   






      public static function add_type_resource($POST)
      
	  {
	      
	  /*
	        dbInsert('resource_repository', array('name','cost','count','type'), array($_POST['name_input'], $_POST['cost_input'],$_POST['count_input'],$_POST['type_input']));
			
             successMessage('تم أضافة مورد بنجاح');
				     
		    	         
			  redirect('resource_mangment.php');
     */   
	 }	   
       
	      public static function delete_resource($id)
		  {
		  
		    
		  dbDelete('resource_repository','id='.$id ); 
	      successMessage('تم حذف المورد بنجاح');
	      redirect('resource_mangment.php');
		  
		  }
 


 }
 
 class Control_task extends Permission 
  
    {
	   public $name ;
   	   public $link;
	   public static $x=5;
	   public function __construct()
	    {
	  
	  
         $this->link='manger/user/task_mangment.php';	  
	  
	     $this->name=" هيكلة المهام ";
	  
	   }
  
 
     public static function add_task($POST,$id)
	 {
	 
	   
	   
          for($i=1;$i<=$POST['number_input'];$i++)
	      {
		  
		  dbInsert('task',array('name'),array('task'.$i.$id)); 
   	      $arr= dbSelectRow( 'task' ,'name like "'.mysql_real_escape_string ('task'.$i.$id).'"');
		   
		  dbInsert('project_task',array('project_id','task_id'),array($id,$arr['id']));
		  
		  
		  }
	    $number=$POST['number_input'];
	    redirect('select_task.php?id='.$id.'& x='.$number);	 
	  
	 
	 }
 
   
     public static function edit_task($POST,$id)
	 {
	           
	     
         if(isset($POST['formDoor']))		 
 		 {
		 $arr2=$POST['formDoor']; 	    
         
		 $arr3=$POST['count_input'];
		
		 
		 $period;
		 
		 foreach($arr2 as   $key => $value) 
	      {
        		  
 
		  
		 
		  $arr=dbSelectRow('resource_repository','id='.$arr2[$key]);
		  
           //errorMessage($arr['type']);
		   if($arr['type']==1)
		   {
		   
		   $period=($POST['work_amount'])/($arr['work_day']);
		   
		   $cost=$cost+($arr['cost']*$POST['work_amount']);
		   
		   //errorMessage($arr['id_type']);
		   
		   }
		  else
		  {
		  
		  $cost=$cost+($arr['cost']);
		  
		  }
		 //errorMessage("soso");		 
		 
		// if($arr['count']<$value)   
		  //{
		 
    		// errorMessage('اختيار كمية المورد ضمن الكمية المتاحة');
		     //redirect('select_task.php?id='.$id.'& x='.$number);	
		 
		  //}
         
		// else		
		 //{
		   
		  dbUpdate('resource_repository',array('count'),array($arr['count']-$value),'id='.$arr2[$key]);
		  dbInsert('task_resource',array('task_id','resource_id'),array($POST['select_input'],$arr2[$key]));
          
		   
		// } 
		  }
		   
		 }
		 
		 
		 dbUpdate('task',array('work_amount','supervisor','next_task','Parallel_task','same_start','same_end','id_type','period','cost'),
		 
		 array($POST['power_input'],$POST['watch_input'],
		 
		 $POST['next_input'],$POST['Parallel_input'],$POST['begin_input'] ,$POST['end_input'] ,$POST['type2_input'],$period,$cost),'id='.$POST['select_input'] );
	 
        
		 //successMessage($POST['Parallel_input']);
		 redirect('select_task.php?id='.$id.'& x='.$number);
	 
	        
	 
	 
	 }
 
 
 
 }
 
 
 class visor_task   extends  Permission
 
{

       public $name ;
   	   public $link;
	   public static $x=6;
	   public function __construct()
	    {
	  
	  
         $this->link='minitor/user/index.php';	  
	  
	     $this->name=" مراقبة المهام ";
	  
	    
        
	    }
  
          public static function  add_point($POST,$id)
		  {
		  
		  
           $today = date("Y-m-d");
		  
		   $today1 = time();
		   $arr=dbSelectRow('task','id='.$id);
		   $x=strtotime( $arr['date_edit']) ;
		  if((($today1-$x)/60)/60>=24) 		   
		   
		   {
		   dbInsert('task_status',array('task_id','comment','rate','date_edit'),array($id,$POST['comment_input'],$POST['number_input'],$today));
		   dbUpdate('task',array('date_edit'),array($today),'id='.$id);
		   
		   successMessage('تم اضافة نقطة مراقبة بنجاح');
		   }
		  else 
		  successMessage("الرجاء الانتظار يوم على الاقل");
		  
		  
		  
 

           
		   redirect('index.php?id='.$id);


}

} 
 
class RSS
{

 public function RSS()
 {
  
 }
  
 public function GetFeed()
 {
  return $this->getDetails().$this->getItems();
 }
  
  private function getDetails()
 {
   
   $details = '<?xml version="1.0" encoding="ISO-8859-1" ?>
    <rss version="2.0">
     <channel>
      <title>information about project</title>
     
      <description>show information about project and count work</description>';
     
      
 
  return $details;
 }
  
 private function getItems()
 {
    $result=dbQuery('select * from project');
    $items="";
	 while($row = mysql_fetch_array($result))
     {  
	  
	    $result1=dbQuery('select * from  project_task where project_id='.$row['id']);
	        
			 $num_task=0;
	         $num_enjz=0;
		   while($row1 = mysql_fetch_array($result1))
	          
		  { 
    
	
     	     $result2=dbQuery('select * from task_status join task on task.id=task_status.task_id where
             task.id='.$row1['Task_id']);
	
	          global $num_task; 
	         
			  $num_task++;
		   while($row2= mysql_fetch_array($result2))
		    {
		     
			 $num_enjz+=$row2['rate'];
    	    }	   
		
	        
		 }     
          
		  
		//  $num_enjz=$num_enjz/$num_task;
		  
      
      $items .= "
	  <item>
     <title>  project is   ".htmlspecialchars($row['name'])."</title>
     <link></link>
     <description>count work =".htmlspecialchars($num_enjz) ."% </description>
            </item>";
       }
   //global $items;
   $items.= '</channel>
    </rss>';
  return $items;
 }
 
}
 
 
 
 ?>