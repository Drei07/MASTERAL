<?php
require_once 'user-class.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
 $user->redirect('');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
 $id = base64_decode($_GET['id']);
 $code = $_GET['code'];
 
 $active = "active";
 $pending = "pending";
 
 $stmt = $user->runQuery("SELECT user_id,account_status FROM user WHERE user_id=:uID AND tokencode=:code LIMIT 1");
 $stmt->execute(array(":uID"=>$id,":code"=>$code));
 $row=$stmt->fetch(PDO::FETCH_ASSOC);
 if($stmt->rowCount() > 0)
 {
  if($row['account_status']==$pending)
  {
   $stmt = $user->runQuery("UPDATE user SET account_status=:account_status WHERE user_id=:uID");
   $stmt->bindparam(":account_status",$active);
   $stmt->bindparam(":uID",$id);
   $stmt->execute(); 
   
   $msg = "
        <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
        <strong>Welcome !</strong> Your account is now activated.
        </div>
        <a href='../../' style='text-decoration:underline; display: flex; justify-content: right; font-size: 1.2rem; color:#c72a2a; font-weight:600;''>Signin here  <img src='../../src/img/caret-right-fill.svg' style='margin-top: .5rem; margin-left: 5px;' width='15' height='15' alt='Arrow right'></a>";
  }
  else
  {
   $msg = "
        <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
        <strong>Hey !</strong>  Your account is all ready activated.
        </div>
        <a href='../../' style='text-decoration:underline; display: flex; justify-content: right; font-size: 1.2rem; color:#c72a2a; font-weight:600;'>Signin here  <img src='../../src/img/caret-right-fill.svg' style='margin-top: .5rem; margin-left: 5px;' width='15' height='15' alt='Arrow right'></a>";
  }
 }
 else
 {
  $msg = "
        <div class='alert alert-error' style='font-size:20px; font-weight:300; color:#000;'>
        <strong>Warning !</strong> No account Found.
        </div>";
 } 
}
