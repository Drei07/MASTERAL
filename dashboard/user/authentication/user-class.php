<?php
session_start();
require_once __DIR__. '/../../../database/dbconfig.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once __DIR__.'/../../../database/dbconfig2.php';
include_once __DIR__.'/../../superadmin/controller/select-settings-configuration-controller.php';
require_once __DIR__. '/../../vendor/autoload.php';

class USER
{ 

 private $conn;
 
 public function __construct()
 {
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }
 
 public function runQuery($sql)  
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }
 
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 
 public function register($student_id,$first_name,$middle_name,$last_name,$email,$hash_pass,$profile,$tokencode)
 {
  try
  {       
   $password = md5($hash_pass);
   $stmt = $this->conn->prepare("INSERT INTO user(student_id, first_name, middle_name, last_name, email, password, profile, tokencode) 
                                        VALUES(:student_id, :first_name, :middle_name, :last_name, :email, :password, :profile, :tokencode)");
   
   $stmt->bindparam(":student_id",$student_id);
   $stmt->bindparam(":first_name",$first_name);
   $stmt->bindparam(":middle_name",$middle_name);
   $stmt->bindparam(":last_name",$last_name);
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":password",$password);
   $stmt->bindparam(":profile",$profile);
   $stmt->bindparam(":tokencode",$tokencode);

   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login($email,$hash_pass)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM user WHERE email=:email_id AND account_status = :account_status");
   $stmt->execute(array(":email_id"=>$email , ":account_status" => "active"));
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   $user_id = $userRow['user_id'];
   

   if($stmt->rowCount() == 1)
   {
    if($userRow['account_status']=="active")
    {
     if($userRow['password']==md5($hash_pass))
     {
      DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
      $activity = "Has successfully signed in";
      $user = "Student";
  
      $stmt = $this->conn->prepare("INSERT INTO tb_logs (user_type, user_id, activity) VALUES (:user_type, :user_id, :activity)");
      $stmt->execute(array(":user_type"=>$user, ":user_id"=>$user_id, ":activity"=>$activity));
      $_SESSION['userSession'] = $userRow['user_id'];
      return true;
     }
     else
     {
      echo "$email";
      $_SESSION['status_title'] = "Oops!";
      $_SESSION['status'] = "Email or Password is incorrect.";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_timer'] = 1000000;
      header("Location: ../../../signin");
      exit;
     }
    }
    else
    {
      $_SESSION['status_title'] = "Sorry !";
      $_SESSION['status'] = "Entered email is not verify, please go to your email and verify it. Thank you !";
      $_SESSION['status_code'] = "error";
      $_SESSION['status_timer'] = 10000000;
     header("Location: ../../../signin");
     exit;
    } 
   }
   else
   {
    $_SESSION['status_title'] = "Sorry !";
    $_SESSION['status'] = "Entered email is not verify, please go to your email and verify it. Thank you !";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 10000000;
   header("Location: ../../../signin");
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 
 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 public function logout()
 {
  unset($_SESSION['userSession']);

 }
 
 function send_mail($email,$message,$subject,$smtp_email,$smtp_password,$system_name)
 {      
  $mail = new PHPMailer();
  $mail->IsSMTP(); 
  $mail->SMTPDebug  = 0;                     
  $mail->SMTPAuth   = true;                  
  $mail->SMTPSecure = "tls";                 
  $mail->Host       = "smtp.gmail.com";      
  $mail->Port       = 587;             
  $mail->AddAddress($email);
  $mail->Username = $smtp_email;  
  $mail->Password= $smtp_password;          
  $mail->SetFrom($smtp_email, $system_name);
  $mail->Subject    = $subject;
  $mail->MsgHTML($message);
  $mail->Send();
 } 
}
?>