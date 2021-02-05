<?php
session_start();
$case= $_REQUEST['case'];
// $case= 'login';
switch($case)
                {
                   case "login":
                            include_once 'database/User.php';
                            $user=new User();
                            $email=$_POST['name'];
                            $pswd=$_POST['pswd'];
                            // $email="admin@gmail.com";
                            // $pswd="admin@123";
                            $logindata=$user->detailsonlogin($email);
                            if($logindata!="false")
                            {
                                $row=$logindata->fetch_assoc();
                            
                                    $psd_db=$row['password'];
                                    $dbisadmin=$row['is_admin'];
                                    if($psd_db === md5($pswd))
                                    {
                                        //     echo '1';//active user
                                        $_SESSION['user']=$row;
                                        // echo "<pre>";
                                        //  print_r($_SESSION);
                                        if($dbisadmin === "0")
                                        {
                                                    echo 2;//is user
                                                    // header("location: user/userdashboard.php");
                                                }
                                                else
                                                {
                                                    echo 1;//is admin
                                                    // header("location: admin/admindashboard.php");
                                                }
                                    }
                                    else{
                                        echo '0';//pawrd not match
                                    }
                            }
                            else{
                                echo '-1';//email doesn't exist
                            }
                        break;
                    case "signin":
                                include_once 'database/User.php';
                                $user=new User();
                                $name=trim($_POST['name']);
                                $email=trim($_POST['email']);
                                
                                $mobile=trim($_POST['number']);
                                
                                $pswd=md5(trim($_POST['password']));
                                // $name='stuti';
                                // $email='stuti@gmail.com';
                                
                                // $mobile='7894561230';
                                
                                // $pswd=md5('stuti@123');
                                $data=$user->insertsignupdetails($email,$name,$mobile,$pswd);
                                echo $data;
                         break;
                         
                         case "addcategory":
                            include_once 'database/testdetails.php';
                            $user=new testdetails();
                            $name=trim($_POST['category']);
                            $data=$user->insertcategory($name);
                            echo $data;
                     break;
                     case 'addques':
                        include_once 'database/testdetails.php';
                        $user=new testdetails();
                        // $questioncategory=$_POST['questioncategory'];
                        // $question =$_POST['question'];
                        // $answer =$_POST['answer'];
                        // $option1 =$_POST['option1'];
                        // $option2 =$_POST['option2'];
                        // $option3 =$_POST['option3'];
                        // $option4 =$_POST['option4'];
                        $questioncategory=$_POST['questioncategory'];
                        $question =$_POST['question'];
                        $answer =$_POST['answer'];
                        $option1 =$_POST['option1'];
                        $option2 =$_POST['option2'];
                        $option3 =$_POST['option3'];
                        $option4 =$_POST['option4'];
                        $data=$user->insertquestion($questioncategory,$question,$answer,$option1,$option2,$option3,$option4);
                        echo $data; 
                     break;
                     case 'insert_testdetails':
                        include_once 'database/testdetails.php';
                        $user=new testdetails();
                        $category=$_POST['category'];
                        $userid=$_POST['userid'];
                        $correct_answers=$_POST['correct_answers'];
                        $wrong_answers=$_POST['wrong_answers'];
                        $unanswered=$_POST['unanswered'];
                        $Scores=$_POST['Scores'];
                        $data=$user->insert_testresults($category,$userid,$correct_answers,$wrong_answers,$unanswered,$Scores);
                        echo $data;
                     break;
                }//switch