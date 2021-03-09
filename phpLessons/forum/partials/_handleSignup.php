<?php
    $showerror=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include '_dbconnect.php';
        $username=$_POST['username'];
        $user_email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        //chekc wheather username exsists

        $username_exists="SELECT FROM users WHERE username='$username' ";
        $user_result=mysqli_query($conn,$username_exists);
        $user_rows=mysqli_num_rows($user_result);
        $uservalid;
        if($user_rows >0){
            $showerror="User name exists!";
        }
        else{
            $user_valid=true;
        }

        //chekc wheather eamil exsists
        $email_exists="SELECT FROM users WHERE user_email='$user_email' ";
        $email_result=mysqli_query($conn,$email_exists);
        $email_rows=mysqli_num_rows($email_result);
        $email_valid=true;

        if($user_rows >0){
            $showerror="Email already in use!";
        }
        else{
            $email_valid=true;
        }

      
        //check either passwoed and cpassword is same

        if($email_valid && $user_valid){
            if($password==$cpassword){
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`username`, `user_email`, `password`, `id_created`) VALUES ('$username', '$user_email', '$hash', CURRENT_TIMESTAMP)";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $showerror=false;
                    header("Location:../index.php?signupSuccess=true");
                    exit();
                }

            }
            else{
                $showerror="Passwords do not match";
                header("Location:../index.php?signupSuccess=false&error=".$showerror);
            }
        }
        header("Location:../index.php?signupSuccess=false&error=".$showerror);
    }
?>

