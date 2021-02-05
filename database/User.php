<?php
class User
{ 
    public $dbconn;
  function __construct()
   {
        include 'connection.php';
        $db=new connection();
        $this->dbconn=$db->conn;
   } 
    function insertsignupdetails($mail,$name,$number,$password)
    {
       $insert_query="INSERT INTO `user_tbl`( `name`, `email`,`number`, `password`, `is_admin`)
        VALUES ('$name','$mail','$number','$password','0')"; 
        // INSERT INTO `user_tbl`(`id`, `name`, `email`, `password`, `is_admin`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
        if($this->dbconn->query($insert_query)===true)
        {
            echo "1";
        }
        else
        {
           echo "0";
        }
    }  
    function detailsonlogin($mail)
    {
       $select_query="SELECT * FROM `user_tbl` WHERE `email`='$mail' "; 
       $result=$this->dbconn->query($select_query);
        if($result->num_rows>0)
        {
            return $result;
        }
        else
        {
           return "false";
        }
    }  
}
// $obj=new User();

?>