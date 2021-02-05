<?php
class testdetails
{ 
    public $dbconn;
  function __construct()
   {
        include 'connection.php';
        $db=new connection();
        $this->dbconn=$db->conn;
   } 
    function insertcategory($category)
    {
       $insert_query="INSERT INTO `tbl_category`( `name`)
        VALUES ('$category')"; 
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
    function getcategory()
    {
       $select_query="SELECT * FROM `tbl_category`"; 
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
    function insertquestion($questioncategory,$question,$answer,$option1,$option2,$option3,$option4)
    {
        $select_parentname="SELECT `name` FROM `tbl_category` WHERE id='$questioncategory'";
        $cat_name=$this->dbconn->query($select_parentname);
        $category_name=$cat_name->fetch_assoc();
        $parent_name=$category_name['name'];
        $insert_query="INSERT INTO `tbl_questions`(`parent_id`, `parentname`, `question`, `answer`,`option1`, `option2`, `option3`, `option4`)
         VALUES('$questioncategory','$parent_name','$question','$answer','$option1','$option2','$option3','$option4')";
          if($this->dbconn->query($insert_query)===true)
          {
              echo "1";
          }
          else
          {
             echo "0";
          }
    } 
    function getquestioncategory()
    {
        $select_query="SELECT `tbl_category`.* FROM `tbl_category` JOIN `tbl_questions` ON `tbl_category`.id= `tbl_questions`.parent_id GROUP BY `tbl_category`.name"; 
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
    function getquestions($testcat_id)
    {
        $select_query="SELECT * FROM `tbl_questions` WHERE `parent_id`=$testcat_id ORDER BY rand() LIMIT 10"; 
        $result=$this->dbconn->query($select_query);
         if($result->num_rows>0)
         {
             if($result->num_rows<10)
             {
                 return "1";
             }
             else{
                 return $result;
            }
             
         }
         else
         {
            return "false";
         }

    }
    function matchanswer($questionid)
    {
        $select_answer="SELECT `answer` FROM `tbl_questions` WHERE `id`= '$questionid'";
        $cat_name=$this->dbconn->query($select_answer);
        $category_name=$cat_name->fetch_assoc();
        $answer=$category_name['answer'];
         return $answer;
    }
    function insert_testresults($category,$userid,$correct_answers,$wrong_answers,$unanswered,$Scores)
    {
        $insert_query="INSERT INTO `tbl_scores`( `category`, `user_id`, `correctanswer`, `wronganswer`, `unanswered`, `marks`) 
        VALUES ($category,$userid,$correct_answers,$wrong_answers,$unanswered,$Scores)"; 
        // INSERT INTO `user_tbl`(`id`, `name`, `email`, `password`, `is_admin`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
        // echo "$insert_query";
            if($this->dbconn->query($insert_query)===true)
            {
                echo "1";
            }
            else
            {
            echo "0";
            }

    }
    
}
// $obj= new testdetails();
// $obj->matchanswer(2);