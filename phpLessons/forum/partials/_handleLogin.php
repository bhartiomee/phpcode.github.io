<?php
    $loginError=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include '_dbconnect.php';

        $emailLog=$_POST['email'];
        $logPass=$_POST['password'];

        $sql="SELECT * from `users` WHERE user_email='$emailLog' ";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);

        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($logPass,$row['password'])){
                    $loggedin=true;
                   $alert=true;
                    session_start();
                    $_SESSION['loggedin']=true;
                    $_SESSION['alert']=true;
                    $_SESSION['email']=$emailLog;
                    $_SESSION['username']=$row['username'];
                    $_SESSION['sno']=$row['sno'];
                    // echo "logged in".$emailLog;
                    header("Location:../index.php?login=true");
                    
                }
                else{
                    $loginError="Credintials do not match!";
                    header("Location:../index.php?error=".$loginError);
                }
            }
           
        }
        else{
            $loginError="Credintials do not match!";
            header("Location:../index.php?error=".$loginError);
            // echo "unable to login".mysqli_error($conn);
        }
    }
?>