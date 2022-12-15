<?php
session_start();
require_once __DIR__. '/../../../database/dbconfig.php';
use PHPMailer\PHPMailer\PHPMailer;

include_once __DIR__.'/../../../database/dbconfig2.php';
require_once __DIR__. '/../../vendor/autoload.php';
include_once __DIR__.'/../controller/select-settings-configuration-controller.php';


class SUPERADMIN
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
 
 public function register($email,$upass,$profle,$department_id,$tokencode)
 {
  try
  {       
   $password = md5($upass);
   $stmt = $this->conn->prepare("INSERT INTO superadmin(email,password,profile,department_id,tokencode) 
                                        VALUES(:email,:password,:profile,:department_id,:tokencode)");
   
   $stmt->bindparam(":email",$email);
   $stmt->bindparam(":password",$password);
   $stmt->bindparam(":profle",$profle);
   $stmt->bindparam(":department_id",$department_id);
   $stmt->bindparam(":tokencode",$tokencode);

   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function login($email,$upass)
 {
  try
  {
   $stmt = $this->conn->prepare("SELECT * FROM superadmin WHERE email=:email_id");
   $stmt->execute(array(":email_id"=>$email));
   $superadminRow=$stmt->fetch(PDO::FETCH_ASSOC);
   $superadmin_id = $superadminRow['superadmin_id'];
   

   if($stmt->rowCount() == 1)
   {
     if($superadminRow['password']==md5($upass))
     {
        DATE_DEFAULT_TIMEZONE_SET('Asia/Manila');
        $activity = "Has successfully signed in";
        $date_now = date("Y-m-d h:i:s A");
        $user = "Superadmin";

        $stmt = $this->conn->prepare("INSERT INTO tb_logs (user_type, user_id, activity) VALUES (:user_type, :user_id, :activity)");
        $stmt->execute(array(":user_type"=>$user, ":user_id"=>$superadmin_id, ":activity"=>$activity));
        $_SESSION['superadminSession'] = $superadminRow['superadmin_id'];
        return true;
     }
     else
     {
        echo "$email";
        $_SESSION['status_title'] = "Oops !";
        $_SESSION['status'] = "Email or Password is incorrect.";
        $_SESSION['status_code'] = "error";
        $_SESSION['status_timer'] = 1000000;
        header("Location:../../../public/superadmin/signin");
        exit;
     }
   }
   else
   {
    $_SESSION['status_title'] = "Sorry !";
    $_SESSION['status'] = "Email or Password is incorrect.";
    $_SESSION['status_code'] = "error";
    $_SESSION['status_timer'] = 10000000;
   header("Location: ../../../public/superadmin/signin");
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
  if(isset($_SESSION['superadminSession']))
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


  unset($_SESSION['superadminSession']);
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